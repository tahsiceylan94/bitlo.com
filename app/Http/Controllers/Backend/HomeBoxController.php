<?php

namespace App\Http\Controllers\Backend;
use App\Models\Homes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeBoxController extends Controller
{
    public function index()
    {
        $homes = Homes::all()->sortBy('must');
        $data = [
            'homes' => $homes
        ];

        return view('backend.homes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.homes.create');
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
        $slug = $request->slug;

        //file
        if($request->hasFile('homefile')){
            $request->validate([
                'homefile' => 'required|image|mimes:jpg,jpeg,png|max:4048'
            ]);

            $file_name = uniqid().'.'.$request->homefile->getClientOriginalExtension();
            $request->homefile->move(public_path('images/homes'),$file_name);
        }else{
            $file_name = null;
        }

        //insert
        $home = Homes::insert([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'file' => $file_name,
            'status' => $request->status,
        ]);

        if($home){
            return redirect(route('home.index'))->with('success','Ekleme işlemi tamamladı.');
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
        $home = Homes::where('id',intval($id))->first();
        return view('backend.homes.edit')->with('home',$home);
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
        $slug = $request->slug;

        //file
        if($request->hasFile('homefile')){
            $request->validate([
                'homefile' => 'required|image|mimes:jpg,jpeg,png|max:4048'
            ]);

            $file_name = uniqid().'.'.$request->homefile->getClientOriginalExtension();
            $request->homefile->move(public_path('images/homes'),$file_name);

            //update
            $home = Homes::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'file' => $file_name,
                'status' => $request->status,
            ]);

            $path = 'images/homes/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            $home = Homes::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'status' => $request->status,
            ]);
        }



        if($home){
            return redirect(route('home.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $home = Homes::find(intval($id));
        if($home->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $homes = Homes::find(intval($value));
            $homes->must = intval($key);
            $homes->save();
        }
        return true;
    }
}
