<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('posts.about');
    }
}






