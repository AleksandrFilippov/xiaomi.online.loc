<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Страница формы загрузки прайса
 *
 * Class UploadFileController
 * @package App\Http\Controllers
 */
class UploadFileController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Загрузка прайса',
        ];
        return view('admin.uploadfile.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadfile(Request $request)
    {
        $file = $request->file('image');

        //Move Uploaded File
        $destinationPath = 'assets\xls';
        $file->move($destinationPath, $file->getClientOriginalName());

        return redirect()->route('admin.uploadfile.index')->with('status', 'Прайс загружен');
    }
}