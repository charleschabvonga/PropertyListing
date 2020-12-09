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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'Create', 'store']]);
});

Route::resource('properties', 'PropertyController')->middleware('auth');

Route::get('bids', 'BidController@index')->middleware('auth')->name('bids.index');
Route::get('bids/{property_id}', 'BidController')->middleware('auth')->name('bids.index.id');
Route::get('bids/create/{id}', 'BidController@create')->middleware('auth')->name('bid.create.id');
Route::post('bids', 'BidController@store')->middleware('auth')->name('bids.store');
Route::get('bids/{bid}', 'BidController@show')->middleware('auth')->name('bids.show');
Route::get('bids/{bid}/edit', 'BidController@edit')->middleware('auth')->name('bids.edit');
Route::put('bids/{bid}', 'BidController@update')->middleware('auth')->name('bids.update');
Route::delete('bids/{bid}', 'BidController@destroy')->middleware('auth')->name('bids.destroy');


