<?php

namespace App\Http\Controllers\website\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\products;
use App\cart;
use Illuminate\Support\Facades\Session;
use stdClass;

class CartController extends Controller
{
    public function cart(Request $request, $id)
    {
        $product = products::where('id', $id)->first();


        if ($product != null) {
            if (session('cart') != null) {
                $cart = session('cart');
            } else {
                $cart = new stdClass();
                $cart->products = [];
                $cart->totalPrice = 0;
                $cart->totalQuantity = 0;
            }
            $newCart = new cart($cart);
            $newCart->addcart($product, $id);

            $request->session()->put('cart', $newCart);
        }
        return view('website.shop.cart-item', compact('newCart'));
    }

    public function cartwQty(Request $request, $id, $qty=1)
    {
        $product = products::where('id', $id)->first();

  
        if ($product != null) {
            if (session('cart') != null) {
                $cart = session('cart');
            } else {
                $cart = new stdClass();
                $cart->products = [];
                $cart->totalPrice = 0;
                $cart->totalQuantity = 0;
            }
            $newCart = new cart($cart);
            $newCart->addcart($product, $id, $qty);

            $request->session()->put('cart', $newCart);
        }
        return view('website.shop.cart-item', compact('newCart'));
    }

    public function all_cart()
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
        return view('website.shop.cart-item', compact('newCart'));
    }

    public function deleteItemCart(Request $request, $id)
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
        $newCart->DeleteItemCart($id);

        if (count($newCart->products) > 0) {
            $request->session()->put('cart', $newCart);
        } else {
            $request->session()->forget('cart');
        }
        return view('website.shop.cart-item', compact('newCart'));

    }

    public function viewcart()
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
        return view('website.shop.cart', compact('newCart'));
    }

    public function delCartShopping(Request $request, $id)
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
        $newCart->DeleteItemCart($id);

        if (count($newCart->products) > 0) {
            $request->session()->put('cart', $newCart);
        } else {
            $request->session()->forget('cart');
        }
        return redirect()->route('shop.viewcart');
        return view('website.shop.cart', compact('newCart'));
    }

    public function cartupdate(Request $request)
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

        $quantities = $request->qty;

        if ($quantities != null && $newCart->products != null) {
            foreach ($quantities as $id => $newqty) {
                
                if ($newCart->products[$id]) {
                    $oldqty = $newCart->products[$id]['quantity'];
                    $qty = $newqty - $oldqty;
                    $product = products::where('id', $id)->first();
    
                    $newCart->addcart($product, $id, $qty);
                }
    
            }
    
            $request->session()->put('cart', $newCart);
            return view('website.shop.cart', compact('newCart'));
        } else {
            return redirect()->route('shop.viewcart');
        }
        

    }
}
