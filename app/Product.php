<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['article', 'name', 'images', 'category_id', 'price'];

    /**
     * Получить первую картинку
     */
    public function getFirstImage()
    {
        $this->images;
    }

    /**
     * Категория товара
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}