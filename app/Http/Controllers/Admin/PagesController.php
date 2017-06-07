<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\StorePageRequest;
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

        return view('admin.pages.index', $data);
    }

    /**
     * Форма создания новой страницы
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'title' => 'Новая страница'
        ];

        return view('admin.pages.create', $data);
    }

    /**
     * Логика создания страницы
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePageRequest $request)
    {
        $input = $request->except('_token');

        $file = $request->file('images');
        $input['images'] = $file->getClientOriginalName();
        $file->move(public_path() . '/assets/img/pages', $input['images']);
        $page = new Page();
        $page->fill($input);

        if ($page->save()) {
            return redirect()->route('admin.pages.index')->with('status', 'Страница добавлена');
        } else {
            return redirect()->route('admin.pages.index')->with('status', 'Страница не добавлена');
        }
    }

    /**
     * Форма для обновления страницы
     *
     * @param Request $request
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Page $page)
    {
        $data = [
            'title' => 'Редактирование страницы - ' . $page->name,
            'page' => $page
        ];

        return view('admin.pages.edit', $data);
    }

    /**
     * Логика обновления страниц
     *
     * @param UpdatePageRequest $request
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/img/pages'), $fileName);
            $page->images = '/assets/img/pages' . $fileName;
        }

        $page->fill($request->only('name', 'alias', 'text'));
        $page->save();

        return redirect()->route('admin.pages.index')->with('status', 'Страница обновлена');
    }

    /**
     * Удаление страницы
     *
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('status', 'Страница удалена');
    }
}