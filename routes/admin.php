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

Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
Route::get('users', 'Admin\DashboardController@showUsers');

Route::get('categories', 'Admin\CategoryController@index')->name('categories.index');
Route::get('categories/create', 'Admin\CategoryController@create')->name('categories.create');
Route::post('categories', 'Admin\CategoryController@store')->name('categories.store');

// Route::get('insert/{title}/{content}/{short}/{author}', 'Admin\DashboardController@insert');




// Route::get('/{bar}', function(Bar $bar){
// 	// return response()->json(['name', 'le vantoan', 'address'=>'Ha Noi']) ;
// 	// return 'my name is'.$name.' my age is '.$age;
// 	// return view('welcome');
// 	// dd($bar);
// });

