<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Homesettings;
use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Homes;

class DefaultController extends Controller
{
    public function index(){

        $data['slider'] = Sliders::all()->sortBy('must');
        $data['homes'] = Homes::all()->sortBy('must')->where('status',1);
        $homesettings = Homesettings::all()->sortBy('must')->where('status',1);

        foreach ($homesettings as $key){
            $homesettings[$key->key] = $key->value;
        }
        $data['homesettings'] = $homesettings;

        return view('frontend.default.index',compact('data'));
    }

    public function notfound(){
        return view('frontend.default.notfound');
    }
}
