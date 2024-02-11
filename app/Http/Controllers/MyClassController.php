<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class MyClassController extends Controller
{

    public function index()
    {
        $allPosts = Post::all();
        return view('posts.index', ['posts'=>$allPosts, 'categories'=> Category::all()]);
    }

    public function postsByCategory(Category $category)
    {
        return view('posts.index', ['posts' => $category->posts, 'categories'=>Category::all()]);
    }


    public function create()
    {
        return view('posts.create', ['categories'=>Category::all()]);
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
        return view('posts.edit',['post' => $post, 'categories' => Category::all()]);
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






