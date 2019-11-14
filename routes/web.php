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
    Route::post('', 'frontend\CheckoutController@postCheckOut');
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
Route::post('login', 'backend\LoginController@postLogin');

// router group
Route::group(['prefix' => 'admin'], function () {
    Route::get('', 'backend\IndexController@getIndex');
    // category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::post('', 'backend\CategoryController@postCategory');

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
        Route::post('add', 'backend\ProductController@postAddProduct');

        Route::get('edit', 'backend\ProductController@getEditProduct');
    });
    // user
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'backend\UserController@getUser');
        Route::get('add', 'backend\UserController@getAddUser');
        Route::post('add', 'backend\UserController@postAddUser');

        Route::get('edit', 'backend\UserController@getEditUser');
    });
});


//SCHEMA
// creat_table
Route::group(['prefix' => 'schema'], function () {
    Route::get('creat', function () {
        Schema::create('users', function ( $table) {
            $table->bigIncrements('id');     //khóa chính tự tăng , bigint, unsigned( không dấu âm dương)
            $table->string('full');          // varchar
            $table->string('address', 50);   // varchar, max 50 ky tu
            
            $table->timestamps();
        });
    });

    // Sửa bảng
    Route::get('edit', function () {
        // sua ten bang
    //     Schema::rename('users', 'member' );
    // });
    // xoa cot trong bang
    
        Schema::table('member', function($table){
            $table->dropColumn('address');
        });
    });
    Route::get('creat', function ($class) {
        Schema::$table->integer('id')->unsigned();
        
    });

    Route::get('update', function () {
        Schema::table('member', function($table){
        // thay đổi thuộc tính cột
        // $table->string('full',100)->nullable()->change();
        // });

        // thêm cột vào sau một cột khác
        $table->boolean('level')->nullable()->default(1)->after('full');
    });
    });
});