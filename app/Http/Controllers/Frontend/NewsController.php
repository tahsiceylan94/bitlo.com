<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $data['news'] = News::all()->sortBy('must')->where('status',1);

        return view('frontend.news.index',compact('data'));
    }

    public function detail($slug=null){
        //get detail data
        $data = News::where([
            'slug' => $slug,
            'status' => '1'
        ])->first();

        //get last 5 data
        $lastNewsList = News::where('status','1')->orderBy('must')->take(5)->get();

        if ($data === null) {
            return redirect(route('frontend.notfound'));
        }else{
            return view('frontend.news.detail',compact('data','lastNewsList'));
        }
    }
}
