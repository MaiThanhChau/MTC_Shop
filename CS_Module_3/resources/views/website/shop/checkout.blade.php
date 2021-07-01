@extends('layout.index')
@section('content')

<!-- site__body -->
<div class="site__body">
    <!-- page -->
    <div class="page">
        <!-- page__header -->
        <div class="page__header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ol class="page__header-breadcrumbs breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Furniture</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Current Page</li>
                        </ol>
                        <h1 class="page__header-title decor-header decor-header--align--center">Thanh toán
                        </h1>
                    </div>
                </div>
            </div>
        </div><!-- page__header / end -->
        <!-- page__body -->
        <div class="page__body">
            <div class="block">
                <div class="container">
                    <form action="{{ route('shop.post-checkout') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="alert alert-lg alert-primary">Nếu bạn chưa đăng nhập? <a href="">Click
                                        vào đây</a></div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-7">
                                <div class="card mb-lg-0">
                                    <div class="card__header">
                                        <h4 class="decor-header">Chi tiết thanh toán</h4>
                                    </div>
                                    <div class="card__content">

                                        <div class="form-group">
                                            <label for="checkout-last-name">Họ tên: </label>
                                            <input type="text" class="form-control" id="checkout-last-name"
                                                name="user_name" placeholder="Họ tên">
                                        </div>
                                        <div class="form-group">
                                            <label for="checkout-company-name">Địa chỉ: </label>
                                            <input type="text" class="form-control" id="checkout-company-name"
                                                name="user_address" placeholder="Địa chỉ">
                                        </div>
                                        <div class="form-group">
                                            <label for="checkout-street-address">Email: </label>
                                            <input type="email" class="form-control" id="checkout-street-address"
                                                name="user_email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="checkout-address">Số điện thoại</label>
                                            <input type="text" class="form-control" id="checkout-address"
                                                name="user_phone" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                <div class="card mb-0">
                                    <div class="card__header">
                                        <h4 class="decor-header">Đơn hàng của bạn</h4>
                                    </div>
                                    <div class="card__content">
                                        <table class="checkout__totals">
                                            <thead class="checkout__totals-header">
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody class="checkout__totals-products">
                                                @if($newCart->products)
                                                @foreach($newCart->products as $product)
                                                <?php 
                                                    $total = $product['quantity'] * $product['productInfo']->price;
                                                ?>
                                                <tr>
                                                    <td>{{ $product['productInfo']->name }} (x
                                                        {{ $product['quantity'] }})

                                                        <input type="hidden"
                                                            name="products_qty[{{ $product['productInfo']->id }}]"
                                                            value="{{ $product['quantity'] }}">

                                                    </td>
                                                    <td>{{ number_format($total) }}<span
                                                            class="woocommerce-Price-currencySymbol"> ₫</span>

                                                        <input type="hidden"
                                                            name="products_amount[{{ $product['productInfo']->id }}]"
                                                            value="{{ $total }}">

                                                    </td>

                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot class="checkout__totals-footer">
                                                <tr>
                                                    <th>Tổng sản phẩm</th>
                                                    <td>{{ $newCart->totalQuantity }}</td>

                                                </tr>
                                                <tr>
                                                    <th>Thành tiền</th>
                                                    <td>{{ number_format($newCart->totalPrice) }}
                                                        <input type="hidden" name="amount"
                                                            value="{{ $newCart->totalPrice }}">
                                                    </td>
                                                </tr>
                                            </tfoot>

                                        </table>
                                        <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Thanh toán đơn hàng này?')">Thanh toán</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div><!-- page__body / end -->
    </div><!-- page / end -->
</div><!-- site__body / end -->

@endsection