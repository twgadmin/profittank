<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class UserLogin extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'user_id',
        'ip',
        
    ];
    public static function getUserLoginData($where = [])
    {
        $query = self::select(
            'user_logins.id',
            'user_logins.user_id',
            'user_logins.ip',
            'user_logins.created_at',
            'users.first_name',
            'users.last_name',
            'users.email'
        )
        ->leftjoin('users','users.id','=','user_logins.user_id')
        ->get(); 
        return $query;
    }
}
