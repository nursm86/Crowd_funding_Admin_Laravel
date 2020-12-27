<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getAllValidCampaigns(){
        return self::join('users as u', 'u.id', '=', 'campaigns.uid')
                    ->where('campaigns.status',1)
                    ->select('u.id as uid','campaigns.image as image','campaigns.id as id','u.username as username', 'u.email as email', 'campaigns.title as title', 'campaigns.target_fund as tf', 'campaigns.raised_fund as rf', 'campaigns.publisedDate as pd', 'campaigns.endDate as ed', 'campaigns.status as status')
                    ->get();
    }

    public static function getCampaignById($id){
        return self::join('users as u', 'u.id', '=', 'campaigns.uid')
                    ->where('campaigns.id',$id)
                    ->select('u.username as username', 'u.email as email','u.id as uid','campaigns.image as image','campaigns.id as id','u.username as username', 'u.email as email', 'campaigns.title as title', 'campaigns.target_fund as tf', 'campaigns.raised_fund as rf', 'campaigns.publisedDate as pd', 'campaigns.endDate as ed', 'campaigns.status as status','campaigns.description as description')
                    ->first();
    }

    public static function getReleasedCampaigns(){
        return self::join('users as u', 'u.id', '=', 'campaigns.uid')
                    ->where('campaigns.status',4)
                    ->select('u.id as uid','campaigns.image as image','campaigns.id as id','u.username as username', 'u.email as email', 'campaigns.title as title', 'campaigns.target_fund as tf', 'campaigns.raised_fund as rf', 'campaigns.publisedDate as pd', 'campaigns.endDate as ed', 'campaigns.status as status')
                    ->get();
    }

    public static function getAllRunningCampaings(){
        return self::join('users as u', 'u.id', '=', 'campaigns.uid')
                    ->where('campaigns.status','!=' ,4)
                    ->select('u.id as uid','campaigns.image as image','campaigns.id as id','u.username as username', 'u.email as email', 'campaigns.title as title', 'campaigns.target_fund as tf', 'campaigns.raised_fund as rf', 'campaigns.publisedDate as pd', 'campaigns.endDate as ed', 'campaigns.status as status')
                    ->get();
    }
}
