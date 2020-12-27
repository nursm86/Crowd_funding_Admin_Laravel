<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Campaign;
use Carbon\Carbon;

class Donation extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getTop10Donations(){
        return self::join('users', 'users.id', '=', 'donations.uid')
                    ->join('campaigns', 'donations.cid', '=', 'campaigns.id')
                    ->orderBy('amount', 'DESC')
                    ->get()
                    ->take(10);
    }

    public static function getAllDonations(){
        return self::join('users as u', 'u.id', '=', 'donations.uid')
                    ->join('campaigns as c', 'donations.cid', '=', 'c.id')
                    ->select('c.id as cid','u.type as type','u.id as uid', 'donations.id as did','c.title as title', 'u.username as username' ,'donations.amount as amount' ,'donations.donationDate as ud')
                    ->get();
    }

    public static function addDonation($id,$uid,$amount){
        $donation = new Donation();
        $donation->uid = $uid;
        $donation->cid = $id;
        $donation->amount = $amount;
        $donation->donationDate = Carbon::now()->toDateString();
        $donation->save();

        $campaign = Campaign::find($id);
        $campaign->raised_fund += $amount;

        if($campaign->raised_fund >= $campaign->target_fund){
            $campaign->status = 3;
        }

        $campaign->save();
    }
}
