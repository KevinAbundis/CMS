<?php

Route::prefix('/admin')->group(function(){
	Route::get('/', 'Admin\DashboardController@getDashboard');
	Route::get('/users','Admin\UsersController@getUsers');

	//Module Products
	Route::get('/products', 'Admin\ProductsController@getHome');
	Route::get('/product/add', 'Admin\ProductsController@getProductAdd');
	Route::get('/product/{id}/edit', 'Admin\ProductsController@getProductEdit');
	Route::post('/product/add', 'Admin\ProductsController@postProductAdd');

	//Categories
	Route::get('/categories/{module}', 'Admin\CategoriesController@getHome');
	Route::post('/category/add', 'Admin\CategoriesController@postCategoryAdd');
	Route::get('/category/{id}/edit', 'Admin\CategoriesController@getCategoryEdit');
	Route::post('/category/{id}/edit', 'Admin\CategoriesController@postCategoryEdit');
	Route::get('/category/{id}/delete', 'Admin\CategoriesController@getCategoryDelete');
});