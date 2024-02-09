<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MyClassController extends Controller
{

    public function index()
    {
        $allPosts = Post::all();
        return view('posts.index', ['posts'=>$allPosts]);
    }


    public function create()
    {
        $allCategories = Category::all();
        return view('posts.create', ['categories'=>$allCategories]);
    }


    public function store(Request $request)
    {
//        dd($request);
        Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'is_published' => $request->is_published,
            'category_id' =>$request->category_id
        ]);
        return redirect()->route('posts.index');
    }


    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }


    public function edit(Post $post)
    {

//        $title = Category::all($post->category_id);
//        dd($title);
        return view('posts.edit',['post' => $post]);
    }


    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=> $request->input('title'),
            'content'=> $request->input('content'),
            'category_id' =>$request->input('category_id'),
        ]);
        return redirect()->route('posts.index');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    //for test, how to get posts by category

//    public function cat(Category $cat)
//    {
////        dd($cat);
//        $posts = $cat->posts()->get()->toArray();
////        dd($posts);
//        return view('posts.cat', ['posts' => $posts]);
//    }
}






