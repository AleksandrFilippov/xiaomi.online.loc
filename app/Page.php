<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $appends = ['title'];

    protected $fillable = ['name', 'text', 'alias', 'images'];

    public function getTitleAttribute()
    {
        return $this->name;
    }

}
