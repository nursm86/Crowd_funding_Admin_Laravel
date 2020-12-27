<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactadmin extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getAllProblems(){
        return self::join('users as u', 'u.id', '=', 'contactadmins.uid')
                    ->select('contactadmins.id as id','u.id as uid','u.type as type', 'u.username as username', 'u.email as email','contactadmins.updatedDate as ud', 'contactadmins.description')
                    ->get();
    }
}
