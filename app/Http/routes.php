<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
    // return Category::all();
});

Route::any('category',function(){
	return view('/category');
});

Route::get('/login', 'View\MemberController@toLogin');
Route::get('/category','View\BookController@toCategory');
Route::get('/register','View\MemberController@toRegister');
Route::get('/product/category_id/{category_id}','View\BookController@toProduct');
Route::get('/product/{product_id}','View\BookController@toPdtContent');

Route::group(['middleware'=>'check.login'],function(){
	Route::get('/cart','View\CartController@toCart');
	Route::get('/order_commit/{product_ids}','View\OrderController@toOrderCommit');
	Route::get('/order_list','View\OrderController@toOrderList');
});

Route::group(['prefix'=>'service'],function(){
	Route::get('validate_code/create','Service\ValidateController@create');
	Route::post('validate_phone/send','Service\ValidateController@sendSMS');
	Route::get('validate_email','Service\ValidateController@validateEmail');
	Route::post('register','Service\MemberController@register');
	Route::post('login','Service\MemberController@login');
	Route::get('category/parent_id/{parent_id}','Service\BookController@getCategoryByParentId');
	Route::get('cart/add/{product_id}','Service\CartController@addCart');
	Route::get('cart/delete','Service\CartController@deleteCart');
});

Route::group(['prefix'=>'admin'],function(){
	Route::get('index','Admin\IndexController@index');
	Route::get('category',function(){
		return view('admin/category');
	});
	Route::get('login',function(){
		return view('admin/login');
	});
	Route::post('service/login','Admin\Service\LoginController@toLogin');
	Route::get('category','Admin\CategoryController@toCategory');
});


