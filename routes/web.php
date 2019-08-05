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






Route::get('/test', function () {
    return view('test');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');;
Route::get('/category/{id}','HomeController@showCates');
Route::get('/search','HomeController@productSearch')->name('search');
Route::get('/log_out','HomeController@logout')->name('log_out');



Route::get('product/{id}','HomeController@product');

Route::get('/contact',function(){return view('front.contact');})->name('contact');
Route::get('test',function(){return view('front.test');});

Route::group(['prefix'=>'cart'],function(){
	Route::get('/index','CartController@index');
	Route::get('/addItem/{id}','CartController@addItem');
	Route::get('/updateItem','CartController@updateItem');
	Route::get('/refreshItem','CartController@refreshItem');
	Route::get('/removeItem','CartController@removeItem');
	Route::get('/removeNavCartItem','CartController@removeNavCartItem');
	Route::get('/getNav','CartController@getNav');
});

Route::group(['prefix'=>'checkout'],function(){
	Route::get('/','CheckoutController@index');
});

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
	Route::get('/', function () {
    	return view('admin.index');
	})->name('admin');
	Route::resource('product','ProductController');
	Route::resource('category','CategoriesController');
	Route::get('product/category/{id}','ProductController@category');
	Route::get('orderList','OrderController@orderList');
	Route::get('shippingAddress/{orders_id}','OrderController@shippingAddress');
	Route::get('backPage','OrderController@orderList');

	//Route::get('/formvalidate','CheckoutController@address');
	
});

Route::group(['middleware'=>['auth']],function(){
	Route::post('/purchase','CheckoutController@address');
	Route::get('/check','CheckoutController@check');
	Route::get('/thanks','CheckoutController@thanks');
	Route::get('/profile','ProfileController@index');
	Route::get('/orders','ProfileController@orders');
	Route::get('/address','ProfileController@address');
	Route::post('/updateAddress/{id}','ProfileController@updateAddress');
	Route::get('/password','ProfileController@password');

	Route::put('/changePassword','ProfileController@changePassword');
	Route::get('/detail/{orders_id}','ProfileController@detailInfo');
});

