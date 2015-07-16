<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function template()
    {
        return $this->belongsTo('App\Template');
    }

    public function setSlugAttribute($title)
    {
        $this->attributes['slug'] = make_slug('contents', $title);
    }

}
