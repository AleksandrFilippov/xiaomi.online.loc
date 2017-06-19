<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use uploadfile;

class UploadFileController extends Controller {
   public function index(){
       $data = [
           'title' => 'Загрузка прайса',
       ];

       return view('admin.uploadfile.index', $data);
   }

    public function uploadfile(Request $request)
    {
      $file = $request->file('image');

        //Move Uploaded File
      $destinationPath = 'assets\xls';
      $file->move($destinationPath,$file->getClientOriginalName());
   }
}