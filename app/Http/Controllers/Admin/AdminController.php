<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function showPosts()
    {
        return view('admin.posts');
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
}
