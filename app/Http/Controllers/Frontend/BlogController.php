<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Models\Blogcats;

class BlogController extends Controller
{
    public function index(){
        $data['blog'] = Blogs::all()->sortBy('must')->where('status',1);

        return view('frontend.blog.index',compact('data'));
    }

    public function detail($slug=null){
        //get detail data
        $data = Blogs::where([
            'slug' => $slug,
            'status' => '1'
        ])->first();

        //get last 5 data
        $lastBlogList = Blogs::where('status','1')->orderBy('must')->take(5)->get();

        if ($data === null) {
            return redirect(route('frontend.notfound'));
        }else{
            return view('frontend.blog.detail',compact('data','lastBlogList'));
        }
    }

    public function blogcat($slug=1){
        $cats = Blogcats::where('slug',$slug)->first();
        $blogs = Blogs::all()->where('cat',$cats->id)->where('status','1')->sortBy('must');
        $data = [
            'blog' => $blogs,
            'blogcat' => $cats
        ];

        return view('frontend.blog.index',compact('data'));
    }
}
