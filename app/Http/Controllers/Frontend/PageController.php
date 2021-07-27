<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function detail($slug=null){
        $data = Pages::where([
            'slug' => $slug,
            'status'=>'1'
        ])->first();

        if ($data === null) {
            return redirect(route('frontend.notfound'));
        }else{
            return view('frontend.page.detail',compact('data'));
        }
    }
}
