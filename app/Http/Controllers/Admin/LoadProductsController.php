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
     */
    public function UploadFile(Request $request)
    {
        $file->move($destinationPath, $file->getClientOriginalName());
    }
}
