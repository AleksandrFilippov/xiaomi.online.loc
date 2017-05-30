<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

use App\Price;
use App\Cart;
use App\Product;

use Mail;
use DB;

class IndexController extends Controller
{
    public function execute(Request $request) {
    	    	
    	if($request->isMethod('post')) {

			$messages = [
			
			'required' => "Поле :attribute обязательно к заполнению",
			'email' => "Поле :attribute должно соответствовать email адресу"
			
			];
			
			$this->validate($request,[
			
			'name' => 'required|max:255',
			'email' => 'required|email',
			'text' => 'required'	
					
			], $messages);
			
			$data = $request->all();
			
			$result = Mail::send('site.email',['data'=>$data], function($message) use ($data) {
				
				$mail_admin = env('MAIL_ADMIN');
				
				$message->from($data['email'],$data['name']);
				$message->to($mail_admin,'Mr. Admin')->subject('Question');
				
			});
			
			if($result) {
				return redirect()->route('home')->with('status', 'Email is send');
			}
			
			//mail
		}
    	//маршрут к Модели Page
    	$pages = Page::all();
    	
    	//маршрут к Модели Portfolio
    	$portfolios = Portfolio::all();/*get(array('name','filter','images','price'));*/
    	
    	//Переменная $tags фильтр для раздела Portfolio вытаскивает данные из таблицы БД portfolios
    	$tags = DB::table('portfolios')->distinct()->pluck('filter');
    	
    	//маршрут к Модели Product
    	$products = Product::all();
         
    	$menu = array();
    	foreach($pages as $page) {
			$item = array('title' =>$page->name,'alias'=>$page->alias);
			array_push($menu,$item);
		}
			
		$item = array('title'=>'Каталог','alias'=>'Portfolio');
		array_push($menu,$item);
		
		/*$item = array('title'=>'Корзина','alias'=>'Cart');
		array_push($menu,$item);*/
			
		/*$item = array('title'=>'Обратная связь','alias'=>'contact');
		array_push($menu,$item);*/
		
		return view('site.index',array(
									
									'menu'=> $menu,
									'portfolios' => $portfolios,
									'pages' => $pages,
									'tags'=>$tags
									));							
	}
}