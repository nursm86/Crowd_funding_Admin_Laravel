<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\AdminRequest;
use App\Mail\SendMail;
Use App\Models\User;
Use App\Models\Admin;
use Validator;

class loginController extends Controller
{
    public function index(Request $req){
        if($req->session()->has('uname')){
            return redirect()->route('admin.index');
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


    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $req){
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user,$req);
    }

    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback(Request $req){
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user,$req);
    }
    
    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(Request $req){
        $user = Socialite::driver('github')->user();
        $this->_registerOrLoginUser($user,$req);
    }

    public function _registerOrLoginUser($data,Request $req){
        $user = User::where('provider_id',$data->id)->first();
        if(!$user){
            $user = new User();
            $user->username = $data->email;
            $user->password = "";
            $user->email = $data->email;
            $user->image = $data->avatar;
            $user->type = 0;
            $user->status = 1;
            $user->provider_id = $data->id;
            $user->save();

            $admin = new Admin();
            $admin->name = $data->name;
            // $admin->phone = $req->phone;
            // $admin->address = $req->address;
            // $admin->sq = $req->sq;
            $admin->uid = $user->id;
            $admin->save();

            $req->session()->put('uname',$user->username);
            $req->session()->put('utype',$user->type);
            $req->session()->put('uid',$user->id);
            echo "<h1>Login Successfull <a href='/login/updateInfo'>Click here</a> to Update Some Information</h1>";
        }
        else{
            $req->session()->put('uname',$user->username);
            $req->session()->put('utype',$user->type);
            $req->session()->put('uid',$user->id);
            echo "<h1>Login Successfull <a href='/admin'>Click here</a> to go to the Dashboard</h1>";
        }
    }

    public function updateInfo(){
        return view('login.updateInfo');
    }

    public function setInfo(Request $req){
        $validation = Validator::make($req->all(),[
            'phone' => 'required | min:11|max:14',
            'address' => 'required | min : 5',
            'sq' => 'required'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }
        $id = $req->session()->get('uid');
        $admin = Admin::where('uid',$id)->first();
        $admin->phone = $req->phone;
        $admin->address = $req->address;
        $admin->sq = $req->sq;
        $admin->save();
        return redirect()->route('admin.index');
    }
}
