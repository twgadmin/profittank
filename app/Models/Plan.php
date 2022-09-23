<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'plan_name',
        'sub_heading',
        'monthly_price',
        'additional_price',
        'is_active',
        'description',
        'short_description',
        'detail_description'
    ];


    public static function getPlans($where = [])
    {
        $query = self::where($where)->get();

        return $query;
    }

}
