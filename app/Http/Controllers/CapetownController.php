<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class CapetownController extends Controller
{

    public function units_sales_capetown(Request $request)
    {
        $year=intval($request->year);
        $month=intval($request->month);
        $month_name= date('F', mktime(0, 0, 0, $month, 10)); 
        $initdate = Carbon::createFromFormat('Y-m-d', $year.'-'.$month.'-01');
        $dateto = $month!=0? $initdate->addMonth(1)->format('Y-m-d'):$initdate->addYear(1)->format('Y-m-d');

if($month!=0)
{
    $total_sales_per_month= DB::select("SELECT ArticuloDescripcion, SUM(Cantidad) as athroisma FROM `saleunitscapetown` where mesfactura=". $month." and anofactura=". $year."  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;");
    $month_name= date('F', mktime(0, 0, 0, $month, 10)); 
}
else

{
    $total_sales_per_month= DB::select("SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown` where anofactura=". $year."  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;");
    $month_name= ""; 


}


//dd($total_sales_per_month);
      
      // $total_sales_per_month= DB::select("SELECT ArticuloClasificacion1, SUM(Cantidad) as athroisma FROM saleunitscapetown where `FechaFactura`>='2021-12-01' and `Cliente`!='C/F' and `FechaFactura`<'2022-01-01' and `ArticuloDescripcion` like 'MOTO%' GROUP by ArticuloClasificacion1;");

$total_sales_per_month=$this->classify_without_color($total_sales_per_month);
        //dd($total_sales_per_month);
        //$today=date("Y-m-d");
        //$daily = CurrencyRates::daily();
        //dd($daily);
        //$history = CurrencyRates::history();
        // Exchange 20 EUR to USD from the rate attributes to the 2021-02-10 date
       // $rate_eur_cny=$history->findByDate($today)->rate(1, 'EUR', 'CNY');

//print_r( $total_sales_per_month);
        //return view('unit_sales')->with('rate_eur_cny',$rate_eur_cny);

        return  view('capetown.units_sales_capetown')->with('total_sales_per_month', $total_sales_per_month)->with('selected_year', $year)->with('selected_month', $month)->with('selected_month_name', $month_name);



    }



    public function units_sales_capetown_warehouse(Request $request)
    {
        $bodega=$request->bodega;
        $year=intval($request->year);
        $month=intval($request->month);
        $month_name= date('F', mktime(0, 0, 0, $month, 10)); 
        $initdate = Carbon::createFromFormat('Y-m-d', $year.'-'.$month.'-01');
        $dateto = $month!=0? $initdate->addMonth(1)->format('Y-m-d'):$initdate->addYear(1)->format('Y-m-d');

        if($bodega!=0)
        {
                                if($year!=0)
                                {
                                            if($month!=0)
                                            {
                                                $total_sales_per_warehouse= DB::select('SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown` where Bodega="'. $bodega.'" AND anofactura="'. $year.'" AND  mesfactura="'. $month.'"  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;');
                                                $month_name= date('F', mktime(0, 0, 0, $month, 10));
                                                 $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where anofactura="'. $year.'" AND  mesfactura="'. $month.'" ORDER BY Bodega;');
                                            }
                                            else
                                            {
                                                $total_sales_per_warehouse= DB::select('SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown` where Bodega="'. $bodega.'" AND anofactura="'. $year.'"  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;');
                                                $month_name= "";
                                                 $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where anofactura="'. $year.'" ORDER BY Bodega;');
                                            }
                                }
                                else
                                {
                                            if($month!=0)
                                            {
                                                $total_sales_per_warehouse= DB::select('SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown` where Bodega="'. $bodega.'"  AND  mesfactura="'. $month.'"  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;');
                                                $month_name= ""; 
                                                $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where  mesfactura="'. $month.'" ORDER BY Bodega;');
                                            }
                                            else
                                            {
                                                $total_sales_per_warehouse= DB::select('SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown` where Bodega="'. $bodega.'"  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;');
                                                $month_name= "";
                                                 $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` ORDER BY Bodega;');
                                            }
                                }   
                }

  
                else
                {






                    if($year!=0)
                    {
                                if($month!=0)
                                {
                                    $total_sales_per_warehouse= DB::select('SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown` where anofactura="'. $year.'" AND  mesfactura="'. $month.'"  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;');
                                    $month_name= date('F', mktime(0, 0, 0, $month, 10)); 
                                     $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where anofactura="'. $year.'" AND  mesfactura="'. $month.'" ORDER BY Bodega;;');
                                }
                                else
                                {
                                    $total_sales_per_warehouse= DB::select('SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown` where anofactura="'. $year.'"  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;');
                                    $month_name= ""; 
                                    $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where anofactura="'. $year.'" ORDER BY Bodega;');
                                }
                    }
                    else
                    {
                                if($month!=0)
                                {
                                    $total_sales_per_warehouse= DB::select('SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown` where  mesfactura="'. $month.'"  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;');
                                    $month_name= ""; 
                                    $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where  mesfactura="'. $month.'";');
                                }
                                else
                                {
                                    $total_sales_per_warehouse= DB::select('SELECT ArticuloDescripcion , SUM(Cantidad) as athroisma FROM `saleunitscapetown`  GROUP by ArticuloDescripcion ORDER BY ArticuloDescripcion ASC;');
                                    $month_name= ""; 
                                     $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` ;');
                                }
                    }   



















                    

                }






















       
        //$warehouses= DB::select("SELECT DISTINCT Bodega FROM saleunitscapetown ORDER BY Bodega;");
        //$warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where anofactura="'. $year.'" AND  mesfactura="'. $month.'";');


        return  view('capetown.units_sales_capetown_warehouse')->with('warehouses', $warehouses)->with('bodega', $bodega)->with('total_sales_per_warehouse', $total_sales_per_warehouse)->with('selected_year', $year)->with('selected_month', $month)->with('selected_month_name', $month_name);



    }


    











    public function make_raw_db_result_array($result_raw)
    {

        $result_array=array();
        foreach ($result_raw as $object_change) {
            $object_array=(array) $object_change;
            array_push($result_array,$object_array);
    
        }
         return  $result_array;
    
    }
    






    public function classify_without_color($result_raw)
    {
      
      
        $result=array();
       
        foreach ($result_raw as $object) {

            $desc=$object->ArticuloDescripcion;
            $units=$object->athroisma;
                        if (str_contains($desc, "MOTO ALMA 150"))

                        {
                            
                                    if(isset($result["ALMA 150"])){

                                        $result["ALMA 150"]+= $units;

                                    } else
                                    {$result["ALMA 150"]= $units;}

                        }
                        elseif (str_contains($desc, "MOTO ATLAS 200"))

                        {



                            if(isset($result["ATLAS 200"])){

                                $result["ATLAS 200"]+= $units;

                            } else
                        {$result["ATLAS 200"]= $units;}



                        }
                        elseif (str_contains($desc, "MOTO BRIO 125"))

                        {

//

                            if(isset($result["BRIO 125"])){

                                $result["BRIO 125"]+= $units;

                            } else
                        {$result["BRIO 125"]= $units;}

//
                        }
                        elseif (str_contains($desc, "MOTO BWS 150"))

                        {
                                //

                                if(isset($result["BWS 150"])){

                                    $result["BWS 150"]+= $units;

                                } else
                                {$result["BWS 150"]= $units;}

                                //


                        }
                        elseif (str_contains($desc, "MOTO CGR 200"))

                        {
                                //

                                if(isset($result["CGR 200"])){

                                    $result["CGR 200"]+= $units;

                                } else
                                {$result["CGR 200"]= $units;}

                                //


                        }

                        elseif (str_contains($desc, "MOTO ZORRO 180"))

                        {
                            //

                            if(isset($result["ZORRO 180"])){

                                $result["ZORRO 180"]+= $units;

                            } else
                        {$result["ZORRO 180"]= $units;}

//


                        }

                        elseif (str_contains($desc, "MOTO ORIZON 200"))

                        {
                            //

                            if(isset($result["ORIZON 200"])){

                                $result["ORIZON 200"]+= $units;

                            } else
                        {$result["ORIZON 200"]= $units;}

//


                        }

                        elseif (str_contains($desc, "MOTO RONIN 200"))

                        {
                            //

                            if(isset($result["RONIN 200"])){

                                $result["RONIN 200"]+= $units;

                            } else
                        {$result["RONIN 200"]= $units;}

//


                        }
                        elseif (str_contains($desc, "MOTO ZORRO 150"))

                        {
                            //

                            if(isset($result["ZORRO 150"])){

                                $result["ZORRO 150"]+= $units;

                            } else
                        {$result["ZORRO 150"]= $units;}

//


                        }

                        elseif (str_contains($desc, "MOTO EVOLUTION 110"))

                        {
                            //

                            if(isset($result["EVOLUTION 110"])){

                                $result["EVOLUTION 110"]+= $units;

                            } else
                        {$result["EVOLUTION 110"]= $units;}

//
                     }

                        elseif (str_contains($desc, "TUC TUC 200"))

                        {
                            //

                            if(isset($result["TUC 200"])){

                                $result["TUC 200"]+= $units;

                            } else
                        {$result["TUC 200"]= $units;}

//


                        }

                        else
                        {
                            //

                            if(isset($result[$desc])){

                                $result[$desc]+= $units;

                            } else
                        {$result[$desc]= $units;}

//

                        }














    
        }






        //dd($result);

         return $result;
    
    }




   public function group_by($key, $data) {
        $result = new stdClass();
    
        foreach($data as $object) {
            if(property_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
    
        return $result;
    }







        //////////////////////////////////helper functions/////////////////////////
        //ayto epistrefei json gia na gemisei ta selects sto bodega meta thn epilogh hmerominias


        public function fetch_select_bodegas(Request $request)
        {

           $year=intval($request->year);
           $month=intval($request->month);
           $warehouses=$year;

           if($year!=0)
           {
                       if($month!=0)
                       {
                     $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where anofactura="'. $year.'" AND  mesfactura="'. $month.'";');
                       }
                       else
                       {
                        $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where anofactura="'. $year.'";');
                       }
           }
           else
           {
                       if($month!=0)
                       {
                        $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown` where mesfactura="'. $month.'";');
                       }
                       else
                       {
                        $warehouses= DB::select('SELECT DISTINCT bodega FROM `saleunitscapetown`;');
                       }
           }   


                return response()->json(['data'=>$warehouses]);
         }


     //ayto epistrefei json gia na gemisei ta selects sto bodega meta thn epilogh hmerominias





















    //
}
