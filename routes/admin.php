<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| return response()->json(['name'=>'tn', 'address'=>'Ha noi']);
| routes are loaded by the RouteServiceProvider within a group which
|
*/


Route::get('/test', function(){
	return 'admin home page';
});



// Route::get('posts', 'HomeController@index');

Route::get('dashboard', 'HomeController@dashboard');

Route::group(['namespace' => 'Admin'], function(){

	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::get('users', 'DashboardController@showUsers');

	Route::get('categories', 'CategoryController@index')->name('categories.index');
	Route::get('categories/create', 'CategoryController@create')->name('categories.create')->middleware('isAdmin');
	Route::post('categories', 'CategoryController@store')->name('categories.store');
	Route::get('get-post/{id}', 'CategoryController@getPost')->name('getPost');


	Route::get('categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
	
	Route::post('/categories/update/{id}', 'CategoryController@update')->name('categories.update');
	Route::get('/categories/delete/{id}', 'CategoryController@destroy')->name('categories.destroy')->middleware('isAdmin');
	Route::get('users', 'UserController@index')->name('users.index')->middleware('isAdmin');
	Route::get('users/create', 'UserController@create')->name('users.create')->middleware('isAdmin');
	Route::post('users', 'UserController@store')->name('users.store')->middleware('isAdmin');
	Route::get('users/edit/{id}', 'UserController@edit')->name('users.edit')->middleware('isAdmin');
	Route::post('users/update/{id}', 'UserController@update')->name('users.update')->middleware('isAdmin');
	Route::get('users/delete/{id}', 'UserController@destroy')->name('users.destroy')->middleware('isAdmin');
	Route::get('get-cate/{id}', 'PostController@getCateName');
	Route::get('get-profile/{id}', 'UserController@getProfile')->name('users.getProfile');
	Route::get('posts', 'PostController@index')->name('posts.index');
	Route::get('posts/create', 'PostController@create')->name('posts.create');
	Route::post('posts', 'PostController@store')->name('posts.store');
	Route::get('posts/edit/{id}', 'PostController@edit')->name('posts.edit');
	Route::post('posts/update/{id}', 'PostController@update')->name('posts.update');
	Route::get('posts/delete/{id}', 'PostController@destroy')->name('posts.destroy');

	Route::get('posts/{id}', 'PostController@show')->name('posts.show');



	Route::get('tags', 'TagController@index')->name('tags.index');
	Route::post('tags', 'TagController@store')->name('tags.store');
	Route::get('tags/edit/{id}', 'TagController@edit')->name('tags.edit');
	Route::post('tags/update/{id}', 'TagController@update')->name('tags.update');

	Route::get('tags/{id}', 'TagController@show')->name('tags.show');
	Route::get('tags/delete/{id}', 'TagController@destroy')->name('tags.destroy');

});


// Route::get('insert/{title}/{content}/{short}/{author}', 'Admin\DashboardController@insert');




// Route::get('/{bar}', function(Bar $bar){
// 	// return response()->json(['name', 'le vantoan', 'address'=>'Ha Noi']) ;
// 	// return 'my name is'.$name.' my age is '.$age;
// 	// return view('welcome');
// 	// dd($bar);
// });

