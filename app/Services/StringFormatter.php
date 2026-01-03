<?php

namespace App\Services;

use Illuminate\Support\Str;

class StringFormatter
{
    public static function title(string $title) 
    {
        return Str::title($title);
    }
}
