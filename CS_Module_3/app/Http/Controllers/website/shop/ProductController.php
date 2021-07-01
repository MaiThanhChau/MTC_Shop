<?php

namespace App\Http\Controllers\website\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\products;

class ProductController extends Controller
{
    public function product($slug)
    {
        $product = products::where('slug', $slug)->first();
        $images = $product->images;
        $product_category = $product->category_id;
        //sản phẩm liên quan
        $related_products = products::where('category_id', $product_category)->where('id', '<>', $product->id)->get();
        return view('website.shop.product', compact('product', 'images', 'related_products'));
    }
}
