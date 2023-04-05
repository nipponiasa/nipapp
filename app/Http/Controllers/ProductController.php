<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   
    

    public function list_products()
    {
        return view('appprices.product_list');
    }




    public function create_product(Request $request, Product $products)
    {
       
        $product = new Product;
        $product ->maker = $request->input('maker');
        $product ->type = $request->input('type');
        $product ->model = $request->input('model');
        $product ->country = $request->input('country');
        $product->save();

        return redirect()->route('product_list');

    }


    
    public function edit_product(Request $request, Product $products)
    {

        $productid = intval($request->input('id'));
        $product = Product::where('id',$productid)->first();
        $product->maker = $request->input('maker');
        $product->type = $request->input('type');
        $product->model = $request->input('model');
        $product->country = $request->input('country');
        $product->save();

        return redirect()->route('product_list');
          
    }


    public function delete_product(Request $request)
    {
        $productid = intval($request->input('productid'));
        $product = Product::where('id',$productid)->first();
        $product->delete();
  
        // TODO: make non-active or warn user...
        // ->update(['is_active' => 0]);


        return redirect()->route('product_list');
     }
    


   





























}
