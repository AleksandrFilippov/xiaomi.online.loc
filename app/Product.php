<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'filter', 'images', 'price'];

    public function getFirstImage()
    {
        $this->images;
    }
}