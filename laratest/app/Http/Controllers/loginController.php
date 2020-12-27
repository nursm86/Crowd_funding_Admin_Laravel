<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Validator;

class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(Request $req){

        $validation = Validator::make($req->all(),[
            'username' => 'required',
            'pass' => 'required'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }

        $user = User::where('username',$req->username)
                            ->where('password',$req->pass)
                            ->first();

        if($user != ""){
            $req->session()->put('uname',$req->username);
            $req->session()->put('utype',$user->type);
            $req->session()->put('uid',$user->id);
            
            return redirect()->route('home.index');
        }
        else{
            $req->session()->flash('errmsg','Wrong User Name or Password!!');
            return redirect()->route('login.index');
        }
    }

    public function forgotpassword(Request $req){
        return view('login.forgotpass');
    }

    public function sendEmail(Request $req){
        $validation = Validator::make($req->all(),[
            'email' => 'required | email'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }
        return redirect()->route('login.changepassword');
    }
    
    public function changepassword(){
        return view('login.ChangePass');
    }

    public function resetpassword(Request $req){
        $validation = Validator::make($req->all(),[
            'otp' => 'required',
            'npass' => 'required | min: 4 | same:cpass',
            'cpass' => 'required | min:4 | same:npass',
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }
        $req->session()->flash('errmsg','Your password have been reset!!Please login to the account');
        return redirect()->route('login.index');
    }
}
