<?php

namespace App\Http\Controllers\website\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    public function blogList()
    {
        return view('website.blog.blogList');
    }
}
