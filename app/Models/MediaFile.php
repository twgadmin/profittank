<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interfaces\MediaFileInterface;

class MediaFile extends Model implements MediaFileInterface
{
    protected $guarded = [];
}
