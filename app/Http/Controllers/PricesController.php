<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use AlxDorosenco\EcbRates\CurrencyRates;
use Illuminate\Support\Facades\DB;


class PricesController extends Controller
{
  
        
    public function create_price(Request $request)
    {
      //dd($request);
        
       //$this->validate($request,[
       // 'fixed_price'=>'required',
       // 'product'=>'required'
     //]);


        $offer_type = $request->offer_type;
        $price_capture_date = $request->input('price_capture_date');
        $order_name = $request->input('order_name');
        $product = $request->input('product');
        $packing = $request->input('packing');
        $packingqty = isset($request->packingqty)?$request->input('packingqty'):"NA";
        $us_yuan_at_date = floatval($request->input('us_yuan_at_date'));
        $eur_yuan_at_date = floatval($request->input('eur_yuan_at_date'));
        $eur_us_at_date = floatval($request->input('eur_us_at_date'));
        $fixed_price = isset($request->fixed_price);
        $is_active=true;
        $comments = isset($request->comments)?$request->input('comments'):"";
        $created_by=auth()->user()->id;
if ($request->currencysign==="yuan")
{
        $price_yuan = floatval($request->input('price'));
        $price_us = 0.0;
}
else
{
        $price_us = floatval($request->input('price'));
        $price_yuan = 0.0;
}





//dd($path);
        if($request->hasFile('proovingdoc'))
        { 
                $request->validate(['proovingdoc' => 'required|mimes:pdf,xlx,csv|max:5000',]);
                $fileName = time().'.'.$request->proovingdoc->extension();  
                $request->proovingdoc->move(public_path('uploads'), $fileName);
                $path='/uploads/'.$fileName;
      
        } else
        {$path=null;}


        $path_to_attachments = $path;





        $insert_result=DB::insert('insert into track_prices  
        (
            offer_type,
            price_capture_date,
            order_name,
            product,
            packing,
            price_us,
            price_yuan,
            us_yuan_at_date,
            eur_yuan_at_date,
            eur_us_at_date,
            is_active,
            packingqty,
            comments,
            created_by,
            path_to_attachments
           ) values
        (?,?,?,?,?,
        ?,?,?,?,?,
        ?,?,?,?,?
        )', 
        [''.
         $offer_type
         .'', ''.
         $price_capture_date
         .'', ''.
         $order_name
         .'', ''.
         $product
         .'', ''.
         $packing
         .'', ''.
         $price_us
         .'', ''.
         $price_yuan
         .'', ''.
         $us_yuan_at_date
         .'', ''.
         $eur_yuan_at_date
         .'', ''.
         $eur_us_at_date
         .'', ''.
         $is_active
         .'', ''.
         $packingqty
         .'', ''.
         $comments
         .'', ''.
         $created_by
         .'', ''.
         $path_to_attachments
        ]);
            
    







        


        return redirect()->route('price_tracking');

        
    }



    public function list_prices()
    {

  $daily = CurrencyRates::daily();
        $rate_eur_cny=$daily->rate(1, 'EUR', 'CNY');
        $rate_usd_cny=$daily->rate(1, 'USD', 'CNY');
        $rate_eur_usd=$daily->rate(1, 'EUR', 'USD');

        
        $price_table=DB::select(DB::raw('SELECT  track_prices.id, track_prices.price_capture_date, track_prices.price_yuan , track_prices.order_name, track_prices.path_to_attachments   , track_prices.price_us , track_prices.offer_type , track_prices.us_yuan_at_date, products.model ,track_prices.packing,track_prices.packingqty,track_prices.comments, products.country ,products.maker FROM track_prices join products on track_prices.product=products.id WHERE track_prices.is_active=1;'));
//dd($price_table);
        return view('appprices.price_tracking')->with('rate_eur_cny',$rate_eur_cny)->with('rate_usd_cny',$rate_usd_cny)->with('rate_eur_usd',$rate_eur_usd)->with('price_table',$price_table);
    }


    public function fetch_price_info_modal(Request $request)
    {
        $priceid = intval($request->input('priceid'));
     
        $price_current =DB::select(DB::raw('SELECT * FROM track_prices join products on track_prices.product=products.id WHERE track_prices.is_active=1 AND track_prices.id='. $priceid.';'));
        //$price_current = DB::table('track_prices')->where('id', $priceid)->first();

        return response()->json(['data'=>$price_current]);
     }

     public function delete_price(Request $request)
     {
         $priceid = intval($request->input('priceid'));
   
         $updated = DB::table('track_prices')
         ->where('id', $priceid)
         ->update(['is_active' => 0]);


         return redirect()->route('price_tracking');
      }
     










}
