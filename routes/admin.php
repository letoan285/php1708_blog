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



Route::get('posts', 'HomeController@index');
Route::get('dashboard', 'HomeController@dashboard');




// Route::get('/{bar}', function(Bar $bar){
// 	// return response()->json(['name', 'le vantoan', 'address'=>'Ha Noi']) ;
// 	// return 'my name is'.$name.' my age is '.$age;
// 	// return view('welcome');
// 	// dd($bar);
// });

Route::get('/', function(){

	return 'Home page';
	// return response()->json(['name', 'le vantoan', 'address'=>'Ha Noi']) ;
	// return view('homePage');
});