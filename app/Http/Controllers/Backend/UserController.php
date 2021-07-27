<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('must');
        $data = [
            'users' => $users
        ];

        return view('backend.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|Min:6',
        ]);

        //dd($request->all());

        //file
        if($request->hasFile('userfile')){
            $request->validate([
                'userfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->userfile->getClientOriginalExtension();
            $request->userfile->move(public_path('images/users'),$file_name);
        }else{
            $file_name = null;
        }

        //insert
        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_file' => $file_name,
            'status' => $request->status,
            'role' => $request->role,
        ]);

        if($user){
            return redirect(route('user.index'))->with('success','Ekleme işlemi tamamladı.');
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
        $user = User::where('id',intval($id))->first();
        return view('backend.users.edit')->with('user',$user);
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
            'name' => 'required',
            'email' => 'required|email',
        ]);


        //file
        if($request->hasFile('userfile')){
            $request->validate([
                'userfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->userfile->getClientOriginalExtension();
            $request->userfile->move(public_path('images/users'),$file_name);

            //update
            $user = User::Where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'user_file' => $file_name,
                'status' => $request->status,
                'role' => $request->role,
            ]);

            $path = 'images/users/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            $user = User::Where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'role' => $request->role,
            ]);
        }

        //parola kontrolü
        if(strlen($request->password) > 0){
            $request->validate([
                'password' => 'required|Min:6',
            ]);

            $user = User::Where('id',$id)->update([
                'password' => Hash::make($request->password)
            ]);
        }


        if($user){
            return redirect(route('user.edit',$id))->with('success','Düzenleme başarılı.');
        }else{
            return back()->with('error','İşlem başarısız.');
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
        $user = User::find(intval($id));
        if($user->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $users = User::find(intval($value));
            $users->must = intval($key);
            $users->save();
        }
        return true;
    }
}
