<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function createAnswer(Request $request)
    {
        $ans1 = new Answer();
        $ans1->qst_id = $request->qst_id;
        $ans1->ans1 = $request->ans1;
        $ans1->ans2 = $request->ans2;
        $ans1->ans3 = $request->ans3;
        $ans1->ans4 = $request->ans4;
        $ans1->save();
    }
}
