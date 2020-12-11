<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        $admin = ['image' => '/system_images/neymar1.jpg','name'=>'Md. Nur Islam','email'=>'nursm86@gmail.com','phone'=>'01622114901','address'=>'dhalpur Jatrabari Dhaka 1204','password'=>'12345678','sq'=>'me'];
        return view('admin.profile',$admin);
    }

    public function adminlist()
    {
        $admins = [
            ['id'=>1,'username'=>'xyz','name'=>'XYZ','email'=>'xyz@gmail.com','address'=>'keyboard','phone'=>'012'],
            ['id'=>2,'username'=>'abc','name'=>'ABC','email'=>'abc@gmail.com','address'=>'keyboard','phone'=>'345'],
            ['id'=>3,'username'=>'pqr','name'=>'PQR','email'=>'pqr@gmail.com','address'=>'keyboard','phone'=>'678']
        ];
        return view('admin.adminlist')->with('admins',$admins);
    }

    public function personaluserlist()
    {
        $users = [
            ['id'=>1,'username'=>'xyz','name'=>'XYZ','email'=>'xyz@gmail.com','address'=>'keyboard','phone'=>'012','status' => 1],
            ['id'=>2,'username'=>'abc','name'=>'ABC','email'=>'abc@gmail.com','address'=>'keyboard','phone'=>'345','status' => 1],
            ['id'=>3,'username'=>'pqr','name'=>'PQR','email'=>'pqr@gmail.com','address'=>'keyboard','phone'=>'678','status' => 2]
        ];
        return view('admin.personaluserlist')->with('users',$users);
    }

    public function personalUseredit($id)
    {
        $user = ['id'=>1,'username'=>'xyz','name'=>'XYZ','email'=>'xyz@gmail.com','address'=>'keyboard','phone'=>'012','status' => 2,'type'=>1];
        return view('admin.personalUseredit',$user);
    }

    public function blockuser($id,$type)
    {
        return ("$id");
    }

    public function unblockuser($id,$type)
    {
        return ("$id");
    }

    public function organizationalList()
    {
        return view('admin.organizationList');
    }

    public function volunteerlist()
    {
        return view('admin.volunteerlist');
    }

    public function create()
    {
        return view('admin.createadmin');
    }

    public function donationlist()
    {
        return view('admin.donationHistory');
    }

    public function releasedcampaign()
    {
        return view('admin.releasedcampaign');
    }

    public function campaignslist()
    {
        return view('admin.campaignlist');
    }

    public function reports()
    {
        return view('admin.problemlist');
    }

    public function usersproblems()
    {
        return view('admin.userproblem');
    }

    public function generateReport()
    {
        return view('admin.report');
    }
}
