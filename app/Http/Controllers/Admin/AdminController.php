<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showUsers(Request $request)
    {
        $users = null;
        if ($request->search){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                ->with('role')->get();
        }
        else{
            $users = User::with('role')->get();
        }

        return view('admin.users', ['users'=> $users, 'search'=>$request->search] );
    }

    public function showPosts(Request $request)
    {
        $posts = null;
        if ($request->search){
            $posts = User::where('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('content', 'LIKE', '%'.$request->search.'%')
                ->with('category')->get();
        }
        else{
            $posts = Post::with('category', 'user')->get();
        }

//        $posts = Post::all();

        return view('admin.posts', ['posts'=> $posts]);
    }

    public function ban(User $user)
    {
        $user->update([
           'is_active' => false,
        ]);
        return back();
    }

    public function unban(User $user)
    {
        $user->update([
            'is_active' => true,
        ]);
        return back();
    }

    public function publish(Post $post)
    {
        $post->update([
            'is_published' => 2,
        ]);
        return back();
    }

    public function unpublish(Post $post)
    {
        $post->update([
            'is_published' => 1,
        ]);
        return back();
    }



}
