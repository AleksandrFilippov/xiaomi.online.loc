<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Список страниц в админке
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pages = Page::all();

        $data = [
            'title' => 'Страницы',
            'pages' => $pages,
        ];

        return view('admin.pages', $data);
    }
}
