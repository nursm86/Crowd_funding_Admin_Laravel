<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function donate(){
        return view('home.donate');
    }
    public function editCampaign(){
        return view('home.editCampaign');
    }
}
