<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index(){
        return view('backend.default.index');
    }

    public function login(){
        return view('backend.default.login');
    }

    public function authenticate(Request $request){
        $request->flash();
        $remember_me = $request->has('rememberme') ? 'true' : 'false';
        $loginSys = $request->only(['email','password']);

        if(Auth::attempt($loginSys,$remember_me)){
            return redirect()->intended(route('zeplin.index'))->with('success','Giriş işlemi başarılı.');
        }else{
            return back()->with('error','Giriş işlemi başarısız.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(route('zeplin.login'))->with('logout','Güvenli çıkış yapıldı.');
    }
}
