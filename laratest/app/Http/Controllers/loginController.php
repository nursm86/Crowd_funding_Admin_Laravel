<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(Request $req){

        $validation = Validator::make($req->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }

        if($req->username == $req->password){
            $req->session()->put('uname',$req->username);

            if($req->username == "nur"){
                $req->session()->put('utype',0);
            }
            else{
                $req->session()->put('utype',1);
            }
            return redirect()->route('home.index');
        }
        else{
            $req->session()->flash('errmsg','Wrong User Name or Password!!');
            return redirect()->route('login.index');
        }
    }

    public function forgotpassword(){
        return view('login.forgotpass');
    }
    
    public function changepassword(){
        return view('login.ChangePass');
    }
}
