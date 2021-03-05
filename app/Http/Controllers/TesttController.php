<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesttController extends Controller
{
    public function gtest() 
    {
        return view('user.gtest');
    }
}
