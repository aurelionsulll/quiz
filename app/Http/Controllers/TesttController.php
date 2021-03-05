<?php

namespace App\Http\Controllers;

use App\Testt;
use Illuminate\Http\Request;

class TesttController extends Controller
{
    public function gtest() 
    {
        return view('user.gtest');
    }

    public function sendAnswer(Request $request, $id)
    {
        $test = new Testt();
        $test->user_id = 1;
        $test->qst_id = $id;
        $test->answer_id = $request->answer_id;
        $test->done = 1;
        $test->save();
    }
    public function getTest() 
    {
        return Testt::all();
    }
}
