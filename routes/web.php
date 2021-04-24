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
    return view('welcome');
 });

 Route::get('/dw', function () {
    return 'Danny Wehbi';
 });

Auth::routes(['verify' => true]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('fillable','App\Http\Controllers\CrudController@getoffers');

Route::group(['prefix'=>'offers'],function(){
   Route::post('store','App\Http\Controllers\CrudController@store')->name('offers.store');
   Route::get('create','App\Http\Controllers\CrudController@create');
   Route::get('all','App\Http\Controllers\CrudController@getAllOffers');
});
