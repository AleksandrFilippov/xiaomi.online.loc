<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Page;
use App\Service;
use App\Product;
use App\People;

use App\Cart;

use Mail;
use DB;

class IndexController extends Controller
{
    public function mail(Request $request)
    {
        if ($request->isMethod('post')) {

            $messages = [

                'required' => "Поле :attribute обязательно к заполнению",
                'email' => "Поле :attribute должно соответствовать email адресу"

            ];

            $this->validate($request, [

                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'

            ], $messages);

            $data = $request->all();

            $result = Mail::send('site.email', ['data' => $data], function ($message) use ($data) {

                $mail_admin = env('MAIL_ADMIN');

                $message->from($data['email'], $data['name']);
                $message->to($mail_admin, 'Mr. Admin')->subject('Question');

            });

            if ($result) {
                return redirect()->route('home')->with('status', 'Email is send');
            }
        }
    }

    public function index(Request $request)
    {
        $pages = Page::all();

        $tags = Category::all();

        $products = Product::all();

        $menu = array();
        foreach ($pages as $page) {
            array_push($menu, $page);
        }

        $item = array('title' => 'Каталог', 'alias' => 'Portfolio');
        array_push($menu, $item);

        /*$item = array('title'=>'Корзина','alias'=>'Cart');
        array_push($menu,$item);*/

        /*$item = array('title'=>'Обратная связь','alias'=>'contact');
        array_push($menu,$item);*/

        return view('site.index', array(

            'menu' => $menu,
            'portfolios' => $products,
            'pages' => $pages,
            'tags' => $tags
        ));
    }
}