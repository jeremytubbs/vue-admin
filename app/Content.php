<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'published_at'];

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
        if($this->attributes['slug'] != str_slug($title)) {
            $this->attributes['slug'] = make_slug('contents', $title);
        }
    }

}
