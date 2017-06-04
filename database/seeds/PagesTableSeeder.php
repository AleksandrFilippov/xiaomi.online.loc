<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Page::class, 1)->create([
            'is_main' => true,
            'name' => 'Главная',
        ]);
        factory(\App\Page::class, 2)->create();
    }
}
