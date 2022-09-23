<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersChannelData extends Model
{
    use HasFactory;

    protected $table    = 'users_channel_data';
    protected $fillable = [
        'user_id',
        'field_name',
        'field_value',
        'channel_id'
    ];

    public static function getUsersChannelData($where = [])
    {
        $query = self::select(
            'users_channel_data.*',
            'users.first_name',
            'users.last_name',
        )
            ->leftJoin('users', 'users.id', '=', 'users_channel_data.user_id')
            ->where($where)
            ->get();

        return $query;
    }
}
