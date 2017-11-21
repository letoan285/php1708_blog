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

Route::get('/posts', function(){
	$posts = [
		[
			'id' => 1,
			'image' => 'http://lorempixel.com/400/250',
			'title'=> 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet atque quasi cupiditate deleniti voluptatibus harum ipsum sit quam quas corporis?',
			'author' => 'Bac Ho'
		],
		[
			'id' => 2,
			'image' => 'http://lorempixel.com/400/250',
			'title'=> 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet atque quasi cupiditate deleniti voluptatibus harum ipsum sit quam quas corporis?',
			'author' => 'Bac Ho'
		],
		[
			'id' => 3,
			'image' => 'http://lorempixel.com/400/250',
			'title'=> 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet atque quasi cupiditate deleniti voluptatibus harum ipsum sit quam quas corporis?',
			'author' => 'Bac Ho'
		],
		[
			'id' => 4,
			'image' => 'http://lorempixel.com/400/250',
			'title'=> 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet atque quasi cupiditate deleniti voluptatibus harum ipsum sit quam quas corporis?',
			'author' => 'Bac Ho'
		],
		[
			'id' => 5,
			'image' => 'http://lorempixel.com/400/250',
			'title'=> 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet atque quasi cupiditate deleniti voluptatibus harum ipsum sit quam quas corporis?',
			'author' => 'Bac Ho'
		]
	];
	// dd($posts);
	return view('homePage', compact('posts'));
});