<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Productcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcategories = Productcategories::all()->sortBy('must');
        $data = [
            'productcategories' => $productcategories
        ];

        return view('backend.productcategories.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.productcategories.create');
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
        if($request->hasFile('productcategoryfile')){
            $request->validate([
                'productcategoryfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->productcategoryfile->getClientOriginalExtension();
            $request->productcategoryfile->move(public_path('images/productcategories'),$file_name);
        }else{
            $file_name = null;
        }

        //insert
        $productcategory = Productcategories::insert([
            'title' => $request->title,
            'content' => $request->content,
            'short_content' => $request->short_content,
            'slug' => $slug,
            'file' => $file_name,
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        if($productcategory){
            return redirect(route('productcategory.index'))->with('success','Ekleme işlemi tamamladı.');
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
        $productcategory = Productcategories::where('id',intval($id))->first();
        return view('backend.productcategories.edit')->with('productcategory',$productcategory);
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
        if($request->hasFile('productcategoryfile')){
            $request->validate([
                'productcategoryfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->productcategoryfile->getClientOriginalExtension();
            $request->productcategoryfile->move(public_path('images/productcategories'),$file_name);

            //update
            $productcategory = Productcategories::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'short_content' => $request->short_content,
                'slug' => $slug,
                'file' => $file_name,
                'status' => $request->status,
                'parent_id' => $request->parent_id,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
            ]);

            $path = 'images/productcategories/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            if($request->removethisfile == 1) {
                $productcategory = Productcategories::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'short_content' => $request->short_content,
                    'slug' => $slug,
                    'file' => "",
                    'status' => $request->status,
                    'parent_id' => $request->parent_id,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                ]);
                $path = 'images/productcategories/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else {
                $productcategory = Productcategories::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'short_content' => $request->short_content,
                    'slug' => $slug,
                    'status' => $request->status,
                    'parent_id' => $request->parent_id,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                ]);
            }
        }



        if($productcategory){
            return redirect(route('productcategory.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $productcategory = Productcategories::find(intval($id));
        if($productcategory->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $productcategories = Productcategories::find(intval($value));
            $productcategories->must = intval($key);
            $productcategories->save();
        }
        return true;
    }
}
