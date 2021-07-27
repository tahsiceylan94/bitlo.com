<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogcats;
use Illuminate\Support\Str;

class BlogcatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogcats = Blogcats::all()->sortBy('must');
        $data = [
            'blogcats' => $blogcats
        ];

        return view('backend.blogcats.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogcats.create');
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
        if($request->hasFile('blogfile')){
            $request->validate([
                'blogfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->blogfile->getClientOriginalExtension();
            $request->blogfile->move(public_path('images/blogcats'),$file_name);
        }else{
            $file_name = null;
        }

        //insert
        $blogcat = Blogcats::insert([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'file' => $file_name,
            'status' => $request->status,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keyword' => $request->seo_keyword,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        if($blogcat){
            return redirect(route('blogcat.index'))->with('success','Ekleme işlemi tamamladı.');
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
        $blogcat = Blogcats::where('id',intval($id))->first();
        return view('backend.blogcats.edit')->with('blogcat',$blogcat);
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
        if($request->hasFile('blogfile')){
            $request->validate([
                'blogfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->blogfile->getClientOriginalExtension();
            $request->blogfile->move(public_path('images/blogcats'),$file_name);

            //update
            $blog = Blogcats::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'file' => $file_name,
                'status' => $request->status,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keyword' => $request->seo_keyword,
            ]);

            $path = 'images/blogcats/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            if($request->removethisfile == 1) {
                $blog = Blogcats::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'slug' => $slug,
                    'file' => "",
                    'status' => $request->status,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keyword' => $request->seo_keyword,
                ]);
                $path = 'images/pages/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else {
                $blog = Blogcats::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'slug' => $slug,
                    'status' => $request->status,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keyword' => $request->seo_keyword,
                ]);
            }
        }



        if($blog){
            return redirect(route('blogcat.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $blog = Blogcats::find(intval($id));
        if($blog->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $blogcats = Blogcats::find(intval($value));
            $blogcats->must = intval($key);
            $blogcats->save();
        }
        return true;
    }
}
