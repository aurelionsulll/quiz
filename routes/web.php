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
    
    //-------------- G answer --------------
    Route::get('/getAnswer/{id}','AnswerController@getAnswer');
    Route::post('/createAnswer','AnswerController@createAnswer');
    Route::put('/editAnswer/{id}','AnswerController@editAnswer');
    Route::delete('/delteAnswer/{id}','AnswerController@delteAnswer');


