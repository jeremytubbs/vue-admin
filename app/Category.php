<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function contents()
    {
        return $this->hasMany('App\Content');
    }

    public function setSlugAttribute($name)
    {
        $this->attributes['slug'] = make_slug('categories', $name);
    }
}
