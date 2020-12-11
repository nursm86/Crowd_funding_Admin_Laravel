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

    public function blockuser($id)
    {
        return ("$id");
    }

    public function unblockuser($id)
    {
        return ("$id");
    }

    public function verifyuser($id)
    {
        return ("$id");
    }

    public function organizationalList()
    {
        $organizations = [
            ['id'=>1,'username'=>'xyz','name'=>'XYZ','email'=>'xyz@gmail.com','address'=>'keyboard','phone'=>'012','status' => 0],
            ['id'=>2,'username'=>'abc','name'=>'ABC','email'=>'abc@gmail.com','address'=>'keyboard','phone'=>'345','status' => 1],
            ['id'=>3,'username'=>'pqr','name'=>'PQR','email'=>'pqr@gmail.com','address'=>'keyboard','phone'=>'678','status' => 2]
        ];
        return view('admin.organizationList')->with('organizations',$organizations);
    }

    public function organizationalUseredit($id)
    {
        $organization =  ['id'=>1,'username'=>'xyz','name'=>'XYZ','email'=>'xyz@gmail.com','address'=>'keyboard','phone'=>'012','status' => 0];
        return view('admin.organizationalUseredit',$organization);
    }

    public function volunteerlist()
    {
        $volunteers = [
            ['id'=>1,'username'=>'xyz','name'=>'XYZ','email'=>'xyz@gmail.com','address'=>'keyboard','phone'=>'012','status' => 0],
            ['id'=>2,'username'=>'abc','name'=>'ABC','email'=>'abc@gmail.com','address'=>'keyboard','phone'=>'345','status' => 1],
            ['id'=>3,'username'=>'pqr','name'=>'PQR','email'=>'pqr@gmail.com','address'=>'keyboard','phone'=>'678','status' => 2]
        ];
        return view('admin.volunteerlist')->with('volunteers',$volunteers);
    }

    public function volunteeredit($id)
    {
        $volunteer=  ['id'=>1,'username'=>'xyz','name'=>'XYZ','email'=>'xyz@gmail.com','address'=>'keyboard','phone'=>'012','status' => 0];
        return view('admin.volunteeredit',$volunteer);
    }

    public function create()
    {
        return view('admin.createadmin');
    }

    public function donationlist()
    {
        $donations = [
            ['username'=>'xyz','title'=>'Give me some money','amount'=>50,'ud'=>'11/12/2020','type'=>3,'cid'=>3,'uid'=>3],
            ['username'=>'abc','title'=>'Give Us some money','amount'=>100,'ud'=>'12/12/2020','type'=>1,'cid'=>1,'uid'=>1],
            ['username'=>'pqr','title'=>'Give them some money','amount'=>150,'ud'=>'13/12/2020','type'=>2,'cid'=>2,'uid'=>2]
        ];
        return view('admin.donationHistory')->with('donations',$donations);
    }

    public function releasedcampaign()
    {
        $campaigns = [
            ['username'=>'xyz','email'=>'xyz@gmail.com','title'=>'Give me Some money','tf'=>1000,'rf'=>200,'pd'=>'8/12/2020','ed'=>'15/11/2020'],
            ['username'=>'abc','email'=>'abc@gmail.com','title'=>'Give us Some money','tf'=>1000,'rf'=>100,'pd'=>'8/12/2020','ed'=>'15/11/2020'],
            ['username'=>'pqr','email'=>'pqr@gmail.com','title'=>'Give them Some money','tf'=>1000,'rf'=>300,'pd'=>'8/12/2020','ed'=>'15/11/2020']
        ];
        return view('admin.releasedcampaign')->with('campaigns',$campaigns);
    }

    public function campaignslist()
    {
        $campaigns = [
            ['username'=>'xyz','email'=>'xyz@gmail.com','title'=>'Give me Some money','tf'=>1000,'rf'=>200,'pd'=>'8/12/2020','ed'=>'15/11/2020','status'=>0,'id'=>1],
            ['username'=>'abc','email'=>'abc@gmail.com','title'=>'Give us Some money','tf'=>1000,'rf'=>100,'pd'=>'8/12/2020','ed'=>'15/11/2020','status'=>1,'id'=>2],
            ['username'=>'pqr','email'=>'pqr@gmail.com','title'=>'Give them Some money','tf'=>1000,'rf'=>300,'pd'=>'8/12/2020','ed'=>'15/11/2020','status'=>2,'id'=>3]
        ];
        return view('admin.campaignlist')->with('campaigns',$campaigns);
    }

    public function campaignedit($id)
    {
        $campaign = ['username'=>'xyz','email'=>'xyz@gmail.com','title'=>'Give me Some money','tf'=>1000,'rf'=>200,'pd'=>'8/12/2020','ed'=>'15/11/2020','status'=>0,'id'=>1,'image'=>'https://uphatter.com/share.png','description'=>'Vai koida taka dau na amn koro kn'];
        return view('admin.campaignedit',$campaign);
    }

    public function blockCampaign($id)
    {
        return ("$id");
    }

    public function unblockCampaign($id)
    {
        return ("$id");
    }
    public function verifyCampaign($id)
    {
        return ("$id");
    }
    public function releaseCampaign($id)
    {
        return ("$id");
    }
    public function reports()
    {
        $problems = [
            ['username' =>'xyz','title'=>'Give me some money','description'=>'vai amn koro kn kisu taka dau nan plz','ud'=>'11/12/2020','cid'=>1,'type'=>1,'uid'=>0,'rid'=>1],
            ['username' =>'xyz','title'=>'Give me some money','description'=>'vai amn koro kn kisu taka dau nan plz','ud'=>'11/12/2020','cid'=>1,'type'=>2,'uid'=>0,'rid'=>1],
            ['username' =>'xyz','title'=>'Give me some money','description'=>'vai amn koro kn kisu taka dau nan plz','ud'=>'11/12/2020','cid'=>1,'type'=>3,'uid'=>0,'rid'=>1]
        ];
        return view('admin.problemlist')->with('problems',$problems);
    }

    public function deleteReport($id)
    {
        return ("$id");
    }

    public function usersproblems()
    {
        $problems = [
            ['username' =>'xyz','email'=>'xyz@gmail.com','description'=>'vai amn koro kn kisu taka dau nan plz','ud'=>'11/12/2020','id'=>1,'type'=>1,'uid'=>0],
            ['username' =>'xyz','email'=>'xyz@gmail.com','description'=>'vai amn koro kn kisu taka dau nan plz','ud'=>'11/12/2020','id'=>1,'type'=>3,'uid'=>1],
            ['username' =>'xyz','email'=>'xyz@gmail.com','description'=>'vai amn koro kn kisu taka dau nan plz','ud'=>'11/12/2020','id'=>1,'type'=>2,'uid'=>2]
        ];
        return view('admin.userproblem')->with('problems',$problems);
    }

    public function deleteProblem($id)
    {
        return ("$id");
    }

    public function generateReport()
    {
        return view('admin.report');
    }

    public function downloadReport()
    {
        return ("downloaded");
    }
}
