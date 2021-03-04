<?php

namespace App\Http\Controllers;

use App\Qst;
use Illuminate\Http\Request;

class QstController extends Controller
{
    public function index() 
    {
        return view('admin.gqst');
    }

    public function createQst(Request $request)
    {
        $qst = new Qst();
        $qst->qst = $request->qst;
        $qst->save();
    }

    public function getQst() 
    {
        return Qst::all();
    }

    public function editQst(Request $request, $id)
    {
        $qst = Qst::find($id);
        $qst->qst = $request->qst;
        $qst->save();
    }
}
