<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::all()->sortBy('must');
        $data = [
            'contacts' => $contacts
        ];

        return view('backend.contacts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contacts.create');
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
        $contact = Contacts::where('id',intval($id))->first();
        return view('backend.contacts.edit')->with('contact',$contact);
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

        if($request->hasFile('value')){
            $request->validate([
                'value' => 'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);

            //dosya adı değiştirme
            $file_name = uniqid().'.'.$request->value->getClientOriginalExtension();

            //dosya kaydetme/taşıma
            $request->value->move(public_path('images/contact'),$file_name);

            //dosya ismini değiştirme
            $request->value = $file_name;
        }

        $contact = Contacts::Where('id',$id)->update([
            'description' => $request->description,
            'status' => $request->status,
            'value' => $request->value,
        ]);

        if($contact){
            return redirect(route('contact.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $contact = Contacts::find(intval($id));
        if($contact->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $contacts = Contacts::find(intval($value));
            $contacts->must = intval($key);
            $contacts->save();
        }
        return true;
    }
}
