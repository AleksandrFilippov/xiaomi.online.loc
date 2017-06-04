<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//контроллер главной страницы
Route::group([], function () {

    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'home']);
    Route::post('/', ['uses' => 'IndexController@mail', 'as' => 'mail']);
    Route::get('/page/{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);
    Route::auth();
});

//admin/service
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //admin
    Route::get('/', function () {
        if (view()->exists('admin.index')) {
            $data = ['title' => 'Панель администратора'];
            return view('admin.index', $data);
        }
    });

    //admin/pages
    Route::group(['prefix' => 'pages'], function () {
        ///admin/pages
        Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);
        //admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PagesAddController@execute', 'as' => 'pagesAdd']);
        //admin/edit/2
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'PagesEditController@execute', 'as' => 'pagesEdit']);
    });
    //admin/portfolios
    Route::group(['prefix' => 'portfolios'], function () {
        Route::get('/', ['uses' => 'PortfoliosController@execute', 'as' => 'portfolio']);
        Route::match(['get', 'post'], '/add', ['uses' => 'PortfoliosAddController@execute', 'as' => 'portfoliosAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses' => 'PortfoliosEditController@execute', 'as' => 'portfoliosEdit']);
    });
    //admin/services
    Route::group(['prefix' => 'services'], function () {
        Route::get('/', ['uses' => 'ServiceController@execute', 'as' => 'services']);
        Route::match(['get', 'post'], '/add', ['uses' => 'ServicesAddController@execute', 'as' => 'servicesAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses' => 'ServicesEditController@execute', 'as' => 'servicesEdit']);
    });
});

Route::auth();
Route::get('/home', 'HomeController@index');

//для отправки файла
Route::get('/uploadfile', 'UploadFileController@index');
Route::post('/uploadfile', 'UploadFileController@showUploadFile');