<?php
namespace App;
class cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
        $this->products = ($cart->products != null) ? $cart->products : null;
        $this->totalPrice = $cart->totalPrice;
        $this->totalQuantity = $cart->totalQuantity;
    }

    public function addcart($product, $id, $quantity = 1)
    {
        $newProduct = [
            'quantity' => 0,
            'price' => $product->price,
            'productInfo' => $product
        ];

        

        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quantity'] += $quantity;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price * $quantity;
        $this->totalQuantity += $quantity;
    }

    public function DeleteItemCart($id)
    {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}