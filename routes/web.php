<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mainn','QuizController@index');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//-------------- Admin --------------
Route::get('gqst','QstController@index');

    //-------------- G qst --------------
    Route::get('/getQst','QstController@getQst');
    Route::post('/createQst','QstController@createQst');
    Route::put('/editQst/{id}','QstController@editQst');
    Route::delete('/deleteQst/{id}','QstController@deleteQst');
    // Rep
    Route::get('rep','QstController@getRep');
    Route::get('getUser','QstController@getUser');
    Route::get('getQstByUserId/{id}','QstController@getQstByUserId');

    
    //-------------- G answer --------------
    Route::get('/getAnswer/{id}','AnswerController@getAnswer');
    Route::post('/createAnswer','AnswerController@createAnswer');
    Route::put('/editAnswer/{id}','AnswerController@editAnswer');
    Route::delete('/deleteAnswer/{id}','AnswerController@deleteAnswer');

//-------------- User --------------
Route::get('gtest','TesttController@gtest');
Route::post('/sendAnswer/{qstId}','TesttController@sendAnswer');
Route::get('/getTest','TesttController@getTest');
Route::get('/getAnswerTest/{id}','TesttController@getAnswerTest');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
