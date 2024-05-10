<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DominicanController extends Controller
{

    
    public function list_customers()
    {
     


        $client_list= DB::select(
            " SELECT MAX(gxname) as gxname,MAX(relcode) AS relcode,MAX(altcode) AS altcode, IF(relcode=altcode or relcode='', altcode, concat(relcode,',',altcode)) as codename 
            FROM `sales_year_rd` WHERE RIGHT(altcode, 1) = 'D' AND altcode NOT IN ('MID', 'TAD')
            GROUP BY altcode,codename ; 
        ");



//dd($client_list);


     return  view('rd.clients_rd')->with('client_list', $client_list);
 }


 public function customer_show(Request $request)
 {

    $current_customer=$request->customer_code;
    $current_customer_alt=$this->customer_altcode($current_customer);
    
    //$years= DB::select("SELECT DISTINCT year_sold FROM sales_year_rd WHERE altcode='".$current_customer."';");
    $sales= DB::select("SELECT moto_group as moto_description,year_sold, SUM(units) as units, SUM(turnover) as turnover FROM sales_year_rd WHERE turnover!=0.0 AND year_sold>2019 AND (altcode='".$current_customer."' or altcode='".$current_customer_alt."') GROUP BY moto_group,year_sold ORDER BY moto_description ;");
    //dd($sales);
foreach($sales as $sale)

{

  $sales_table[$sale->moto_description][$sale->year_sold]['u']=$sale->units;
  $sales_table[$sale->moto_description][$sale->year_sold]['t']=$sale->turnover;

}

//dd($sales_table);

    $sales_chart= DB::select("SELECT moto_group as moto_description, SUM(units) as units, SUM(turnover) as turnover FROM sales_year_rd WHERE turnover!=0.0 AND year_sold>2019 AND altcode='".$current_customer."' or altcode='".$current_customer_alt."' GROUP BY moto_group;");
    //$sales_chart_turnover= DB::select("SELECT  altcode, moto_group, gxname, moto_description,year_sold, SUM(units) as units, SUM(turnover) as turnover FROM sales_year_rd WHERE altcode='".$current_customer."' GROUP BY altcode, moto_group, gxname, moto_description,year_sold ORDER BY moto_description;");
//dd($sales_chart);

  //$years= DB::select("SELECT DISTINCT year_sold FROM sales_year_rd WHERE altcode='".$current_customer."';");
  $pen_sales= DB::select("SELECT * FROM pending_sales_rds WHERE order_code LIKE '%".$current_customer."%' OR order_code LIKE '%".$current_customer_alt."%' ;");
  //dd($pen_sales);

//dd($sales_table);


$customer_alt_code= $this->customer_altcode($current_customer);
//dd($customer_alt_code);
$customer_balance= DB::select("SELECT  * FROM customer_balance_rds WHERE customer_code ='".$current_customer."';");



$customer_balance_alt=DB::select("SELECT  * FROM customer_balance_rds WHERE customer_code ='".$customer_alt_code."';");

if(array_key_exists('0',$customer_balance_alt))
{
  $customer_balance=$customer_balance_alt;
}




//dd($customer_balance_alt);
//$customer_balance= number_format($customer_balance1[0]->balance,2).' '.$customer_balance1[0]->currency;





//dd($customer_balance);


  return  view('rd.current_client_rd')->with('sales_table', $sales_table)->with('sales_chart', $sales_chart)->with('current_customer',  $current_customer)->with('customer_alt_code',  $customer_alt_code)->with('pen_sales',  $pen_sales)->with('customer_balance',  $customer_balance)->with('customer_balance_alt',  $customer_balance_alt);
}




public function customer_altcode($current_customer)
{

 switch ($current_customer) {
    case 'DJD':
      $customer_alt_code='DID';
      break;
    case 'GAD':
      $customer_alt_code='TAD';
      break;
    case 'MJD':
      $customer_alt_code='MID';
      break;
    case 'MPD':
        $customer_alt_code='MRD';
      break;
    case 'RMD':
        $customer_alt_code='RJD';
      break;
    default:
    $customer_alt_code=$current_customer;
   } 
  return  $customer_alt_code;
}

}
