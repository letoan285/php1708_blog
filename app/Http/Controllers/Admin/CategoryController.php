<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;


class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::all();
    	return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
    	return view('admin.categories.create');
    }
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:6|max:255',
    		'slug' => 'required'
    	]);

    	dd($request->all());
    }
}
