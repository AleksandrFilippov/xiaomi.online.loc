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
    Route::get('/page/{page}', ['uses' => 'PageController@show', 'as' => 'page']);
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
    Route::group(['prefix' => 'pages', 'namespace' => 'Admin'], function () {
        ///admin/pages
        Route::get('/', ['uses' => 'PagesController@index', 'as' => 'admin.pages.index']);

        //admin/pages/create
        Route::get('/create', ['uses' => 'PagesController@create', 'as' => 'admin.pages.create']);
        Route::post('/', ['uses' => 'PagesController@store', 'as' => 'admin.pages.store']);

        //admin/pages/2
        Route::get('/{page}', ['uses' => 'PagesController@edit', 'as' => 'admin.pages.edit']);
        Route::put('/{page}', ['uses' => 'PagesController@update', 'as' => 'admin.pages.update']);
        Route::delete('/{page}', ['uses' => 'PagesController@delete', 'as' => 'admin.pages.delete']);
    });

    //admin/products
    Route::group(['prefix' => 'products', 'namespace' => 'Admin'], function () {
        ///admin/products
        Route::get('/', ['uses' => 'ProductsController@index', 'as' => 'admin.products.index']);

        //admin/products/create
        Route::get('/create', ['uses' => 'ProductsController@create', 'as' => 'admin.products.create']);
        Route::post('/', ['uses' => 'ProductsController@store', 'as' => 'admin.products.store']);

        //admin/products/2
        Route::get('/{page}', ['uses' => 'ProductsController@edit', 'as' => 'admin.products.edit']);
        Route::put('/{page}', ['uses' => 'ProductsController@update', 'as' => 'admin.products.update']);
        Route::delete('/{page}', ['uses' => 'ProductsController@delete', 'as' => 'admin.products.delete']);
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

Route::get('/home', 'HomeController@index');

//для отправки файла
Route::get('/uploadfile', 'UploadFileController@index');
Route::post('/uploadfile', 'UploadFileController@showUploadFile');