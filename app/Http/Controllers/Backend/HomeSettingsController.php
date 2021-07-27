<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homesettings;

class HomeSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homesettings = Homesettings::all()->sortBy('must');
        $data = [
            'homesettings' => $homesettings
        ];

        return view('backend.homesettings.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.homesettings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $homesetting = Homesettings::where('id',intval($id))->first();
        return view('backend.homesettings.edit')->with('homesetting',$homesetting);
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
            'description' => 'required'
        ]);

        if($request->hasFile('settings_value_file')){
            $request->validate([
                'settings_value_file' => 'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);

            //dosya adı değiştirme
            $file_name = uniqid().'.'.$request->settings_value_file->getClientOriginalExtension();

            //dosya kaydetme/taşıma
            $request->settings_value_file->move(public_path('images/homesetting'),$file_name);

            //dosya ismini değiştirme
            $request->settings_value_file = $file_name;

            $homesetting = Homesettings::Where('id',$id)->update([
                'description' => $request->description,
                'status' => $request->status,
                'value' => $request->settings_value_file,
            ]);
            $path = 'images/homesetting/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
        }else{
            if($request->removethisfile == 1){
                $homesetting = Homesettings::Where('id',intval($id))->update([
                    'description' => $request->description,
                    'status' => $request->status,
                    'value' => '',
                ]);
                $path = 'images/homesetting/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else{
                $homesetting = 1;
            }
        }

        if($request->value != ""){
            $homesetting = Homesettings::Where('id',intval($id))->update([
                'description' => $request->description,
                'status' => $request->status,
                'value' => $request->value,
            ]);
        }

        if($homesetting){
            return redirect(route('homesetting.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $homesetting = Homesettings::find(intval($id));
        if($homesetting->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $homesettings = Homesettings::find(intval($value));
            $homesettings->must = intval($key);
            $homesettings->save();
        }
        return true;
    }
}
