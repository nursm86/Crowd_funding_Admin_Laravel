<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
Use App\Models\User;
use Validator;

class loginController extends Controller
{
    public function index(Request $req){
        if($req->session()->has('uname')){
            return redirect()->route('home.index');
        }
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
        $otp = rand(1000,9999);
        $details = [
            'title' => 'Please use this OTP to change your password',
            'body' => 'your otp is '.$otp
        ];

        Mail::to($req->email)->send(new SendMail($details));

        if(file_exists('json/otp.json')){
            $current_data = file_get_contents('json/otp.json');
            $data = json_decode($current_data,true);
            $new_data = array(
                'email' => $req->email,
                'otp' => $otp
            );
            $data[] = $new_data;
            $json_data = json_encode($data,JSON_PRETTY_PRINT);
            
            if(file_put_contents('json/otp.json',$json_data)){
                $req->session()->put('email',$req->email);
                return redirect()->route('login.changepassword');
            }
            else{
                $req->session()->flash('errmsg','Something Went Wrong Please Try again later!!!');
                return redirect()->route('login.index');
            }
        }
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

        if(file_exists('json/otp.json')){
            $current_data = file_get_contents('json/otp.json');
            $data = json_decode($current_data,true);

            $email = $req->session()->get('email');
            $otp = 0;
            $new_data =[];
            foreach($data as $item){
                if($item['email'] != $email){
                    $new_data []= $item;
                    $otp = $item['otp'];
                }
                else{
                    $otp = $item['otp'];
                }
            }
            if($otp == $req->otp){
                User::changePassByEmail($email,$req->npass);
                $json_data = json_encode($new_data,JSON_PRETTY_PRINT);
            
                if(file_put_contents('json/otp.json',$json_data)){
                    $req->session()->flash('errmsg','Your password have been reset!!Please login to the account');
                    return redirect()->route('login.index');
                }
                else{
                    $req->session()->flash('errmsg','Something Went Wrong Please Try again later!!!');
                    return redirect()->route('login.index');
                }
            }
            else{
                $req->session()->flash('errmsg','You otp was Wrong please try again!!!');
                return redirect()->route('login.index');
            }
        }
    }
}
