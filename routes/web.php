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




Route::get('/', function(){
	$name = ['Van Toan', 'COng phuong'];
	$age = 10;
	$address = "<a href='google.com'>Ha noi, Vietnam</a>";
	return view('welcome', compact('name', 'age', 'address'));
});

// Route::get('/dashboard', function(){
// 	return view('admin.dashboard');
// });

Route::get('home-page', function(){
	return view('web.home');
})->name('home.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('generate/{pass}', function($pass){
// 	$pass = Hash::make($pass);
// 	return $pass;
// });