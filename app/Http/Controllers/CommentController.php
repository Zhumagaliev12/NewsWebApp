<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentStore(Request $request)
    {
        Comment::create([
            'content' => $request->input('content'),
            'post_id' => $request->input('post_id')
        ]);

        return redirect()->route('posts.show', $request->input('post_id'));
    }

    public function commentDestroy(Comment $id, Request $request)
    {
        $id->delete();
        return redirect()->route('posts.show', ['post'=>$request->input('post_id')]);
    }
}
