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

//Route::get('/', function () {
//    return view('welcome');
//});

//login
Route::get('/','AuthController@getLogin')->name('login');
Route::post('/','AuthController@login')->name('postLogin');
Route::get('/logout','AuthController@logout')->name('logout');
Route::get('/signup','AuthController@getSignup')->name('getsignup');
Route::post('/signup','AuthController@signup')->name('signup');


Route::get('/getCreateUser','AdminController@getCreateUser')->name('getCreateUser');

Route::middleware(['checktype:admin'])->prefix('admin')->group(function(){

});

Route::middleware(['checktype:student'])->prefix('student')->group(function(){

});


//lecture
Route::middleware(['checktype:teacher'])->prefix('lecture')->group(function(){


});
