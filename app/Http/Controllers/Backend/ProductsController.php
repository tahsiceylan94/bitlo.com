<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\Productcategories;
use App\Models\Pcommons;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all()->sortBy('must');
        $data = [
            'products' => $products
        ];

        return view('backend.products.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Ürün kategorilerinin eklenmesi
        function getCategoryTree($parent_id=null, $spacing = '', $tree_array = array()) {
            $categories = Productcategories::select('id', 'title', 'parent_id')->where('parent_id' ,'=', $parent_id)->where('status','1')->orderBy('parent_id')->get();
            foreach ($categories as $item){
                $tree_array[] = ['categoryId' => $item->id, 'categoryName' =>$spacing . $item->title] ;
                $tree_array = getCategoryTree($item->id, $spacing . '--', $tree_array);
            }
            return $tree_array;
        }
        //seçili kategorileri bulma
        //$c = Productcategories::all()->where('status','1')->get();

        //kategorileri döndürme
        $cats = "";
        foreach (getCategoryTree(null,'') as $k){
            $cats .= '<option value="'.$k['categoryId'].'">'.$k['categoryName'].'</option>';
        }

        return view('backend.products.create')->with('cats',$cats);
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
        if($request->hasFile('productfile')){
            $request->validate([
                'productfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->productfile->getClientOriginalExtension();
            $request->productfile->move(public_path('images/products'),$file_name);
        }else{
            $file_name = null;
        }

        //insert
        $product = Products::create([
            'title' => $request->title,
            'content' => $request->content,
            'short_content' => $request->short_content,
            'slug' => $slug,
            'file' => $file_name,
            'status' => $request->status,
            'fiyat' => $request->fiyat,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        //kategori sil ve ekle
        if($request->cats != null) {
            foreach ($request->cats as $addnew) {
                Pcommons::insert([
                    'p_id' => $product->id,
                    'c_id' => $addnew,
                ]);
            }
        }


        if($product){
            return redirect(route('product.index'))->with('success','Ekleme işlemi tamamladı.');
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

        function getCategoryTree($parent_id=null, $spacing = '', $tree_array = array()) {
            $categories = Productcategories::select('id', 'title', 'parent_id')->where('parent_id' ,'=', $parent_id)->where('status','1')->orderBy('parent_id')->get();
            foreach ($categories as $item){
                $tree_array[] = ['categoryId' => $item->id, 'categoryName' =>$spacing . $item->title] ;
                $tree_array = getCategoryTree($item->id, $spacing . '--', $tree_array);
            }
            return $tree_array;
        }

        //seçili kategorileri bulma
        $c = Pcommons::where('p_id',$id)->get();

        //kategorileri döndürme
        $cats = "";
        foreach (getCategoryTree(null,'') as $k){
            $cats .= '<option value="'.$k['categoryId'].'"';
            foreach ($c as $ctr){
                if($k['categoryId'] == $ctr->c_id){$cats .= 'selected';}
            }
            $cats .='>'.$k['categoryName'].'</option>';
        }

        $product = Products::where('id',intval($id))->first();
        return view('backend.products.edit')->with('product',$product)->with('cats',$cats);
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
        if($request->hasFile('productfile')){
            $request->validate([
                'productfile' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid().'.'.$request->productfile->getClientOriginalExtension();
            $request->productfile->move(public_path('images/products'),$file_name);

            //update
            $product = Products::Where('id',$id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'short_content' => $request->short_content,
                'slug' => $slug,
                'file' => $file_name,
                'status' => $request->status,
                'fiyat' => $request->fiyat,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
            ]);

            $path = 'images/products/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }

        }else{
            //update
            if($request->removethisfile == 1) {
                $product = Products::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'short_content' => $request->short_content,
                    'slug' => $slug,
                    'file' => "",
                    'status' => $request->status,
                    'fiyat' => $request->fiyat,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                ]);
                $path = 'images/products/'.$request->old_file;
                if(file_exists($path)){
                    @unlink(public_path($path));
                }
            }else {
                $product = Products::Where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'short_content' => $request->short_content,
                    'slug' => $slug,
                    'status' => $request->status,
                    'fiyat' => $request->fiyat,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                ]);
            }
        }

        //kategori sil ve ekle
        if($request->cats != null) {
            Pcommons::Where('p_id', $id)->delete();

            foreach ($request->cats as $addnew) {
                echo $addnew;
                Pcommons::insert([
                    'p_id' => $id,
                    'c_id' => $addnew,
                ]);
            }
        }else{
            Pcommons::Where('p_id', $id)->delete();
        }

        if($product){
            return redirect(route('product.edit',$id))->with('success','Ekleme işlemi tamamladı.');
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
        $product = Products::find(intval($id));
        if($product->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $products = Products::find(intval($value));
            $products->must = intval($key);
            $products->save();
        }
        return true;
    }
}
