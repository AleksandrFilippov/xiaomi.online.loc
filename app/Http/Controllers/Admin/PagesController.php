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

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {

            $input = $request->except('_token');
            $validator = Validator::make($input, [

                'name' => 'required|max:255',
                'alias' => 'required|max:255|unique:pages,alias,' . $input['id'],
                'text' => 'required'

            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('admin.pages', ['page' => $input['id']])
                    ->withErrors($validator);
            }

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $file->move(public_path() . '/assets/img', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            } else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $pages->fill($input);

            if ($pages->update()) {
                return redirect('admin.pages')->with('status', 'Страница обновлена');
            }

        }

        $old = $pages->toArray();
        if (view()->exists('admin.pages_edit')) {

            $data = [
                'title' => 'Редактирование страницы - ' . $old['name'],
                'data' => $old
            ];
            return view('admin.pages_edit', $data);
        }
    }

    public function edit(Page $pages)
    {
        $pages->delete();
        return redirect('admin.pages')->with('status', 'Страница удалена');
    }
}