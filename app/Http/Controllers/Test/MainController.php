<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('posts.main');
    }
}






