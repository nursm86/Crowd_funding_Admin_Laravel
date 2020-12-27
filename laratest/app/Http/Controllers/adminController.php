<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Validator;
Use App\Models\User;
Use App\Models\Campaign;
Use App\Models\Donation;
Use App\Models\Admin;
Use App\Models\Personal;
Use App\Models\ContactAdmin;
Use App\Models\Organization;
Use App\Models\Report;
Use App\Models\Volunteer;
use Carbon\Carbon;

class adminController extends Controller
{
    public function index()
    {
        $count = Admin::getAllCount();
        return view('admin.index',$count);
    }

    public function profile(Request $req)
    {
        $admin = Admin::getAdmin($req->session()->get('uid'));
        return view('admin.profile',$admin);
    }

    public function edit($id, Request $req){
        $validation = Validator::make($req->all(),[
            'name' => 'required',
            'phone' => 'required | min:11|max:14',
            'email' => 'required | email',
            'address' => 'required | min : 5',
            'sq' => 'required'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors());
        }

        Admin::updateAdmin($id,$req);
        return redirect()->route('admin.profile');
    }
    
    public function changepass($id, Request $req){
        $validation = Validator::make($req->all(),[
            'pass' => 'required',
            'npass' => 'required | same:cpass| min:4',
            'cpass' => 'required |min:4'
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }
        User::changePass($id,$req->npass);
        return redirect()->route('login.index');
    }

    public function changepropic($id, Request $req){
        if($req->hasFile('propic')){
            $file = $req->file('propic');
            if(!($file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "png")){
                $req->session()->flash('errmsg','File Format '.$file->getClientOriginalExtension().' is not supported for profile pic!!!');
                return redirect()->route('admin.profile');
            }
            else{
                $filename = $req->session()->get('uname').".".$file->getClientOriginalExtension();
                $user = User::find($id);
                $user->image = '/system_images/'.$filename;
                $user->save();
                if($file->move('system_images',$filename)){
                    return redirect()->route('admin.profile');
                }
                else{
                    $req->session()->flash('errmsg','Something Went Wrong!!!');
                    return redirect()->route('admin.profile');
                }
            }    
        }
    }

    public function adminlist()
    {
        $admins = Admin::getallAdmins();
        return view('admin.adminlist')->with('admins',$admins);
    }

    public function personaluserlist()
    {
        $users = Personal::getAllPersonals();
        return view('admin.personaluserlist')->with('users',$users);
    }

    public function personalUseredit($id)
    {
        $user = Personal::getPersonalById($id);
        return view('admin.personalUseredit',$user);
    }

    public function blockuser($id)
    {
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        return back();
    }

    public function unblockuser($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return back();
    }

    public function verifyuser($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return back();
    }

    public function organizationalList()
    {
        $organizations = Organization::getAllOrganizations();
        return view('admin.organizationList')->with('organizations',$organizations);
    }

    public function organizationalUseredit($id)
    {
        $organization =  Organization::getOrganizationById($id);
        return view('admin.organizationalUseredit',$organization);
    }

    public function volunteerlist()
    {
        $volunteers = Volunteer::getAllVolunteers();
        return view('admin.volunteerlist')->with('volunteers',$volunteers);
    }

    public function volunteeredit($id)
    {
        $volunteer= Volunteer::getVolunteerById($id);
        return view('admin.volunteeredit',$volunteer);
    }

    public function create()
    {
        return view('admin.createadmin');
    }

    public function created(AdminRequest $req){
        if($req->hasFile('file')){
            $file = $req->file('file');
            if(!($file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "png")){
                $req->session()->flash('errmsg','File Format '.$file->getClientOriginalExtension().' is not supported for profile pic!!!');
                return redirect()->route('admin.create');
            }
            else{
                $filename = $req->username.".".$file->getClientOriginalExtension();
                if($file->move('system_images',$filename)){
                    Admin::createAdmin($req,'/system_images/'.$filename);
                    return redirect()->route('admin.adminlist');
                }
                else{
                    $req->session()->flash('errmsg','Something Went Wrong!!!');
                    return redirect()->route('admin.create');
                }
            }    
        }
        
    }

    public function donationlist()
    {
        $donations = Donation::getAllDonations();
        return view('admin.donationHistory')->with('donations',$donations);
    }

    public function releasedcampaign()
    {
        $campaigns = Campaign::getReleasedCampaigns();
        return view('admin.releasedcampaign')->with('campaigns',$campaigns);
    }

    public function campaignslist()
    {
        $campaigns = Campaign::getAllRunningCampaings();
        return view('admin.campaignlist')->with('campaigns',$campaigns);
    }

    public function campaignedit($id)
    {
        $campaign = Campaign::getCampaignById($id);
        return view('admin.campaignedit',$campaign);
    }

    public function campaignupdate($id,Request $req)
    {
        $validation = Validator::make($req->all(),[
            'title' => 'required',
            'description'=>'required',
            'ed'=>'required'
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }
        $campaign = Campaign::find($id);
        $campaign->title = $req->title;
        $campaign->description = $req->description;
        $campaign->endDate = $req->ed;
        $campaign->save();
        return redirect()->route('admin.campaignedit',$id);
    }

    public function blockCampaign($id)
    {
        $campaign = Campaign::find($id);
        $campaign->status = 2;
        $campaign->save();
        return back();
    }

    public function unblockCampaign($id)
    {
        $campaign = Campaign::find($id);
        $campaign->status = 1;
        $campaign->save();
        return back();
    }
    public function verifyCampaign($id)
    {
        $campaign = Campaign::find($id);
        $campaign->status = 1;
        $campaign->save();
        return back();
    }
    public function releaseCampaign($id)
    {
        $campaign = Campaign::find($id);
        $campaign->status = 4;
        $campaign->save();
        return back();
    }
    public function reports()
    {
        $problems = Report::getAllReport();
        return view('admin.problemlist')->with('problems',$problems);
    }

    public function deleteReport($id)
    {
        $report = Report::find($id);
        $report->delete();
        return redirect()->route('admin.reports');
    }

    public function usersproblems()
    {
        $problems = ContactAdmin::getAllProblems();
        return view('admin.userproblem')->with('problems',$problems);
    }

    public function deleteProblem($id)
    {
        $report = ContactAdmin::find($id);
        $report->delete();
        return redirect()->route('admin.usersproblems');
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
