<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getAllReport(){
        return self::join('users as u', 'u.id', '=', 'reports.uid')
                    ->join('campaigns as c', 'reports.cid', '=', 'c.id')
                    ->select('c.id as cid','u.type as type','u.id as uid', 'reports.id as rid','c.title as title', 'u.username as username' ,'reports.description as description','reports.updatedDate as ud')
                    ->get();
    }
}
