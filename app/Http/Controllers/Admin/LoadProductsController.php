<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * @param Request $request
     */
    public function uploadFile(Request $request)
    {
        $file = $request->file('images');

        $destinationPath = public_path('assets\xls');
        $file->move($destinationPath, $file->getClientOriginalName());

        Excel::load(public_path() . getClientOriginalName(), function ($reader) {
            $result = $reader->get();

            foreach ($result as $key => $value) {

                //'article', 'name', 'images', 'category_id', 'price'
                $value->article, $value->name, $value->images, $value->category_id, $value->price;

                    $data = Product::postAdd($value);

			})->
            get();

            return redirect()->route('admin.loadproducts.create')->with('status', 'Прайс загружен');
        }
}