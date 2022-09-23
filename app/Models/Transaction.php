<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'stripe_charge_id',
        'charged_amount',
        'description',
    ];

    public static function getTransactionMonthly($where = [])
    {
        $query = self::select(
            'transactions.*',
            \DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS monthly_yearly'),
            \DB::raw('SUM(transactions.charged_amount) AS monthly_amount'),
            \DB::raw('COUNT(transactions.id) AS monthly_transactions'),
        )
            ->where($where)
            ->groupBy('monthly_yearly');

        return $query->get();
    }

    public static function getTransactions($where = [])
    {
        $query = self::select(
            'transactions.*',
            'users.expiry_date',
            \DB::raw("CONCAT(users.first_name, ' ', users.last_name) as fullname"),
        )
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->where($where)
            ->orderBy('id', 'DESC')
            ->groupBy('transactions.id');

        return $query->get();
    }

    public static function getPlanIdByTransactionId($where = [])
    {
        $query = self::where($where)->pluck('plan_id');

        return $query;
    }
}
