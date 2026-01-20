<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GachaPity extends Model
{
    protected $fillable = [
        'user_id',
        'banner_key',
        'count'
    ];
}
