<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function forgotpassword(){
        return view('login.forgotpass');
    }
    
    public function changepassword(){
        return view('login.ChangePass');
    }
}
