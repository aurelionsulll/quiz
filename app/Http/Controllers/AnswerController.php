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
        $qst->qst1 = $request->qst1;
        $qst->qst2 = $request->qst2;
        $qst->qst2 = $request->qst3;
        $qst->qst4 = $request->qst4;
        $qst->save();
    }
}
