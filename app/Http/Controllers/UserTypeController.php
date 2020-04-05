<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;

class UserTypeController extends Controller
{
    public function getUserTypes(Request $request){
        return [
            'userTypes' => UserType::select('id', 'name')->get()
        ];
    }
}
