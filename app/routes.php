<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// These two routes currently display the same page becuase this is the only page there is yet!
Route::get('/', 'StatisticsController@showIndex');
Route::get('statistics', 'StatisticsController@showIndex');