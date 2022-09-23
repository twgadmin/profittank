<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_id',
        'to_id',
        'notification_text',
        'is_read',
        'route',
        'route_value'
    ];

    public static function getNotifications($where = [])
    {
        $query = self::select(
            'notifications.*',
            'to.first_name as to_first_name',
            'to.email as to_email',
            'from.first_name as from_first_name',
            'from.email as from_email'
        )
            ->leftJoin('users AS to', function ($join) {
                $join->on('to.id', '=', 'notifications.to_id');
            })
            ->leftJoin('users AS from', function ($join) {
                $join->on('from.id', '=', 'notifications.from_id');
            })
            ->where($where)
            ->groupBy('notifications.id')
            ->get();

        return $query;
    }

    public static function getUserNotication($where = [])
    {
        $query = self::select(
            'notifications.*',
            'users.image as from_user_profile',
            'users.id as from_user_id',
            'users.first_name as from_user_first_name',
            'users.last_name as from_user_last_name',
        )
            ->leftJoin('users', 'users.id', '=', 'notifications.from_id')
            ->where($where)
            ->orderBy('id', 'DESC')
            ->groupBy('notifications.id')
            ->get();

        return $query;
    }

    public static function pushNewNotification($data = [])
    {
        $query = self::firstOrCreate($data);

        return $query;
    }

    public static function markAsReadNotification($where = [], $data = [])
    {
        $query = self::where($where)->update($data);

        return $query;
    }
}
