<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getAllVolunteers(){
        return self::join('users as u', 'u.id', '=', 'volunteers.uid')
                    ->get();
    }

    public static function getVolunteerById($id){
        return self::join('users as u', 'u.id', '=', 'volunteers.uid')
                    ->where('u.id',$id)
                    ->first();
    }
}
