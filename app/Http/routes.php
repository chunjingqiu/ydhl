<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
| auther：tang 	
| date:2016.03.31
| effect：APP接口
*/

Route::group(['prefix' => 'api','namespace' => 'Api'],function(){
	Route::Controller('disease','DiseaseController');
});

