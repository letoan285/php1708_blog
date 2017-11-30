<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
    	$users = DB::table('users')->count();
    	$posts = DB::table('posts')->count();
    	return view('admin.dashboard', compact('users', 'posts'));
    }
    public function showUsers(){
    	$users = DB::table('users')->pluck('firstName', 'email');
    	dd($users);
    }
    public function insert($title, $content, $short, $author){
    	$post = [
    		'title' => $title, 
    		'content' => $content,
    		'short_desc' => $short,
    		'author' => $author
    	];
    	DB::table('posts')->insert($post);
    }
}
