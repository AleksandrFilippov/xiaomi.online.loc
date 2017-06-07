<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['article', 'name', 'filter', 'images', 'price'];

    public function getFirstImage()
    {
        $this->images;
    }
}