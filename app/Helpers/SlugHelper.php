<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

function make_slug($model, $title)
{
    $slug = Str::slug($title);
    $slugCount = count(DB::table($model)->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
    return $slugCount > 0 ? "{$slug}-{$slugCount}" : $slug;
}
