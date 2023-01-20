<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;






class EuropeController extends Controller
{
    

    public function units_stock_europe(Request $request)
    {
  


    $total_stock_per_model_per_warehouse= DB::select("SELECT * FROM (SELECT `Warehouse`,`ItemDescription` as 'Model', SUM(`Balance`) as 'Stock' FROM `europe_warehouse` GROUP by `ItemDescription`,`Warehouse`) AS t1 WHERE t1.Stock>0;");
    
    
    
    

   // dd($total_stock_per_model_per_warehouse);
        
        $warehouse_stock=$this->make_raw_db_result_array($total_stock_per_model_per_warehouse);
        //dd($warehouse_stock);
        //$today=date("Y-m-d");
        //$daily = CurrencyRates::daily();
        //dd($daily);
        //$history = CurrencyRates::history();
        // Exchange 20 EUR to USD from the rate attributes to the 2021-02-10 date
       // $rate_eur_cny=$history->findByDate($today)->rate(1, 'EUR', 'CNY');

//print_r( $total_sales_per_month);
        //return view('unit_sales')->with('rate_eur_cny',$rate_eur_cny);
        return  view('europe.units_stock_europe')->with('warehouse_stock', $warehouse_stock);

    }


    public function make_raw_db_result_array($result_raw)
    {
        //print_r( $result_raw);
        $result_array=array();
       
        foreach ($result_raw as $object_change) {
            $object_array=(array) $object_change;
            array_push($result_array,$object_array);
    
        }
  



        return  $result_array;
    
    }















}
