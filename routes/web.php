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

    //-------------- G qst --------------
    Route::get('/getQst','QstController@getQst');
    Route::post('/createQst','QstController@createQst');
    Route::put('/editQst/{id}','QstController@editQst');
    Route::delete('/delteQst/{id}','QstController@delteQst');



