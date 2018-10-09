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



app('router')->group(['prefix' => 'admin','middleware' => 'roleUser'],function(){

	// route for dashbroad admin with all product and crud
	app('router')->get('/home',['as' => 'homeAdmin','uses' => 'AdminController@index']);

	// ROUTE FOR GET AND UPDATE USER INFORMATION
	app('router')->group(['prefix' => 'user'],function(){

		app('router')->get('/createUser',['as' => 'createUser','uses' => 'AdminController@getCreateUser']);

		app('router')->post('/createUser',['as' => 'createUser','uses' => 'AdminController@postCreateUser']);

		app('router')->get('/allUser',['as' => 'allUser','uses' => 'AdminController@getAllUser']);

		app('router')->get('/detailUser/{id}',['as' => 'detailUser','uses' => 'AdminController@getDetailUser']);

		app('router')->get('/updateUser/{id}',['as' => 'updateUser','uses' => 'AdminController@getUpdateUser']);

		app('router')->post('/updateUser/{id}',['as' => 'updateUser','uses' => 'AdminController@postUpdateUser']);

		app('router')->get('/deleteUser/{id}',['as' => 'deleteUser','uses' => 'AdminController@deleteUser']);

		app('router')->get('/seachUser',['as' => 'searchUser','uses' => 'AdminController@seachUser']);

		
	});


	app('router')->get('/home',['as' => 'homeAdmin','uses' => 'AdminController@index']);


	// Route for CRUD with product
	app('router')->group(['prefix' => 'product'],function(){
		
		app('router')->get('/createProduct',['as' => 'createProduct','uses' => 'AdminController@getCreateProduct']);

		app('router')->post('/createProduct',['as' => 'createProduct','uses' => 'AdminController@postCreateProduct']);





		app('router')->get('/getProduct/{id}',['as' => 'detailProduct','uses' => 'AdminController@getDetailProduct'])->where('id', '[0-9]+');

		app('router')->get('/updateProduct/{id}',['as' => 'updateProduct','uses' => 'AdminController@getUpdateProduct'])->where('id', '[0-9]+');

		app('router')->post('/updateProduct/{id}',['as' => 'updateProduct','uses' => 'AdminController@postUpdateProduct'])->where('id', '[0-9]+');

		app('router')->get('/deleteProduct/{id}',['as' => 'deleteProduct','uses' => 'AdminController@deleteProduct'])->where('id', '[0-9]+');





		app('router')->get('/filterProduct',['as' => 'filterProduct','uses' => 'AdminController@filterProduct']);

	});






});


	app('router')->group(['prefix'  =>  'user'],function(){

		// route for get all product
		app('router')->get('/home',['as' => 'home','uses' => 'UserController@index']);

	});

			
	app('router')->group(['prefix' => 'api/v1', 'middleware' => 'api'], function(){

		app('router')->resource('products', 'ProductController');
	 });

	Auth::routes();
	




	
