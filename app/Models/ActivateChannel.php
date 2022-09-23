<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivateChannel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_of_merchant_processing_softwares',
        'under_contract',
        'contract_end',
        'document',
        'channel_id'
    ];
}
