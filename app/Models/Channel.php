<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_partner_id',
        'identifier',
        'name',
        'video_cover',
        'video_url',
        'description',
        'user_completion_time',
        'estimate_turnaround_time',
    ];

    public static function getAllChannelsWithUsers($where = [])
    {
        $query = self::select(
            'channels.*',
            \DB::raw('GROUP_CONCAT(DISTINCT users_channel_data.user_id) AS channel_users'),
            'users.first_name AS channel_partner_first_name',
            'users.last_name AS channel_partner_last_name',
        )
            ->leftJoin('users_channel_data', 'users_channel_data.channel_id', 'channels.id')
            ->leftJoin('users', 'users.id', 'channels.channel_partner_id')
            ->where($where)
            ->groupBy('channels.id')
            ->get();

        return $query;
    }

    public static function getReadyToAssignChannels($where = [])
    {
        $query = self::select(
            'channels.*',
        )
            ->where($where)
            ->get();

        return $query;
    }

    public static function getMyClients($where = [])
    {
        $query = self::select(
            'channels.id',
            \DB::raw('GROUP_CONCAT(users_channel_data.user_id) AS channel_clients_ids'),
        )
            ->leftJoin('users_channel_data', 'users_channel_data.channel_id', 'channels.id')
            ->where($where)
            ->groupBy('channels.id')
            ->first();

        return $query;
    }
}
