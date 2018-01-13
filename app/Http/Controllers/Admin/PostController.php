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
        $pageSize = $request->pageSize == null ? 10 : $request->pageSize;
        $keyword = $request->keyword;
        $path = "";
        if(!$keyword){
            $posts= Post::orderBy('id', 'desc')->paginate($pageSize);
            $path .="?pageSize=$pageSize"; 
        } else {
            $posts= Post::where('title', 'like', "%$keyword%")->paginate($pageSize);
            $path .="?pageSize=$pageSize&keyword=$keyword";
        }
        $posts->withPath($path); 
        return view('admin.posts.index', compact('posts', 'keyword', 'pageSize'));
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
        $comments = Post::find($id)->comments()->orderBy('created_at', 'desc')->get();
        // orderBy('name')
        // dd($commesnts);

        // dd($comments);
        return view('admin.posts.show', compact('post', 'comments'));
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
