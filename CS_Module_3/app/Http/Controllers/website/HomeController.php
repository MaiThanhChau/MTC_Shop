<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\products;

class HomeController extends Controller
{
    public function index()
    {
        $products = products::orderBy('sold', 'desc')->limit(6)->get();
        $latest_products = products::orderBy('id', 'desc')->limit(6)->get();
        return view('website.index', compact('products', 'latest_products'));
    }
}
