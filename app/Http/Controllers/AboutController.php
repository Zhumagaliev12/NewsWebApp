<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AboutController extends Controller
{
    public function index()
    {
        return view('posts.about');
    }
}






