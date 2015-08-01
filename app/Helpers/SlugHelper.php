<?php

use Illuminate\Support\Facades\DB;

function make_slug($model, $title)
{
    $slug = str_slug($title);
    $slugCount = count(DB::table($model)->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
    return $slugCount > 0 ? "{$slug}-{$slugCount}" : $slug;
}
