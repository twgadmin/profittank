<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interfaces\SiteSettingInterface;

class SiteSetting extends Model implements SiteSettingInterface
{
    protected $guarded = [];
}
