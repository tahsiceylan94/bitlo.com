<?php

namespace App\Http\Controllers\Backend;
use App\Models\Settings;
use App\Http\Controllers\Controller;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $allSettings = Settings::all()->sortBy('settings_must');
        $data = [
            'adminSettings' => $allSettings
        ];

        return view('backend.settings.index',compact('data'));
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $settings = Settings::find(intval($value));
            $settings->settings_must = intval($key);
            $settings->save();
        }
        return true;
    }

    public function delete($id){
        $settings = Settings::find(intval($id));
        if($settings->delete()){
            return back()->with('success','Silme işlemi başarılı.');
        }else{
            return back()->with('error','Silme işlemi başarısız.');
        }
    }

    public function edit($id){
        $settings = Settings::where('id',intval($id))->first();

        return view('backend.settings.edit')->with('settings',$settings);
    }

    public function update(Request $request, $id){

        if($request->hasFile('settings_value_file')){
            $request->validate([
                'settings_value_file' => 'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);

            //dosya adı değiştirme
            $file_name = uniqid().'.'.$request->settings_value_file->getClientOriginalExtension();

            //dosya kaydetme/taşıma
            $request->settings_value_file->move(public_path('images/settings'),$file_name);

            //dosya ismini değiştirme
            $request->settings_value_file = $file_name;

            $settings = Settings::Where('id',intval($id))->update([
                "settings_value" => $request->settings_value_file
            ]);
            $path = 'images/settings/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
        }else{
            if($request->removethisfile == 1){
                $settings = Settings::Where('id',intval($id))->update([
                    "settings_value" => ''
                ]);
                $path = 'images/settings/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else{
                $settings = 1;
            }
        }

        if($request->settings_value != ""){
            $settings = Settings::Where('id',intval($id))->update([
                "settings_value" => $request->settings_value
            ]);
        }

        if($settings){

            return back()->with('success','Düzenleme işlemi başarıyla gerçekleşti.');
        }else{
            return back()->with('error','Düzenleme işlemi başarısız.');
        }

    }
}
