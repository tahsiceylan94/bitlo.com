<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Sliders::all()->sortBy('must');
        $data = [
            'sliders' => $sliders
        ];

        return view('backend.sliders.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
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
            'title' => 'required'
        ]);

        //seourl
        if(strlen($request->slug) > 3){
            $slug = Str::slug($request->slug);
        }else{
            $slug = Str::slug($request->title);
        }

        //file
        if($request->hasFile('sliderfile')){
            $request->validate([
                'sliderfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->sliderfile->getClientOriginalExtension();
            $request->sliderfile->move(public_path('images/sliders'),$file_name);
        }else{
            $file_name = null;
        }

        //insert
        $slider = Sliders::insert([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'file' => $file_name,
            'status' => $request->status,
        ]);

        if($slider){
            return redirect(route('slider.index'))->with('success','Ekleme işlemi tamamladı.');
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
        $slider = Sliders::where('id',intval($id))->first();
        return view('backend.sliders.edit')->with('slider',$slider);
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
            'title' => 'required'
        ]);

        //seourl
        if(strlen($request->slug) > 3){
            $slug = Str::slug($request->slug);
        }else{
            $slug = Str::slug($request->title);
        }

        //file
        if($request->hasFile('sliderfile')){
            $request->validate([
                'sliderfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->sliderfile->getClientOriginalExtension();
            $request->sliderfile->move(public_path('images/sliders'),$file_name);

            //update
            $slider = Sliders::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'file' => $file_name,
                'status' => $request->status,
            ]);

            $path = 'images/sliders/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            $slider = Sliders::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'status' => $request->status,
            ]);
        }



        if($slider){
            return redirect(route('slider.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $slider = Sliders::find(intval($id));
        if($slider->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $sliders = Sliders::find(intval($value));
            $sliders->must = intval($key);
            $sliders->save();
        }
        return true;
    }
}
