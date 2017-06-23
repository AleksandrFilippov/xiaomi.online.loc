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

    /**
     * логика загрузки прайса в БД
     *
     * @param $exelData
     * @return mixed
     */
    public static function postAdd($exelData)
    {
        $post = Import::create([
            'article' => $exelData['article'],
            'name' => $exelData['name'],
            'images' => $exelData['images'],
            'category_id' => $exelData['category_id'],
            'price' => $exelData['price']
        ]);
        return $post;
    }
}