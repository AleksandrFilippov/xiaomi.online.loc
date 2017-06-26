<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

class LoadProductsController extends Controller
{
    /**
     * Вывод формы загрузки прайса
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'title' => 'Выгрузка товара из прайса',
        ];

        return view('admin.loadproducts.create', $data);
    }

    /**
     * логика загрузки прайса
     *
     * @param Request $request
     */
    public function uploadFile(Request $request)
    {
        $file = $request->file('images');

        $destinationPath = public_path('assets\xls');
        $file->move($destinationPath, $file->getClientOriginalName());

        $price = '\PriceSeeders.xls';

        Excel::load($destinationPath . $price, function ($reader) {
            $result = $reader->all();

//            echo "<dl>";
//            foreach ($result as $key => $value) {
//                echo "<dt>$key:</dt>";
//                echo "<dd>$value</dd>";
//                echo "</dl>";

//              $data = Product::postAdd($value);
//              }

            foreach ($result as $key => $value) {
                if ($key->getTitle() === 'article') {
                    Category::truncate();
                    foreach ($result as $row) {
                        $category = Product::create([
                            'id' => $row->id,
                            'article' => $row->article,
                            'name' => $row->name,
                            'images' => $row->images,
                            'category_id' => $row->category_id,
                            'price' => $row->price,
                        ]);
                    }
                    dd($key->getTitle());
                }
            }
        })->get();

//        return redirect()->route('admin.products.index')->with('status', 'Прайс загружен');
    }
}