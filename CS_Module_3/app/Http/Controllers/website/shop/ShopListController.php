<?php

namespace App\Http\Controllers\website\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\products;
use App\Models\admin\categories;
use App\Models\admin\catParents;

class ShopListController extends Controller
{
    public function shoplist()
    {
        $products = products::orderBy('id', 'desc')->paginate(5);
        $bestsellers = products::orderBy('sold', 'desc')->limit(5)->get();
        $categories = categories::all();
        $catParents = catParents::all();
        return view('website.shop.shopList', compact('products', 'bestsellers', 'categories', 'catParents'));
    }

    public function shoplistfilter(Request $request)
    {
        $bestsellers = products::orderBy('sold', 'desc')->limit(5)->get();
        $categories = categories::all();
        $catParents = catParents::all();

        //lấy id catParent từ form gửi lên
        $catParent_id = $request->filter;
        $catParent = catParents::find($catParent_id);
        if ($catParent) {

            //tìm danh mục có thể loại là $catParent_id
            $categories = categories::where('catParent_id', $catParent_id)->get();
    
            //cho id các danh mục tìm được vào 1 mảng
            $categories_id = [];
            foreach ($categories as $category) {
                if ($category->products->toarray()) {
                    $categories_id[] = $category->id;
                }
            }
    
            //tìm tất cả các sản phẩm có danh mục là $categories_id và thể loại là $catParent_id
            $products = products::whereIn('category_id', $categories_id)->paginate(5);
            
            //chuyển hướng về trang listfilter
            return view('website.shop.shoplistfilter', compact('products', 'catParent_id', 'catParents', 'bestsellers', 'categories'));
        } else {

            //nếu k tìm thấy catParent_id thì sẽ chuyển hướng về products/list
            return redirect()->route('shop.list');
        }
    }

    public function shoplistcategories($slug)
    {
        $category = categories::where('slug', 'LIKE', "%$slug%")->first();
        if ($category) {
            $products = $category->products()->paginate(5);
        } else {
            $products = products::paginate(5);
        }
        $bestsellers = products::orderBy('sold', 'desc')->limit(5)->get();
        $categories = categories::all();
        $catParents = catParents::all();
        return view('website.shop.shopList', compact('products', 'bestsellers', 'categories', 'catParents'));
    }

    public function shopsearch(Request $request)
    {
        $name = $request->search;
        $products = products::where('name', 'LIKE', "%$name%")->paginate(5);
        $bestsellers = products::orderBy('sold', 'desc')->limit(5)->get();
        $categories = categories::all();
        $catParents = catParents::all();
        return view('website.shop.shopList', compact('products', 'bestsellers', 'categories', 'catParents'));
    }
}
