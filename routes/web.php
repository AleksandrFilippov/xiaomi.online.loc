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
        Route::get('/{product}', ['uses' => 'ProductsController@edit', 'as' => 'admin.products.edit']);
        Route::put('/{product}', ['uses' => 'ProductsController@update', 'as' => 'admin.products.update']);

        Route::delete('/{product}', ['uses' => 'ProductsController@delete', 'as' => 'admin.products.delete']);
    });
    /**
     *  Загрузка прайса для массовый выгрузки товара на сайт
     */
    Route::group(['prefix' => 'loadproducts', 'namespace' => 'Admin'], function () {
        //admin
        Route::get('/', ['uses' => 'LoadProductsController@create', 'as' => 'admin.loadproducts.create']);
        Route::get('/uploadfile', 'LoadProductsController@index');
        Route::post('/uploadfile', 'LoadProductsController@showUploadFile');
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