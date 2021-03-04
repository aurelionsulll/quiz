<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function createAnswer(Request $request)
    {
        $qst = new Answer();
        $qst->qst_id = $request->qst_id;
        $qst->ans1 = $request->ans1;
        $qst->ans2 = $request->ans2;
        $qst->ans2 = $request->ans3;
        $qst->ans4 = $request->ans4;
        $qst->save();
    }
}
