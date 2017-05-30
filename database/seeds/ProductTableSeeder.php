<!-- <?php 
/** Посев таблицы ProductTable (мне не нужно - у меня есть таблица Portfolios) - Файл на удаление */

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        
        'imagePath' => '',
        'title' => '3D очки Xiaomi'
        
        ]);
        
    }
}
-->
