<?php

namespace App\Http\Controllers;

use App\Qst;
use Illuminate\Http\Request;

class QstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
        return view('admin.gqst');
    }

    public function getQst() 
    {
        return Qst::all();
    }

    public function createQst(Request $request)
    {
        $qst = new Qst();
        $qst->qst = $request->qst;
        $qst->save();
    }


    public function editQst(Request $request, $id)
    {
        $qst = Qst::find($id);
        $qst->qst = $request->qst;
        $qst->multi = $request->multi;
        $qst->save();
    }

    public function deleteQst($id)
    {
        $qst = Qst::find($id);
        $qst->delete();
    }
}
