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


   





























}
