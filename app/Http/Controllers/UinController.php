<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Thybag\SharePointAPI;
class UinController extends Controller
{
   
    

    public function list_uin()
    {

        $sp = new SharePointAPI('technicaldo@nipponia.com', 'n1pp0c@ribe', 'Lists.asmx.xml', 'SPONLINE');

        $r=$sp->query('UIN')->limit(10)->get();
        //$sp->getLists();
        dd($r);




        return view('tests.list_uin');
    }






   





























}
