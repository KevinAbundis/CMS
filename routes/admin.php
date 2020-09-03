<?php

Route::prefix('/admin')->group(function(){
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

	//Module Users
	Route::get('/users/{status}','Admin\UsersController@getUsers')->name('user_list');
	Route::get('/user/{id}/edit','Admin\UsersController@getUserEdit')->name('user_edit');
	Route::get('/user/{id}/banned','Admin\UsersController@getUserBanned')->name('user_banned');
	Route::get('/user/{id}/permissions','Admin\UsersController@getUserPermissions')->name('user_permissions');
	Route::post('/user/{id}/permissions','Admin\UsersController@postUserPermissions')->name('user_permissions');

	//Module Products
	Route::get('/products/{status}', 'Admin\ProductsController@getHome')->name('products');
	Route::get('/product/add', 'Admin\ProductsController@getProductAdd')->name('product_add');
	Route::get('/product/{id}/edit', 'Admin\ProductsController@getProductEdit')->name('product_edit');
	Route::get('/product/{id}/delete', 'Admin\ProductsController@getProductDelete')->name('product_delete');
	Route::get('/product/{id}/restore', 'Admin\ProductsController@getProductRestore')->name('product_delete');
	Route::post('/product/add', 'Admin\ProductsController@postProductAdd')->name('product_add');
	Route::post('/product/search', 'Admin\ProductsController@postProductSearch')->name('product_search');
	Route::post('/product/{id}/edit', 'Admin\ProductsController@postProductEdit')->name('product_edit');
	Route::post('/product/{id}/gallery/add', 'Admin\ProductsController@postProductGalleryAdd')->name('product_gallery_add');
	Route::get('/product/{id}/gallery/{gid}/delete', 'Admin\ProductsController@getProductGalleryDelete')->name('product_gallery_delete');

	//Categories
	Route::get('/categories/{module}', 'Admin\CategoriesController@getHome')->name('categories');
	Route::post('/category/add', 'Admin\CategoriesController@postCategoryAdd')->name('category_add');
	Route::get('/category/{id}/edit', 'Admin\CategoriesController@getCategoryEdit')->name('category_edit');
	Route::post('/category/{id}/edit', 'Admin\CategoriesController@postCategoryEdit')->name('category_edit');
	Route::get('/category/{id}/delete', 'Admin\CategoriesController@getCategoryDelete')->name('category_delete');
});