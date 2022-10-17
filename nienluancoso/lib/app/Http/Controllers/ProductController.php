<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddproductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function getProduct(){
        return view('backend.product');
    }

    public function getAddProduct(){
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddproductRequest $request){
        $filename = $request->img->getClientOriginalName();
        $product = new Product();
        $product->prod_name = $request->name;
        $product->prod_slug = str::slug($request->name);
        $product->prod_img = $filename;
        $product->prod_accessories = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_candition = $request->candition;
        $product->prod_status = $request->status;
        $product->prod_description	 = $request->description ;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $product->save();
        $request->img->storeAs('avatar', $filename);
        
        return redirect()->intended('admin/product/add');
        //return redirect()->intended('admin/product');
    }

    public function getEditProduct(){
        return view('backend.editproduct');
    }

    public function getDeleteProduct(){

    }

}
