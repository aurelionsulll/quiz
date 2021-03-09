<?php

namespace App\Http\Controllers;

use App\Qst;
use App\Testt;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        if(Auth::user()->is_admin){
            return view('admin.gqst');
        }
        else {
            return view('user.gtest');
        }
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


    public function getRep()
    {
        return view('admin.rep');
    }


    public function getUser()
    {
        return User::where('is_admin', 0)->get();
    }

    public function getQstByUserId($id)
    {
        return Testt::where('user_id',$id)->get();
    }
}
