<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function show(Pages $pages)
    {
        if (view()->exists('admin.pages')) {
            $data = [
                'title' => $pages->name,
                'pages' => $pages
            ];
            return view('site.page', $data);
        }
    }
