<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getAllOrganizations(){
        return self::join('users as u', 'u.id', '=', 'organizations.uid')
                    ->get();
    }

    public static function getOrganizationById($id){
        return self::join('users as u', 'u.id', '=', 'organizations.uid')
                    ->where('u.id',$id)
                    ->first();
    }
}
