<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Productcategories;

class ProductController extends Controller
{
    public function index(){
        $product = Products::all()->sortBy('must')->where('status',1);

        return view('frontend.product.index')->with('product',$product);
    }

    public function indextwo(){
        $cats = Productcategories::all()->where('status','1')->sortBy('must');

        return view('frontend.product.indextwo')->with('cats',$cats);
    }

    public function detail($id=null){
        //get detail data
        $p = Products::where([
            'id' => $id,
            'status' => '1'
        ])->first();

        if($p != null){
            $cats = Productcategories::leftJoin('pcommons', function($join) {
                $join->on('productcategories.id', '=', 'pcommons.c_id');
            })
            ->where('productcategories.status','1')
            ->where('p_id',$p->id)
            ->get([
                'productcategories.title',
                'productcategories.slug',
                'productcategories.status',
                'productcategories.id'
            ]);
        }

        if ($p === null) {
            return redirect(route('frontend.notfound'));
        }else{
            return view('frontend.product.detail')->with('product',$p)->with('cats',$cats);
        }
    }

    public function procat($id=1){
        $c = Productcategories::where('id',$id)->where('status','1')->first();
        if($c != null){
            $p = Products::leftJoin('pcommons', function($join) {
                $join->on('products.id', '=', 'pcommons.p_id');
            })
            ->where('c_id',$c->id)
            ->get([
                'products.title',
                'products.file',
                'products.short_content',
                'products.slug',
                'products.id'
            ]);
        }else{
            return redirect(route('frontend.notfound'));
        }

        return view('frontend.product.index')->with('product',$p)->with('cat',$c);
    }

    public function procattwo($id=1){
        $c = Productcategories::where('id',$id)->where('status','1')->first();

        $cats = Productcategories::all()->where('status','1')->sortBy('must');

        return view('frontend.product.indextwo')->with('cats',$cats)->with('cat',$c);
    }
}
