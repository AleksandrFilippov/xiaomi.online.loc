<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['article', 'name', 'images', 'price'];

    public function getFirstImage()
    {
        $this->images;
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'name');
    }
}