<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $appends = ['title'];

    protected $fillable = ['name', 'text', 'alias', 'images'];

    protected $casts = ['is_main' => 'boolean'];

    public function getTitleAttribute()
    {
        return $this->name;
    }

    public function isMain()
    {
        return $this->is_main;
    }

}
