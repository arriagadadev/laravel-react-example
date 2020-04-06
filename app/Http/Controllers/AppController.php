<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request){
        if($request->user()->hasUserType(1)){
            return view('admin');
        }
        return view('user');
    }
}