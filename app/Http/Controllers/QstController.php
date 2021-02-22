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
}
