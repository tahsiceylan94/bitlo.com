<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all()->sortBy('must');
        $data = [
            'pages' => $pages
        ];

        return view('backend.pages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        //seourl
        if(strlen($request->slug) > 3){
            $slug = Str::slug($request->slug);
        }else{
            $slug = Str::slug($request->title);
        }

        //file
        if($request->hasFile('pagefile')){
            $request->validate([
                'pagefile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->pagefile->getClientOriginalExtension();
            $request->pagefile->move(public_path('images/pages'),$file_name);
        }else{
            $file_name = null;
        }



        //insert
        $page = Pages::insert([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'file' => $file_name,
            'status' => $request->status,
            'header' => $request->header,
            'footer' => $request->footer,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keyword' => $request->seo_keyword,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        if($page){
            return redirect(route('page.index'))->with('success','Ekleme işlemi tamamladı.');
        }else{
            return back()->with('error','Başarısız işlem başarısız.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $page = Pages::where('id',intval($id))->first();
        return view('backend.pages.edit')->with('page',$page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        //seourl
        if(strlen($request->slug) > 3){
            $slug = Str::slug($request->slug);
        }else{
            $slug = Str::slug($request->title);
        }

        //file
        if($request->hasFile('pagefile')){
            $request->validate([
                'pagefile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->pagefile->getClientOriginalExtension();
            $request->pagefile->move(public_path('images/pages'),$file_name);

            //update
            $page = Pages::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'file' => $file_name,
                'status' => $request->status,
                'header' => $request->header,
                'footer' => $request->footer,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keyword' => $request->seo_keyword,
            ]);

            $path = 'images/pages/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            if($request->removethisfile == 1) {
                $page = Pages::Where('id',$id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'slug' => $slug,
                    'file' => "",
                    'status' => $request->status,
                    'header' => $request->header,
                    'footer' => $request->footer,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keyword' => $request->seo_keyword,
                ]);

                $path = 'images/pages/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else {
                $page = Pages::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'slug' => $slug,
                    'status' => $request->status,
                    'header' => $request->header,
                    'footer' => $request->footer,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keyword' => $request->seo_keyword,
                ]);
            }
        }

        if($page){
            return redirect(route('page.edit',$id))->with('success','Ekleme işlemi tamamladı.');
        }else{
            return back()->with('error','Başarısız işlem başarısız.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::find(intval($id));
        if($page->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $pages = Pages::find(intval($value));
            $pages->must = intval($key);
            $pages->save();
        }
        return true;
    }
}
