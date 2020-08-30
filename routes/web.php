<?php

use App\Models\Order;
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
    $orders = Order::all();
    return view('orden.index', compact('orders'));
});

Route::resource('operator', 'OperatorController');
Route::resource('typeOrden', 'TypeOrderController');
Route::resource('orden', 'OrderController');
Route::post('orden-excel', 'OrderController@import')->name('orders.excel');
