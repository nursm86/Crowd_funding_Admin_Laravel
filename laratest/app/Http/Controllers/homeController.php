<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function donate($id){
        return view('home.donate');
    }
    public function editCampaign($id){
        return view('home.editCampaign');
    }
}