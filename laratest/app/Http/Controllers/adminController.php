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
        return view('admin.profile');
    }

    public function adminlist()
    {
        return view('admin.adminlist');
    }

    public function personaluserlist()
    {
        return view('admin.personaluserlist');
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
