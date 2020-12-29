<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Campaign;
Use App\Models\Personal;
Use App\Models\Organization;
Use App\Models\Volunteer;
Use App\Models\User;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getAllCount(){
        $array['admin'] = self::all()->count();
        $array['personal'] = Personal::all()->count();
        $array['orgranization'] = Organization::all()->count();
        $array['volunteer'] = Volunteer::all()->count();
        $array['validCampaign'] = Campaign::where('status',1)->count();
        $array['inValidCampaign'] = Campaign::where('status',0)->count();
        $array['blockedValidCampaign'] = Campaign::where('status',2)->count();
        $array['completeValidCampaign'] = Campaign::where('status',3)->count();
        $array['releasedValidCampaign'] = Campaign::where('status',4)->count();
        return $array;
    }

    public static function getAdmin($id){
        return self::join('users as u', 'u.id', '=', 'admins.uid')
                    ->where('u.id',$id)
                    ->first();
    }

    public static function getallAdmins(){
        return self::join('users as u', 'u.id', '=', 'admins.uid')
                    ->get();
    }

    public static function createAdmin($req,$filename){
        $user = new User();
        $user->username = $req->username;
        $user->password = $req->pass;
        $user->email = $req->email;
        $user->image = $filename;
        $user->type = 0;
        $user->status = 1;
        $user->provider_id =0;
        $user->save();

        $admin = new Admin();
        $admin->name = $req->name;
        $admin->phone = $req->phone;
        $admin->address = $req->address;
        $admin->sq = $req->sq;
        $admin->uid = $user->id;
        $admin->save();
    }

    public static function updateAdmin($id,$req){
        $admin = self::where('uid',$id)->first();
        $admin->name = $req->name;
        $admin->phone = $req->phone;
        $admin->address = $req->address;
        $admin->sq = $req->sq;
        $admin->save();

        $user = User::find($id);
        $user->email = $req->email;
        $user->save();
    }
}
