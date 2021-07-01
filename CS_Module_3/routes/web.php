<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\website\HomeController::class, 'index'])->name('home');
Route::get('/user',[App\Http\Controllers\website\UserController::class, 'user']);

Route::group(['prefix' => 'shop'], function ()
{
    Route::get('/product/{slug}', [App\Http\Controllers\website\shop\ProductController::class, 'product'])->name('shop.product');
    Route::get('/shoplist', [App\Http\Controllers\website\shop\ShopListController::class, 'shoplist'])->name('shop.list');
    Route::post('/shopsearch', [App\Http\Controllers\website\shop\ShopListController::class, 'shopsearch'])->name('shop.search');
    Route::get('/shoplist/filter', [App\Http\Controllers\website\shop\ShopListController::class, 'shoplistfilter'])->name('shoplist.filter');
    Route::get('/shoplist/categories/{slug}', [App\Http\Controllers\website\shop\ShopListController::class, 'shoplistcategories'])->name('shoplist.categories');
    Route::get('/cart/{id}', [App\Http\Controllers\website\shop\CartController::class, 'cart'])->name('shop.cart');
    Route::get('/cart/{id}/{qty}', [App\Http\Controllers\website\shop\CartController::class, 'cartwQty'])->name('shop.cartwQty');
    Route::get('/cart', [App\Http\Controllers\website\shop\CartController::class, 'viewcart'])->name('shop.viewcart');
    Route::get('/cart-update', [App\Http\Controllers\website\shop\CartController::class, 'cartupdate'])->name('shop.cartupdate');
    Route::get('/all-cart', [App\Http\Controllers\website\shop\CartController::class, 'all_cart'])->name('shop.all-cart');
    Route::get('/delete-cart/{id}', [App\Http\Controllers\website\shop\CartController::class, 'deleteItemCart'])->name('shop.delete-cart');
    Route::get('/delete-cartshopping/{id}', [App\Http\Controllers\website\shop\CartController::class, 'delCartShopping'])->name('shop.delete-cartshopping');
    Route::get('/checkout', [App\Http\Controllers\website\shop\CheckOutController::class, 'checkout'])->name('shop.checkout');
    Route::post('/post-checkout', [App\Http\Controllers\website\shop\CheckOutController::class, 'post_checkout'])->name('shop.post-checkout');
});

Route::get('/post', [App\Http\Controllers\website\blog\PostController::class, 'post']);
Route::get('/bloglist', [App\Http\Controllers\website\blog\BlogListController::class, 'blogList']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function ()
{
    ROute::get('/home', function ()
    {
        return view('home');
    })->name('admin.home');
    Route::resource('/categories', App\Http\Controllers\admin\CategoriesController::class);
    Route::post('/products/filter', [App\Http\Controllers\admin\ProductsController::class, 'filter'])->name('products.filter');
    Route::post('/products/search', [App\Http\Controllers\admin\ProductsController::class, 'search'])->name('products.search');
    Route::resource('/products', App\Http\Controllers\admin\ProductsController::class);
    Route::get('/orders/{id}', [App\Http\Controllers\admin\orderController::class, 'order_detail'])->name('orders.order_detail');
    Route::resource('/orders', App\Http\Controllers\admin\orderController::class);
});


Auth::routes();

