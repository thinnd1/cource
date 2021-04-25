<?php

use Illuminate\Support\Facades\Route;

//login
Route::get('/','AuthController@getLogin')->name('login');
Route::post('/','AuthController@login')->name('postLogin');
Route::get('/logout','AuthController@logout')->name('logout');
Route::get('/signup','AuthController@getSignup')->name('getsignup');
Route::post('/signup','AuthController@signup')->name('signup');

Route::middleware(['checktype:admin'])->prefix('admin')->group(function(){
    Route::get('/getuser','AdminController@getListUser')->name('getListUser');
    Route::get('/information','AdminController@getInformation')->name('getInformation');
    Route::get('/editinformation','AdminController@getUpdateInformation')->name('getUpdateInformation');
    Route::get('/getcreateuser','AdminController@getCreateUser')->name('getCreateUser');
    Route::post('/createuser','AdminController@createUser')->name('createUser');
    Route::get('/getupdateuser/{id}','AdminController@getUpdateUser')->name('getUpdateUser');
    Route::post('/updateuser/{id}','AdminController@updateUser')->name('updateUser');
    Route::get('/deleteuser/{id}','AdminController@deleteUser')->name('deleteUser');
    Route::get('/getconfirm','AdminController@getConfirm')->name('getConfirm');


});
// student

Route::middleware(['checktype:student'])->prefix('student')->group(function(){
    Route::get('/information','StudentController@getInformation')->name('getInformationStudent');
    Route::get('/editinformation','StudentController@getUpdateInformation')->name('getUpdateInformationStudent');
    Route::post('/updateuser','StudentController@updateInformation')->name('updateInformationStudent');

});


//lecture
Route::middleware(['checktype:teacher'])->prefix('lecture')->group(function(){
    Route::get('/information','LectureController@getInformation')->name('getInformationLecture');
    Route::get('/editinformation','LectureController@getUpdateInformation')->name('getUpdateInformationLecture');
    Route::post('/updateuser','LectureController@updateInformation')->name('updateUserLecture');

});
