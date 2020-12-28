<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function changePass($id, $pass){
        $user = self::find($id);
        $user->password = $pass;
        $user->save();
    }

    public static function changePassByEmail($email,$pass){
        $user = self::where('email',$email)->first();
        $user->password = $pass;
        $user->save();
    }
}
