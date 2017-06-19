<?php

namespace App\Http\Controllers\admin;

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
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('uploadfile');
    }

    /**
     * логика загрузки прайса
     */
    public function showUploadFile(Request $request)
    {
        $file->move($destinationPath, $file->getClientOriginalName());
    }
}
