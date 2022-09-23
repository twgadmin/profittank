<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelUser extends Model
{
    use HasFactory;

    protected $table    = 'channel_user';
    protected $fillable = ['channel_id', 'user_id'];

    public static function checkPreviousActivation($where = [])
    {
        $query = self::where($where)->first();

        return $query;
    }
}
