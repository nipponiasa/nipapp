<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Hash;
use AlxDorosenco\EcbRates\CurrencyRates;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today=date("Y-m-d");
        $daily = CurrencyRates::daily();
        //dd($daily);
        //$history = CurrencyRates::history();
        // Exchange 20 EUR to USD from the rate attributes to the 2021-02-10 date
       // $rate_eur_cny=$history->findByDate($today)->rate(1, 'EUR', 'CNY');
        $rate_eur_cny=$daily->rate(1, 'EUR', 'CNY');
        $rate_usd_cny=$daily->rate(1, 'USD', 'CNY');
        $rate_eur_usd=$daily->rate(1, 'EUR', 'USD');



        return view('home')->with('rate_eur_cny',$rate_eur_cny)->with('rate_usd_cny',$rate_usd_cny)->with('rate_eur_usd',$rate_eur_usd)->with('today',$today);
    }






    public function fetch_user_info(Request $request)
    {
        $userid = intval($request->input('userid'));
        $user_current = DB::table('users')->where('id', $userid)->first();
//dd( $moto_current);
        return view('admin.user_edit_form')->with('user_current',$user_current);
    }

    public function update_user(Request $request, User $users)
    {
       
        $user = User::find(intval($request->input('id')));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role=$request->input('role');
       
        $user->save();
        return redirect()->route('user_list');


    }

    public function fetch_user_info_password(Request $request)
    {
        $userid = intval($request->input('userid'));
        $user_current = DB::table('users')->where('id', $userid)->first();
//dd( $moto_current);
        return view('admin.user_password_reset')->with('user_current',$user_current);
    }

    public function reset_user_password(Request $request, User $users)
    {
       
        $user = User::find(intval($request->input('id')));
        //dd($user);
        $user ->password=Hash::make($request->input('password'));
       
        $user->save();
        return redirect()->route('user_list');


    }





    public function user_delete(Request $request, User $users)
    {
       
        $user = User::find(intval($request->input('userid')));
        $user->delete();
        return redirect()->route('user_list');


    }







    public function create_user(Request $request, User $users)
    {
       
        $user = new User;
        $user ->name = $request->input('name');
        $user ->email = $request->input('email');
        $user ->password=Hash::make($request->input('password'));
        $user ->role = $request->input('role');
        $user->save();
        return redirect()->route('user_list');

        
    }


































}
