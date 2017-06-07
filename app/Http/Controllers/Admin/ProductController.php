<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\StorePageRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    /**
     * Список продуктов в админке
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();

        $data = [
            'title' => 'Продукция',
            'products' => $products
        ];

        return view('admin.product.index', $data);
    }

    public function create()
    {

    }

    public function store(StoreProductRequest $request)
    {

    }

    public function edit(Request $request, Page $product)
    {

    }

    public function update(UpdateProductRequest $request, Product $product)
    {

    }

    /**
     * Удаление товара из списка товаров
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('status', 'Товар удален');
    }
}
