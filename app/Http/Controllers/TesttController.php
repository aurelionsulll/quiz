<?php

namespace App\Http\Controllers;

use App\Testt;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesttController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function gtest() 
    {
        return view('user.gtest');
    }

    public function sendAnswer(Request $request, $id)
    {
        $testt = Testt::where('qst_id',$id)->where('user_id',Auth::id())->first();
        if ($testt === null) {
            $test = new Testt();
            $test->user_id = Auth::id();
            $test->qst_id = $id;
            $test->answer_id = $request->answer_id;
            $test->done = 1;
            $test->save();
            return 1;
        }
        else {
            return 0;
        }


    }
    public function getTest() 
    {
        return Testt::all();
    }

    public function getAnswerTest($id) 
    {
        $testt = Testt::where('qst_id',$id)->where('user_id',Auth::id())->first();
        if ($testt === null) {
            return Answer::where('qst_id',$id)->get();
        }

    }
}
