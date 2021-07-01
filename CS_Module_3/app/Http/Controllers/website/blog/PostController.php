<?php

namespace App\Http\Controllers\website\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post()
    {
        return view('website.blog.post');
    }
}
