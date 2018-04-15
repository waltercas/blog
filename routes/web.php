<?php

Route::redirect('/', 'blog');

Auth::routes();


//web
Route::get('blog', 				'web\PageController@blog')->name('blog');
Route::get('entrada/{slug}', 	'web\PageController@post')->name('post');
Route::get('categoria/{slug}', 	'web\PageController@category')->name('category');
Route::get('etiqueta/{slug}', 	'web\PageController@tag')->name('tag');

//admin 

route::resource('tags', 		'Admin\TagController');
route::resource('categories', 	'Admin\CategoryController');
route::resource('posts', 		'Admin\PostController');


