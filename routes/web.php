<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('/login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//App prices routes
Route::get('/product_list', function() {return view('appprices.product_list');})->name('product_list')->middleware('auth');
//Route::get('/product_list', [App\Http\Controllers\ProductController::class, 'list_products'])->name('product_list');
Route::post('/create_new_product', [App\Http\Controllers\ProductController::class,'create_product'])->name('create_new_product')->middleware('auth');
//Route::get('/price_tracking', function() {return view('price_tracking');})->name('price_tracking')->middleware('auth');
//Route::get('/product_list', [App\Http\Controllers\ProductController::class, 'list_products'])->name('product_list');
Route::post('/create_new_price', [App\Http\Controllers\PricesController::class,'create_price'])->name('create_new_price')->middleware('auth');
Route::get('/price_tracking', [App\Http\Controllers\PricesController::class,'list_prices'])->name('price_tracking')->middleware('auth');
Route::get('/price_tracking', [App\Http\Controllers\PricesController::class,'list_prices'])->name('price_tracking')->middleware('auth');
Route::get('/price_edit_form_modal', [App\Http\Controllers\PricesController::class, 'fetch_price_info_modal'])->name('price_edit_form_modal')->middleware('auth');
Route::get('/price_delete_form', [App\Http\Controllers\PricesController::class, 'delete_price'])->name('price_delete')->middleware('auth');
//App prices routes



//admin routes
Route::get('/user_list', function() {return view('admin.user_list');})->name('user_list')->middleware('auth');
Route::get('/user_edit_form', [App\Http\Controllers\HomeController::class, 'fetch_user_info'])->name('user_edit_form')->middleware('auth');
Route::get('/user_password_reset', [App\Http\Controllers\HomeController::class,'fetch_user_info_password'])->name('user_password_reset')->middleware('auth');
Route::get('/user_create_form', function() {return view('admin.user_create_form');})->name('user_create_form')->middleware('auth');
Route::post('/create_new_user', [App\Http\Controllers\HomeController::class,'create_user'])->name('create_new_user')->middleware('auth');
Route::post('/reset_user_password', [App\Http\Controllers\HomeController::class, 'reset_user_password'])->name('reset_user_password')->middleware('auth');
Route::get('/user_delete', [App\Http\Controllers\HomeController::class,'user_delete'])->name('user_delete')->middleware('auth');
Route::post('/update_user_details', [App\Http\Controllers\HomeController::class,'update_user'])->name('update_user_details')->middleware('auth');
//admin routes

//europe routes
Route::get('/units_stock_europe', [App\Http\Controllers\EuropeController::class,'units_stock_europe'])->name('units_stock_europe')->middleware('auth');//sharepoint test
//europe routes



//capetown routes
Route::get('/units_sales_capetown', [App\Http\Controllers\CapetownController::class,'units_sales_capetown'])->name('units_sales_capetown')->middleware('auth');
Route::get('/units_sales_capetown_warehouse', [App\Http\Controllers\CapetownController::class,'units_sales_capetown_warehouse'])->name('units_sales_capetown_warehouse')->middleware('auth');
//capetown routes


//test routes sharepoint
Route::get('/list_uin', [App\Http\Controllers\UinController::class,'list_uin'])->name('list_uin')->middleware('auth');//sharepoint test
//test routes sharepoint



//routes RD
Route::get('/customers_rd', [App\Http\Controllers\DominicanController::class,'list_customers'])->name('list_customers')->middleware('auth');//sharepoint test
Route::get('/current_customer/{customer_code}/{customer_altcode}', [App\Http\Controllers\DominicanController::class,'customer_show'])->name('customer_show')->middleware('auth');//sharepoint test
//routes RD

//ajax routes
Route::get('/units_sales_capetown_warehouse/fetch_select_bodegas', [App\Http\Controllers\CapetownController::class,'fetch_select_bodegas'])->name('fetch_select_bodegas')->middleware('auth');
//ajax routes


