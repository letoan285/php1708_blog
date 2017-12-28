<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Http\Requests\SaveCategoryRequest;


class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('admin.categories.create');
    }


    public function store(SaveCategoryRequest $request)
    {
    	$model = new Category();
        $model->name = $request->name;
        $model->slug = str_slug($request->name).'.html';

        $model->save();
        session()->flash('notif', 'Thêm thành công danh mục!');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $model = Category::find($id);


        $model->name = $request->name;

        $model->slug = $request->slug;
      
        $model->save();

        session()->flash('notif', 'Sửa thành công danh mục!');

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        if (Auth::user()->role < 50) {
            return view('admin.403');
        }
        $model = Category::find($id);
        if (!$model) {
            echo "<h1>Danh mục không tồn tại</h1>";die;
        }
        $model->delete();

        session()->flash('notif', 'Xóa thành công danh mục!');

        return redirect()->route('categories.index');
    }
    public function getPost($id){
        $posts = Category::find($id)->posts;
        dd($posts);
    }
}
