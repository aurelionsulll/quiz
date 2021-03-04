<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mainn','QuizController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//-------------- Admin --------------
Route::get('gqst','QstController@index');

Route::post('/createQst','QstController@createQst');
Route::put('/editQst/{id}','QstController@editQst');

Route::get('/getQst','QstController@getQst');
