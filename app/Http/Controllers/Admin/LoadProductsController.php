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
            $reader->dd();

//           $data = Product::postAdd($value);

        })->get();

        return redirect()->route('admin.products.index')->with('status', 'Прайс загружен');
    }
}