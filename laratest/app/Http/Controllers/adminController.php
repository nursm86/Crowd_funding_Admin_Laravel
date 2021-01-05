<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Validator;
use DB;
use PDF;
Use App\Models\User;
Use App\Models\Campaign;
Use App\Models\Donation;
Use App\Models\Admin;
Use App\Models\Personal;
Use App\Models\ContactAdmin;
Use App\Models\Organization;
Use App\Models\Report;
Use App\Models\Volunteer;
Use App\Models\pending_admin_log;
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

    public function adminlist(Request $req)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8000/admin/adminlist',[
            'form_params' => [
                'userName' => $req->session()->get('uname'),
                'pass' => $req->session()->get('pass')
            ]
        ]);
        if($response->getStatusCode() == 200){
            $data =json_decode($response->getBody(),true);
            $admins = $data['user'];
            $req->session()->flash('print',true);
            return view('admin.adminlist')->with('admins',$admins);
        }
        else{
            $admins = null;
            return view('admin.adminlist')->with('admins',$admins);
        }
        // $admins = Admin::getallAdmins();
        // return view('admin.adminlist')->with('admins',$admins);
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
                    // Admin::createAdmin($req,'/system_images/'.$filename);
                    // return redirect()->route('admin.adminlist');
                    $padmin = new pending_admin_log();
                    $padmin->username = $req->username;
                    $padmin->password = $req->pass;
                    $padmin->email = $req->email;
                    $padmin->name = $req->name;
                    $padmin->phone = $req->phone;
                    $padmin->address = $req->address;
                    $padmin->sq = $req->sq;
                    $padmin->save();
                    $client = new \GuzzleHttp\Client();
                    $response = $client->request('POST', 'http://localhost:9000/entity/pendingEntity',[
                        'form_params' => [
                            'id' => $padmin->id,
                            'username' => $req->username,
                            'pass' => $req->pass,
                            'email' => $req->email,
                            'name'=> $req->name,
                            'phone' => $req->phone,
                            'address' => $req->address,
                            'sq' => $req->sq,
                            'ct' => date('Y-m-d H:i:s'),
                            'cb' => $req->session()->get('uname'),
                            'image' => '/system_images/'.$filename
                        ]
                    ]);
                    if($response->getStatusCode() == 200){
                        $req->session()->flash('errmsg','Admin Will be Available after he is verified');
                        return redirect()->route('admin.adminlist');
                    }
                    else{
                        $req->session()->flash('errmsg','Admin Will be Available after he is verified');
                        return redirect()->route('admin.adminlist');
                    }

                }
                else{
                    $req->session()->flash('errmsg','Something Went Wrong!!!');
                    return redirect()->route('admin.create');
                }
            }    
        }

        $req->session()->flash('errmsg','Admin Will be Available after he/she is verified');
        return redirect()->route('admin.adminlist');
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

    public function downloadReport(Request $req)
    {
        // $pdf = PDF::loadView('admin.report',compact('variable'));
        // return $pdf->download('employees.pdf');
        $top10donations=null;
        $top10donators = null;
        $donationsOver=null;
        $countsOf=null;
        if($req->top10donations){
            $req->session()->flash('opt1',true);
            $top10donations = Donation::getTop10Donations();
        }
        if($req->top10donators){
            $req->session()->flash('opt2',true);
            $top10donators = Donation::getTop10Donators();
        }
        if($req->donationsOver){
            $req->session()->flash('do',$req->amount);
            $req->session()->flash('opt3',true);
            $donationsOver = Donation::getDonationsOver($req->amount);
        }
        if($req->countsOf){
            $req->session()->flash('opt4',true);
            $countsOf = Admin::getAllCount();;
        }
        $pdf = PDF::loadView('admin.reportView',compact('top10donations','top10donators','donationsOver','countsOf'));
        return $pdf->download('reports.pdf');
        //return view('admin.reportView',compact('top10donations','top10donators','donationsOver','countsOf'));
    }

    public function searchCampaign(Request $req){
        if($req->ajax()){
            $campaign = Campaign::getCampaignBySearch($req);
            return response()->json($campaign);
        }
        else{
            return Redirect()->Back();
        }
    }

    public function searchUser(Request $req){
        if($req->ajax()){
            if($req->see == 0){
                if($req->searchby == "username" || $req->searchby == "email"){
                    $user = DB::table($req->tablename)
                    ->join('users as u', 'u.id', '=', $req->tablename.'.uid')
                    ->where('u.'.$req->searchby, 'LIKE', '%'.$req->search.'%')
                    ->get();
                }
                else{
                    $user = DB::table($req->tablename)
                    ->join('users as u', 'u.id', '=', $req->tablename.'.uid')
                    ->where($req->tablename.'.'.$req->searchby, 'LIKE', '%'.$req->search.'%')
                    ->get();
                }
            }
            else{
                if($req->searchby == "username" || $req->searchby == "email"){
                    $user = DB::table($req->tablename)
                    ->join('users as u', 'u.id', '=', $req->tablename.'.uid')
                    ->where('u.'.$req->searchby, 'LIKE', '%'.$req->search.'%')
                    ->where('u.status',$req->see)
                    ->get();
                }
                else{
                    $user = DB::table($req->tablename)
                    ->join('users as u', 'u.id', '=', $req->tablename.'.uid')
                    ->where($req->tablename.'.'.$req->searchby, 'LIKE', '%'.$req->search.'%')
                    ->where('u.status',$req->see)
                    ->get();
                }
            }
            return response()->json($user);
        }
        else{
            return Redirect()->Back();
        }
    }

    public function get(Request $req){
        if($req->ajax()){
            $result = User::where($req->field,$req->val)->first();
            if($result != ""){
                $flag = true;
                return response()->json($flag);
            }
            else{
                $flag = false;
                return response()->json($flag);
            }
        }
        else{
            return Redirect()->Back();
        }
    }
}
