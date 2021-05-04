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
    Route::post('/updateInformation','AdminController@updateInformation')->name('updateInformation');
    Route::get('/getcreateuser','AdminController@getCreateUser')->name('getCreateUser');
    Route::post('/createuser','AdminController@createUser')->name('createUser');
    Route::get('/getupdateuser/{id}','AdminController@getUpdateUser')->name('getUpdateUser');
    Route::post('/updateuser/{id}','AdminController@updateUser')->name('updateUser');
    Route::get('/deleteuser/{id}','AdminController@deleteUser')->name('deleteUser');
    Route::get('/getconfirm','AdminController@getConfirm')->name('getConfirm');
    Route::get('/acceptregiter/{id}','AdminController@acceptRegiter')->name('acceptRegiter');

    Route::get('/getcreatecource','AdminController@getCreateCource')->name('getCreateCource');
    Route::post('/createcource','AdminController@createCource')->name('createCource');
    Route::get('/getcource','AdminController@getCource')->name('getCource');
    Route::get('/getupdatecource/{id}','AdminController@getUpdateCource')->name('getUpdateCource');
    Route::post('/updatecource/{id}','AdminController@updateCource')->name('updateCource');
    Route::get('/deletecource/{id}','AdminController@deleteCource')->name('deleteCource');

    Route::get('/getformation','AdminController@getFormation')->name('getFormationAdmin');
    Route::get('/getcreateformation','AdminController@getCreateFormation')->name('getCreateFormation');
    Route::post('/createformation','AdminController@createFormation')->name('createFormationAdmin');
    Route::get('/getupdateformation/{id}','AdminController@getUpdateFormation')->name('getUpdateFormation');
    Route::post('/updateformation/{id}','AdminController@updateFormation')->name('updateFormation');
    Route::get('/deleteformation/{id}','AdminController@deleteFormation')->name('deleteFormation');

    Route::get('/getplanning','AdminController@getPlanning')->name('getPlanning');
    Route::get('/getcreateplanning','AdminController@getCreatePlanning')->name('getCreatePlanning');
    Route::post('/createplanning','AdminController@createPlanning')->name('createPlanning');
    Route::get('/getupdateplanning/{id}','AdminController@getUpdatePlanning')->name('getUpdatePlanning');
    Route::post('/updateplanning/{id}','AdminController@updatePlaning')->name('updatePlaning');
    Route::get('/deletePlaning/{id}','AdminController@deletePlaning')->name('deletePlaning');

});
// student

Route::middleware(['checktype:student'])->prefix('etudiant')->group(function(){
    Route::get('/information','StudentController@getInformation')->name('getInformationStudent');
    Route::get('/editinformation','StudentController@getUpdateInformation')->name('getUpdateInformationStudent');
    Route::post('/updateuser','StudentController@updateInformation')->name('updateInformationStudent');
    Route::get('/getformation','StudentController@getFormation')->name('getFormation');
    Route::get('/getlistcource','StudentController@getListCource')->name('getListCource');
    Route::get('/getcreatecource','StudentController@getCreateCource')->name('getCreateCourceEtudiant');
    Route::get('/createcource/{id}','StudentController@createCource')->name('createCourceEtudiant');
    Route::get('/cancelcource/{id}','StudentController@cancelCource')->name('cancelCource');
    Route::get('/getschedule','StudentController@getSchedule')->name('getSchedule');

});


//lecture
Route::middleware(['checktype:teacher'])->prefix('enseignant')->group(function(){
    Route::get('/information','LectureController@getInformation')->name('getInformationLecture');
    Route::get('/editinformation','LectureController@getUpdateInformation')->name('getUpdateInformationLecture');
    Route::post('/updateuser','LectureController@updateInformation')->name('updateUserLecture');
    Route::get('/getcour','LectureController@getCourByTeacher')->name('getCourByTeacher');
//    Route::get('/getcour','LectureController@getCourByTeacher')->name('getCourByTeacher');
    Route::get('/getschedule','LectureController@getSchedule')->name('getSchedule');

});
