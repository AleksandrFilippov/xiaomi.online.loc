<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadFileController extends Controller {
   public function index(){
      return view('uploadfile');
   }
   public function showUploadFile(Request $request){
      $file = $request->file('image');
   
      //Вывод на экран File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Вывод на экран File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Вывод на экран File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Вывод на экран File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Вывод на экран File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
   
      //Move Uploaded File
      $destinationPath = 'assets\xls';
      $file->move($destinationPath,$file->getClientOriginalName());
   }
}