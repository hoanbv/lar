<?php


// Route::get('/', function () {
//     return view('welcome');
// });

//FONTEND
Route::get('','frontend\UserController@getIndex');
Route::get('about','frontend\UserController@getAbout');

Route::get('contact','frontend\UserController@getContact');



// cart
Route::get('cart', 'frontend\CartController@getCart');
// checkout

Route::group(['prefix' => 'checkout'], function () {
    Route::get('', 'frontend\CheckoutController@getCheckOut');
    Route::get('complete', 'frontend\CheckoutController@getComplete');

    
});

// product

Route::group(['prefix' => 'product'], function () {
    Route::get('shop', 'frontend\PrdController@getPrd');
    Route::get('detail', 'frontend\PrdController@getDetail');

    
});

//  BACKEND
// login
Route::get('login', 'backend\LoginController@getLogin');
// router group
Route::group(['prefix' => 'admin'], function () {
    Route::get('', 'backend\IndexController@getIndex');
    // category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::get('edit', 'backend\CategoryController@getEditCategory');
    });
    // oder
    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'backend\OrderController@getOrder');
        Route::get('detail', 'backend\OrderController@getDetailOrder');
        Route::get('process', 'backend\OrderController@getProcessOrder');
    });
    // product
    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'backend\ProductController@getProduct');
        Route::get('add', 'backend\ProductController@getAddProduct');
        Route::get('edit', 'backend\ProductController@getEditProduct');
    });
    // user
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'backend\UserController@getUser');
        Route::get('add', 'backend\UserController@getAddUser');
        Route::get('edit', 'backend\UserController@getEditUser');
    });
});
