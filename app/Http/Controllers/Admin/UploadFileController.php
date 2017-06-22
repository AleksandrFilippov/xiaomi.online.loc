<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function upload(Request $request)
    {
        $file = $request->file('images');

        //Move Uploaded File
        $destinationPath = public_path('assets\xls');
        $file->move($destinationPath, $file->getClientOriginalName());

        return redirect()->route('admin.upload.index')->with('status', 'Прайс загружен');
    }
}