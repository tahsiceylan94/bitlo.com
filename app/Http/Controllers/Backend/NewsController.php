<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all()->sortBy('must');
        $data = [
            'news' => $news
        ];

        return view('backend.news.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
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
        if($request->hasFile('newfile')){
            $request->validate([
                'newfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->newfile->getClientOriginalExtension();
            $request->newfile->move(public_path('images/news'),$file_name);
        }else{
            $file_name = null;
        }



        //insert
        $new = News::insert([
            'title' => $request->title,
            'content' => $request->content,
            'short_content' => $request->short_content,
            'slug' => $slug,
            'file' => $file_name,
            'status' => $request->status,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keyword' => $request->seo_keyword,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        if($new){
            return redirect(route('new.index'))->with('success','Ekleme işlemi tamamladı.');
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
        $new = News::where('id',intval($id))->first();
        return view('backend.news.edit')->with('new',$new);
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
        if($request->hasFile('newfile')){
            $request->validate([
                'newfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->newfile->getClientOriginalExtension();
            $request->newfile->move(public_path('images/news'),$file_name);

            //update
            $new = News::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'short_content' => $request->short_content,
                'slug' => $slug,
                'file' => $file_name,
                'status' => $request->status,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keyword' => $request->seo_keyword,
            ]);

            $path = 'images/news/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            if($request->removethisfile == 1) {
                $new = News::Where('id',$id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'short_content' => $request->short_content,
                    'slug' => $slug,
                    'file' => "",
                    'status' => $request->status,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keyword' => $request->seo_keyword,
                ]);

                $path = 'images/news/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else {
                $new = News::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'short_content' => $request->short_content,
                    'slug' => $slug,
                    'status' => $request->status,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keyword' => $request->seo_keyword,
                ]);
            }
        }

        if($new){
            return redirect(route('new.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $new = News::find(intval($id));
        if($new->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $news = News::find(intval($value));
            $news->must = intval($key);
            $news->save();
        }
        return true;
    }
}
