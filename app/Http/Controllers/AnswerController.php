<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function getAnswer($id) 
    {
        return Answer::where('qst_id',$id)->get();
    }

    public function createAnswer(Request $request)
    {
        $ans = new Answer();
        $ans->qst_id = $request->qst_id;
        $ans->ans = $request->ans;
        $ans->save();
    }

    public function editAnswer(Request $request, $id)
    {
        $ans1 = Answer::find($id);
        $ans1->ans = $request->ans;
        $ans1->save();
    }

    public function delteAnswer($id)
    {
        $qst = Answer::find($id);
        $qst->delete();
    }
}
