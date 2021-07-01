<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\admin\products;
use App\Models\admin\catParents;
use App\Models\admin\categories;
use App\Models\admin\product_image;
use App\Http\Requests\FormProductValidation;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catParents = catParents::all();
        $products = products::orderBy('id', 'desc')->get();
        return view('admin.products.list', compact('products', 'catParents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catParents = catParents::all();
        $totalCategories = [];
        foreach ($catParents as $catParent) {
            $categories = $catParent->categories;
            foreach ($categories as $category) {
                $totalCategories[] = $category;
            }
        }
        return view('admin.products.create', compact('catParents', 'totalCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormProductValidation $request)
    {
        
        $product = new products();
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = $request->price;
        $product->sort_description = $request->sort_description;
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        //lưu ảnh chính vào public/uploads/image (xem lại ở file config/filesystems.php)
        //kiểm tra nếu tồn tại input('image')
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            //tạo đường dẫn  và tên file ảnh
            $path = $image->store('image', 'public');

            //lưu tên file ảnh vào csdl
            $product->image = $path;
        }
        //lưu sản phẩm vào csdl
        $product->save();

        //lấy id của sản phẩm vừa lưu
        $product_id = $product->id;

        //lấy các ảnh phụ được tải lên
        $images = $request->file('images');
        if($images != null){
            foreach ($images as $image ) {
                //kiểm tra sự tồn tại của từng ảnh phụ
                if(isset($image)){
                    //tạo mới đối tượng product_image
                    $product_images = new product_image();
                    //tạo đường dẫn (public/uploads/images) và lưu tên file
                    $path = $image->store('images', 'public');
                    $product_images->image = $path;
                    $product_images->product_id = $product_id;
                    $product_images->save();
                }
            }
        }


        Session::flash('success', 'Thêm mới sản phẩm thành công');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = products::where('slug', $slug)->first();
        $catParents = catParents::all();
        $totalCategories = [];
        foreach ($catParents as $catParent) {
            $categories = $catParent->categories;
            foreach ($categories as $category) {
                $totalCategories[] = $category;
            }
        }
        return view('admin.products.edit', compact('catParents', 'totalCategories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormProductValidation $request, $slug)
    {
        $product = products::where('slug', $slug)->first();
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->sort_description = $request->sort_description;

        if ($request->hasfile('image')) {
            //xóa ảnh chính cũ nếu có ảnh chính mới 
            Storage::delete('/public/' . $image);

            //thêm lại ảnh chính

            $image = $request->file('image');

            //tạo đường dẫn  và tên file ảnh
            $path = $image->store('image', 'public');

            //lưu tên file ảnh vào csdl
            $product->image = $path;
        }

        //lưu sản phẩm vào csdl
        $product->save();

        //lấy id của sp vừa lưu
        $product_id = $product->id;

        //lấy các ảnh phụ được tải lên
        if($request->hasfile('images')){

            $images = $request->file('images');

            foreach ($images as $image ) {
                //kiểm tra sự tồn tại của từng ảnh phụ
                if(isset($image)){
                    //tạo mới đối tượng product_image
                    $product_images = new product_image();
                    //tạo đường dẫn (public/uploads/images) và lưu tên file
                    $path = $image->store('images', 'public');
                    $product_images->image = $path;
                    $product_images->product_id = $product_id;
                    $product_images->save();
                }
            }
        }
        
        Session::flash('success', 'Sửa sản phẩm thành công');
        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product = products::where('slug', $slug)->first();
        $product_id = $product->id;

        //tìm ảnh phụ thông qua product_id
        $product_images = product_image::where('product_id', $product_id)->get();

        foreach ($product_images as $product_image) {
            $product_image_del = $product_image->image;
            if ($product_image_del) {
                //xóa ảnh phụ trong folder public/uploads/images
                Storage::delete('/public/' . $product_image_del);
            }

            //xóa ảnh phụ trong bảng product_image trong csdl
            $product_image->delete();
        }

        $image = $product->image;
        //delete image
        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $product->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach task
        return redirect()->route('products.index');
    }

    public function filter(Request $request)
    {

        //lấy id catParent từ form gửi lên
        $catParent_id = $request->filter;
        $catParent = catParents::find($catParent_id);
        if ($catParent) {

            $catParents = catParents::all();

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
            $products = products::whereIn('category_id', $categories_id)->get();
            
            //chuyển hướng về trang listfilter
            return view('admin.products.listfilter', compact('products', 'catParent_id', 'catParents'));
        } else {

            //nếu k tìm thấy catParent_id thì sẽ chuyển hướng về products/list
            return redirect()->route('products.index');
        }

    }

    public function search(Request $request)
    {
        $products = products::where('name', 'like', "%$request->search%")->get();
        return view('admin.products.listsearch', compact('products'));
    }
}