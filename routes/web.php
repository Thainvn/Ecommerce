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



Route::group(['prefix' => 'admin','middleware' => 'roleUser'],function(){

	// route for dashbroad admin with all product and crud
	Route::get('/home',['as' => 'homeAdmin','uses' => 'AdminController@index']);

	// ROUTE FOR GET AND UPDATE USER INFORMATION
	Route::group(['prefix' => 'user'],function(){

		Route::get('/createUser',['as' => 'createUser','uses' => 'AdminController@getCreateUser']);

		Route::post('/createUser',['as' => 'createUser','uses' => 'AdminController@postCreateUser']);

		Route::get('/allUser',['as' => 'allUser','uses' => 'AdminController@getAllUser']);

		Route::get('/detailUser/{id}',['as' => 'detailUser','uses' => 'AdminController@getDetailUser']);

		Route::get('/updateUser/{id}',['as' => 'updateUser','uses' => 'AdminController@getUpdateUser']);

		Route::post('/updateUser/{id}',['as' => 'updateUser','uses' => 'AdminController@postUpdateUser']);

		Route::get('/deleteUser/{id}',['as' => 'deleteUser','uses' => 'AdminController@deleteUser']);

		Route::get('/seachUser',['as' => 'searchUser','uses' => 'AdminController@seachUser']);

		
	});


	Route::get('/home',['as' => 'homeAdmin','uses' => 'AdminController@index']);


	// Route for CRUD with product
	Route::group(['prefix' => 'product'],function(){
		
		Route::get('/createProduct',['as' => 'createProduct','uses' => 'AdminController@getCreateProduct']);

		Route::post('/createProduct',['as' => 'createProduct','uses' => 'AdminController@postCreateProduct']);





		Route::get('/getProduct/{id}',['as' => 'detailProduct','uses' => 'AdminController@getDetailProduct'])->where('id', '[0-9]+');

		Route::get('/updateProduct/{id}',['as' => 'updateProduct','uses' => 'AdminController@getUpdateProduct'])->where('id', '[0-9]+');

		Route::post('/updateProduct/{id}',['as' => 'updateProduct','uses' => 'AdminController@postUpdateProduct'])->where('id', '[0-9]+');

		Route::get('/deleteProduct/{id}',['as' => 'deleteProduct','uses' => 'AdminController@deleteProduct'])->where('id', '[0-9]+');





		Route::get('/filterProduct',['as' => 'filterProduct','uses' => 'AdminController@filterProduct']);

	});






});


	Route::group(['prefix'  =>  'user'],function(){

		// route for get all product
		Route::get('/home',['as' => 'home','uses' => 'UserController@index']);

	});

			
	Route::group(['prefix' => 'api/v1', 'middleware' => 'api'], function(){

		Route::resource('products', 'ProductController');
	 });

	Auth::routes();
	




	
