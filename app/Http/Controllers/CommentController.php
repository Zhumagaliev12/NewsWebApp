<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function commentStore(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
            'post_id' => 'required|numeric|exists:posts,id'
        ]);

        Auth::user()->comments()->create($validated);

        return back()->with('message', 'Comment was created!');
    }

    public function commentDestroy(Comment $id)
    {
//        dd($comment);
        $id->delete();
//        return redirect()->route('posts.show', ['post'=>$request->input('post_id')]);
        return back()->with('message', 'Comment was deleted!');
    }
}
