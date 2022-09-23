<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueEngine extends Model
{
    use HasFactory;
    protected $table = 'wp1y_revenue_engine';

    public static function getAllRevenueEngine($where = [], $whereIn = [])
    {
        $query = self::select(
            'wp1y_revenue_engine.*',
            'users.first_name',
            'users.last_name',
        )
            ->leftJoin('users', 'users.id', '=', 'wp1y_revenue_engine.user_id')
            ->where($where)
            ->whereIn('wp1y_revenue_engine.user_id', $whereIn)
            ->groupBy('wp1y_revenue_engine.user_id')
            ->get();

        return $query;
    }
    public static function getSingleRevenueEngine($where = [])
    {
        $query = self::select(
            'wp1y_revenue_engine.*',
            'users.first_name',
            'users.last_name',
        )
            ->leftJoin('users', 'users.id', '=', 'wp1y_revenue_engine.user_id')
            ->groupBy('wp1y_revenue_engine.re_id')
            ->where($where)
            ->first();

        return $query;
    }

    public static function getEstimatedSavings($where = [], $whereIn = [])
    {
        $query = self::select(
            \DB::raw('SUM(DISTINCT wp1y_revenue_engine.re_revenue_equivalent) as estimates_savings'),
            'users.id AS single_user_id',
            'users_channel_data.channel_id',
        )
            ->leftJoin('users', 'users.id', '=', 'wp1y_revenue_engine.user_id')
            ->leftJoin('users_channel_data', 'users_channel_data.user_id', '=', 'users.id')
            ->where($where)
            ->whereIn('wp1y_revenue_engine.user_id', $whereIn)
            ->groupBy('channel_id')
            ->first();

        return $query;
    }
}
