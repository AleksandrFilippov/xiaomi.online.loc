<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Page;

class PageController extends Controller
{
    public function show(Page $page)
    {
        $data = [
            'title' => $page->name,
            'page' => $page
        ];
        return view('site.page', $data);
    }
}
