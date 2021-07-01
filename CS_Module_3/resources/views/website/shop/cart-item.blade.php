
<div class="dropcart__products-list">
    @foreach($newCart->products as $product)
    <div class="dropcart__product">
        <div class="dropcart__product-image">
            <a href="{{ route('shop.product', $product['productInfo']->slug) }}">
                <img src="{{ asset('storage/'.$product['productInfo']->image) }}" alt="" width="70px">
            </a>
        </div>
        <div class="dropcart__product-info">
            <div class="dropcart__product-name"><a href="{{ route('shop.product', $product['productInfo']->slug) }}">{{ $product['productInfo']->name }}</a></div>
            <div class="dropcart__product-price">{{ $product['quantity'] }} x
                {{ number_format($product['productInfo']->price) }}
                <span class="woocommerce-Price-currencySymbol"> ₫</span>
            </div>
        </div>
        <button type="button" class="dropcart__product-remove button-remove" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này')">
            <svg width="10px" height="10px" data-id="{{ $product['productInfo']->id }}">
                <use xlink:href="{{ url('/') }}/images/sprite.svg#cross-10"></use>
            </svg>
        </button>
    </div>
    @endforeach
</div>
<div class="dropcart__totals">
    <table>
        <tr>
            <th>Total</th>
            <td>{{number_format($newCart->totalPrice)}}<span class="woocommerce-Price-currencySymbol"> ₫</span></td>
        </tr>
    </table>
</div>
<div class="dropcart__buttons">
    <a class="btn btn-secondary" href="{{ route('shop.viewcart') }}">Giỏ hàng</a>
    <a class="btn btn-primary" href="{{ route('shop.checkout') }}">Thanh toán</a>
</div>