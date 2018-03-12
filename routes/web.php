<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web','check.middleware']], function () {
    //首页
    Route::get('/', function () {
        return view('welcome');
    });   
    
    //登入
    Route::get('/login', function () {
        return view('login');
    });

    //登出
    Route::post('/logout', 'loginController@logout');

    // 人员
    Route::group(['prefix' => 'personnel'], function () {
        //人员列表
        Route::get('/list', 'storeController@personnel_list');
        //新增人员
        Route::get('/add', 'storeController@personnel_add');
        Route::get('/add/{id}', 'storeController@personnel_add');
        
    });

    // 顾客
    Route::group(['prefix' => 'customer'], function () {
        //顾客列表
        Route::get('/list', 'storeController@customer_list');
        //新增顾客
        Route::get('/add', 'storeController@customer_add');
        Route::get('/add/{id}', 'storeController@customer_add');
        
    });




    Route::get('/about', function () {
        return view('about');
    });
});
Route::group(['middleware' => ['web']], function () {
    Route::get('/login', 'loginController@login');
});


// API
Route::post('/loginmethods/login', 'loginController@dologin');
Route::post('/personnel/add', 'storeController@add_personnel');
Route::post('/personnel/edit', 'storeController@edit_personnel');


