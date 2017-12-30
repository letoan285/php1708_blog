<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if(!$keyword){
            $posts= Post::orderBy('id', 'desc')->paginate(10);  
        } else {
            $posts= Post::where('title', 'like', "%$keyword%")->paginate(10);
            $posts->withPath("?keyword=$keyword"); 
        }
        return view('admin.posts.index', compact('posts', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request)
    {
        // dd($request);
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        if ($request->hasFile('featured')) {
            $file = $request->file('featured');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs('upload/posts', $fileName);
            $post->featured = 'upload/posts/'.$fileName;
        }
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags, false);
        session()->flash('notif', 'Thêm thành công bài viết!');
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        if ($request->hasFile('featured')) {
            $file = $request->file('featured');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs('upload/posts', $fileName);
            $post->featured = 'upload/posts/'.$fileName;
        }
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        session()->flash('notif', 'Thêm thành công bài viết!');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // dd($post);
        $post->tags()->detach();
        $post->delete();
        if (file_exists($post->featured)) {
            unlink(public_path($post->featured));
        }
        return redirect()->back();
    }
    public function getCateName($id){
        $cate = Post::find($id)->category;
        dd($cate);
    }
}
