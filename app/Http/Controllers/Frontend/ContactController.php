<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.default.contact');
    }
    public function contactsend(Request $request){
        $niceNames = [
            'name' => 'Ad soyad',
            'phone' => 'Telefon',
            'email' => 'Email',
            'subject' => 'Konu',
            'message' => 'Mesaj',
        ];

        $valid = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'phone' => 'required|max:20',
            'email' => 'required|email',
            'subject' => 'required|max:150',
            'message' => 'required|max:999'
        ],[],$niceNames)->validate();

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('tahsinceylan94@gmail.com')->send(new SendMail($data));

        return redirect(route('frontend.default.iletisim').'#successmessage')->with('success','Mail başarıyla gönderildi.');
    }
}
