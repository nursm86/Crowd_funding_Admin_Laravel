<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use App\Models\Campaign;
Use App\Models\Donation;

use Validator;

class homeController extends Controller
{
    public function index(Request $req){
        $campaigns = Campaign::getAllValidCampaigns();
        $donations = Donation::getTop10Donations();
        return view('home.index')
                ->with('campaigns',$campaigns)
                ->with('donations',$donations);
        
    }
    public function donate($id){
        $campaign = Campaign::getCampaignById($id);
        return view('home.donate',$campaign);
    }

    public function donationadd($id,Request $req){
        $validation = Validator::make($req->all(),[
            'amount' => 'required'
        ]);

        Donation::addDonation($id,$req->session()->get('uid'),$req->amount);
        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }


        return redirect()->route('home.index');
    }
    public function editCampaign($id){
        $campaign = Campaign::getCampaignById($id);
        return view('home.editCampaign',$campaign);
    }

    public function updateCampaign($id, Request $req){
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
        return redirect()->route('home.editCampaign',$id);
    }

    public function delete($id){
        $campaign =Campaign::find($id);
        $campaign->delete();
        return redirect()->route('home.index');
    }
}