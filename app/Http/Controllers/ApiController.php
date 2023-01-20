<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function vintomodel(Request $request)
    {
        $vin=$request->vin;
        $models=DB::select("SELECT model FROM `vintomodel` where vin='". $vin."';");

       
        foreach ($models as $result) {
            $model=$result->model;
    
        }


        return [
            'vin' => $vin,
            'model' => $model
          
        ];
    }


    
}
