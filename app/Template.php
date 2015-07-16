<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
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
        $this->attributes['slug'] = make_slug('templates', $name);
    }
}
