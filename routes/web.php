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


Route::group(['middleware' => ['web']], function () {
    // add your all routes here to store session

Route::get('workers/edit/{id}','WorkersController@edit')->middleware('can:isAdmin');
Route::post('workers/edit/','WorkersController@editStore');
Route::get('workers/create','WorkersController@create');
Route::get('workers/','WorkersController@index')->middleware('can:isAdmin');
Route::post('workers/','WorkersController@store');
Route::get('workers/delete/{id}','WorkersController@delete');
Route::get('workers/{id}','WorkersController@show');

Route::get('print_outs/','Print_OutsController@index');
Route::get('print_outs/create','Print_OutsController@create');
Route::post('print_outs/','Print_OutsController@store');


Route::get('pn/edit/{id}','PartNumbersController@edit');
Route::post('pn/edit/','PartNumbersController@editStore');
Route::get('pn/','PartNumbersController@index');
Route::get('pn/create','PartNumbersController@create');
Route::post('pn/','PartNumbersController@store');
Route::get('pn/delete/{id}','PartNumbersController@delete');


Route::get('layouts/edit/{id}','LayoutsController@edit');
Route::post('layouts/edit/','LayoutsController@editStore');
Route::get('layouts/','LayoutsController@index');
Route::get('layouts/create','LayoutsController@create');
Route::post('layouts/','LayoutsController@store');
Route::get('layouts/delete/{id}','LayoutsController@delete');

Route::get('printers/edit/{id}','PrintersController@edit');
Route::post('printers/edit/','PrintersController@editStore');
Route::get('printers/','PrintersController@index');
Route::get('printers/create','PrintersController@create');
Route::post('printers/','PrintersController@store');
Route::get('printers/delete/{id}','PrintersController@delete');


Route::get('computer/edit/{id}','ComputerController@edit');
Route::post('computer/edit/','ComputerController@editStore');

Route::get('/computer','ComputerController@index');
Route::get('computer/create','ComputerController@create');
Route::post('computer/','ComputerController@store');
Route::get('computer/delete/{id}','ComputerController@delete');
Route::get('computer/szukaj','ComputerController@szukaj');

Route::get('location/edit/{id}','LocationController@edit');
Route::post('location/edit/','LocationController@editStore');
Route::get('location/','LocationController@index');
Route::get('location/create','LocationController@create');
Route::post('location/','LocationController@store');
Route::get('location/delete/{id}','LocationController@delete');

Route::get('monitor/edit/{id}','MonitorController@edit');
Route::post('monitor/edit/','MonitorController@editStore');
Route::get('monitor/','MonitorController@index');
Route::get('monitor/create','MonitorController@create');
Route::post('monitor/','MonitorController@store');
Route::get('monitor/delete/{id}','MonitorController@delete');

Route::get('items/edit/{id}','ItemsController@edit');
Route::post('items/edit/','ItemsController@editStore');
Route::get('items/','ItemsController@index');
Route::get('items/create','ItemsController@create');
Route::post('items/','ItemsController@store');
Route::get('items/delete/{id}','ItemsController@delete');

Auth::routes();

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
