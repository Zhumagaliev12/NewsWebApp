<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
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
            $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')
                ->orWhere('content', 'LIKE', '%'.$request->search.'%')
                ->with('category')
                ->get();
        }
        else{
            $posts = Post::with('category', 'user')->get();
        }

//        $posts = Post::all();

        return view('admin.posts', ['posts'=> $posts, 'search'=>$request->search]);
    }

    public function showCategories()
    {

        $categories = Category::all();
        return view('admin.categories',['categories' => $categories]);
    }

    public function showRoles()
    {
        $roles = Role::all();
        return view('admin.roles',['roles' => $roles]);
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

    public function storeRole(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required|max:255',
        ]);

        Role::create($validated);

        return redirect()->route('admin.roles')->with('message', 'Role was created succesfully!');
    }

    public function storeCategory(Request $request)
    {
        $validated =  $request->validate([
            'title' => 'required|max:255',
            'code' => 'required|max:255',
        ]);

        Category::create($validated);

        return redirect()->route('admin.categories')->with('message', 'Category was created succesfully!');
    }

    public function destroyRole(Role $role)
    {
       $role->delete();
        return redirect()->route('admin.roles')
            ->with('message','Role was deleted successfully');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')
            ->with('message','Category was deleted successfully');
    }

    public function showComments()
    {
        return view('admin.comments', ['comments' => Comment::all()]);
    }

}
