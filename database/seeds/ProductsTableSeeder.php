<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Category::all();

        /**
         * Первый способ
         */
//        foreach($categories as $category) {
//            factory(\App\Product::class, 15)->create([
//                'category_id' => $category->id
//            ]);
//        }


        /**
         * Второй способ
         */
        factory(\App\Product::class, 50)->make()->each(function (\App\Product $p) use ($categories) {
            $p->category_id = $categories->random()->id;
            $p->save();
        });
    }
}
