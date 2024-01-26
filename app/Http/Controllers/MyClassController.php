<?php

namespace App\Http\Controllers;

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
        return view('posts.create');
    }


    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'is_published' => $request->is_published
        ]);
        return redirect()->route('posts.index');
    }


    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }


    public function edit(Post $post)
    {
        return view('posts.edit',['post' => $post]);
    }


    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=> $request->input('title'),
            'content'=> $request->input('content'),
        ]);
        return redirect()->route('posts.index');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}






