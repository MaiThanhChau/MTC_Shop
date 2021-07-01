<?php

namespace App\Http\Controllers\website\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cart;
use Illuminate\Support\Facades\Session;
use stdClass;
use App\Models\admin\order_detail;
use App\Models\admin\order;
use App\Models\admin\products;

class CheckOutController extends Controller
{
    public function checkout()
    {
        if (session('cart') != null) {
            $cart = session('cart');
        } else {
            $cart = new stdClass();
            $cart->products = [];
            $cart->totalPrice = 0;
            $cart->totalQuantity = 0;
        }
        $newCart = new cart($cart);

        return view('website.shop.checkout', compact('newCart'));
    }

    public function post_checkout(Request $request)
    {
        //lưu vào bảng order
        $order = new order();
        $order->user_name = $request->user_name;
        $order->user_address = $request->user_address;
        $order->user_email = $request->user_email;
        $order->user_phone = $request->user_phone;
        $order->amount = $request->amount;

        $order->save();
        $order_id = $order->id;

        //lưu vào bảng order_detail

        // dd($request->products_qty);
        foreach ($request->products_qty as $id => $product_qty) {
            $order_detail = new order_detail;
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $id;
            $order_detail->quantity = $product_qty;
            $order_detail->save();

            $product = products::where('id', $id)->first();
            $product->sold += $product_qty;
            $product->save();

        }
        foreach ($request->products_amount as $id => $product_amount) {
            $order_detail = order_detail::where([
                ['product_id', $id],
                ['order_id', $order_id]
            ])->first();
            $order_detail->amount = $product_amount;
            $order_detail->save();

        }
        $request->session()->forget('cart');
        return view('website.shop.checkoutsuccess');
    }
}
