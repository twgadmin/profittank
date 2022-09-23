<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interfaces\PageInterface;

class Page extends Model implements PageInterface
{
    protected $guarded = [];
}
