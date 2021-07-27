<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsoptions;

class NewsoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsoptions = Newsoptions::all()->sortBy('must');
        $data = [
            'newsoptions' => $newsoptions
        ];

        return view('backend.newsoptions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.newsoptions.create');
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
        $newsoption = Newsoptions::where('id',intval($id))->first();
        return view('backend.newsoptions.edit')->with('newsoption',$newsoption);
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
            $request->settings_value_file->move(public_path('images/newsoption'),$file_name);

            //dosya ismini değiştirme
            $request->settings_value_file = $file_name;

            $newsoption = Newsoptions::Where('id',$id)->update([
                'description' => $request->description,
                'status' => $request->status,
                'value' => $request->settings_value_file,
            ]);
            $path = 'images/newsoption/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
        }else{
            if($request->removethisfile == 1){
                $newsoption = Newsoptions::Where('id',intval($id))->update([
                    'description' => $request->description,
                    'status' => $request->status,
                    'value' => '',
                ]);
                $path = 'images/newsoption/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else{
                $newsoption = 1;
            }
        }

        if($request->value != ""){
            $newsoption = Newsoptions::Where('id',intval($id))->update([
                'description' => $request->description,
                'status' => $request->status,
                'value' => $request->value,
            ]);
        }

        if($newsoption){
            return redirect(route('newsoption.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $newsoption = Newsoptions::find(intval($id));
        if($newsoption->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $newsoptions = Newsoptions::find(intval($value));
            $newsoptions->must = intval($key);
            $newsoptions->save();
        }
        return true;
    }
}
