<?php

namespace App\Http\Controllers\Backend;

use App\Models\Footers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footers::all()->sortBy('must');
        $data = [
            'footers' => $footers
        ];

        return view('backend.footers.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footers.create');
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
        $footer = Footers::where('id',intval($id))->first();
        return view('backend.footers.edit')->with('footer',$footer);
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

        $footer = Footers::Where('id',$id)->update([
            'description' => $request->description,
            'status' => $request->status,
            'type' => $request->type,
            'value' => $request->value,
        ]);


        if($footer){
            return redirect(route('footer.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $footer = Footers::find(intval($id));
        if($footer->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $footers = Footers::find(intval($value));
            $footers->must = intval($key);
            $footers->save();
        }
        return true;
    }
}
