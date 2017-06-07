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

    /**
     * форма создания новой страницы при добавлении товара
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'title' => 'Новая страница'
        ];

        return view('admin.products.create', $data);
    }

    /**
     * Логика создания
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $input = $request->except('_token');
        $file = $request->file('images');
        $input['images'] = $file->getClientOriginalName();
        $file->move(public_path() . '/assets/img/pages', $input['images']);
        $product = new Product();
        $product->fill($input);

        if ($product->save()) {
            return redirect()->route('admin.products.index')->with('status', 'Страница добавлена');
        } else {
            return redirect()->route('admin.products.index')->with('status', 'Страница не добавлена');
        }
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
