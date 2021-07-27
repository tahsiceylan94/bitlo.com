<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blogs::all()->sortBy('must');
        $data = [
            'blogs' => $blogs
        ];

        return view('backend.blogs.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
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
            $request->blogfile->move(public_path('images/blogs'),$file_name);
        }else{
            $file_name = null;
        }

        //insert
        $blog = Blogs::insert([
            'title' => $request->title,
            'content' => $request->content,
            'short_content' => $request->short_content,
            'slug' => $slug,
            'file' => $file_name,
            'status' => $request->status,
            'cat' => $request->cat,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keyword' => $request->seo_keyword,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        if($blog){
            return redirect(route('blog.index'))->with('success','Ekleme işlemi tamamladı.');
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
        $blog = Blogs::where('id',intval($id))->first();
        return view('backend.blogs.edit')->with('blog',$blog);
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
            $request->blogfile->move(public_path('images/blogs'),$file_name);

            //update
            $blog = Blogs::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'short_content' => $request->short_content,
                'slug' => $slug,
                'file' => $file_name,
                'status' => $request->status,
                'cat' => $request->cat,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keyword' => $request->seo_keyword,
            ]);

            $path = 'images/blogs/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            if($request->removethisfile == 1) {
                $blog = Blogs::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'short_content' => $request->short_content,
                    'slug' => $slug,
                    'file' => "",
                    'status' => $request->status,
                    'cat' => $request->cat,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keyword' => $request->seo_keyword,
                ]);
                $path = 'images/blogs/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else {
                $blog = Blogs::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'short_content' => $request->short_content,
                    'slug' => $slug,
                    'status' => $request->status,
                    'cat' => $request->cat,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keyword' => $request->seo_keyword,
                ]);
            }
        }



        if($blog){
            return redirect(route('blog.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $blog = Blogs::find(intval($id));
        if($blog->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $blogs = Blogs::find(intval($value));
            $blogs->must = intval($key);
            $blogs->save();
        }
        return true;
    }
}
