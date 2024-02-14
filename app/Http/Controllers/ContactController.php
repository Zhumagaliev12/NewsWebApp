<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ContactController extends Controller
{
    public function index()
    {
        return view('posts.contact');
    }
}






