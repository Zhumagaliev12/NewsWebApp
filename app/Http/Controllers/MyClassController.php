<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MyClassController extends Controller
{

    public function index()
    {
//        $this->authorize('viewAny');

//        $allPosts = Post::with('comments.user')->get();

        $allPosts = Post::paginate(3);
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
        $validated =  $request->validate([
           'title' => 'required|max:255',
           'content' => 'required',
           'is_published' => 'required|numeric',
           'category_id' => 'required|numeric|exists:categories,id',
        ]);

//        Post::create($validated + ['user_id' => Auth::user()->id]);

        Auth::user()->posts()->create($validated);

        return redirect()->route('posts.index')->with('message', 'Post was created succesfully!');
    }

    public function show(Post $post)
    {
//        $this->authorize('view', $post);
        $post->load('comments.user');
        return view('posts.show', ['post' => $post]);
    }


    public function edit(Post $post)
    {
        return view('posts.edit',['post' => $post, 'categories' => Category::all()]);
    }


    public function update(Request $request, Post $post)
    {
        $validated =  $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'is_published' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);

        $post->update($validated);
        return redirect()->route('posts.index')->with('message', 'Post updated succesfully!');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

}






