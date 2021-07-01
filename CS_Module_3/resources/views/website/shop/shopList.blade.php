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
                        <h1 class="page__header-title decor-header decor-header--align--center">Shop List
                        </h1>
                    </div>
                </div>
            </div>
        </div><!-- page__header / end -->
        <!-- page__body -->
        <div class="page__body">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3 order-1 order-lg-0">
                        <div class="block">
                            <aside class="sidebar">
                                <!-- widget-categories -->
                                <div class="widget widget--card">
                                    <div class="widget__title">
                                        <h4 class="decor-header">Danh mục</h4>
                                    </div>
                                    <div class="widget__body">
                                        <div class="widget-categories" data-collapse
                                            data-collapse-open-class="widget-categories__item--open">
                                            <ul class="widget-categories__list">
                                                @foreach($categories as $category)
                                                <li class="widget-categories__item" data-collapse-item>
                                                    <button class="widget-categories__arrow" data-collapse-trigger>
                                                    </button>
                                                    <a href="{{ route('shoplist.categories', $category->slug) }}"
                                                        class="widget-categories__link">{{ $category->name }}
                                                        <span
                                                            class="widget-categories__counter">({{ count($category->products) }})</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- widget-categories / end -->
                                <!-- widget-filters -->
                                <div class="widget widget--card">
                                    <div class="widget__title">
                                        <h4 class="decor-header">Sản phẩm bán chạy nhất</h4>
                                    </div>
                                    <div class="widget__body">
                                        <ul class="widget-products-list">
                                            @foreach($bestsellers as $bestseller)
                                            <li class="widget-products-list__item">
                                                <div class="widget-products-list__image"><a
                                                        href="{{ route('shop.product', $bestseller->slug) }}"><img
                                                            src="{{ asset('storage/'.$bestseller->image) }}"
                                                            width="100%" height="50px" alt=""></a></div>
                                                <div class="widget-products-list__info">
                                                    <div class="widget-products-list__category"><a
                                                            href="">{{ $bestseller->categories->name }}</a></div>
                                                    <div class="widget-products-list__name"><a
                                                            href="{{ route('shop.product', $bestseller->slug) }}">{{ $bestseller->name }}</a>
                                                    </div>
                                                    <div class="widget-products-list__price">
                                                        {{ number_format($bestseller->price) }}
                                                        <span class="woocommerce-Price-currencySymbol"> ₫</span>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div><!-- widget-products-list / end -->
                            </aside>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="block">
                            <div class="products-view">
                                <div class="products-view__options view-options">
                                    <div class="view-options__divider"></div>
                                    <div class="view-options__control">
                                        <form action="{{ route('shoplist.filter') }}" method="get">
                                            @csrf
                                            <select onchange="this.form.submit()" name="filter">
                                                <option value="0">Tất cả sản phẩm</option>
                                                @foreach($catParents as $catParent)
                                                <option value="{{ $catParent->id }}">{{ $catParent->name }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="products-view__list products-list products-list--layout--list">
                                    @if($products)
                                    @foreach($products as $product)
                                    <div class="products-list__item">
                                        <div class="product-card product-card--layout--list">
                                            <div class="product-card__image"><a
                                                    href="{{ route('shop.product', $product->slug) }}"><img
                                                        src="{{ asset('storage/'.$product->image) }}" alt=""></a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__category"><a
                                                        href="{{ route('shoplist.categories', $product->categories->slug) }}">{{ $product->categories->name }}</a>
                                                </div>
                                                <div class="product-card__name"><a
                                                        href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="product-card__rating-title">Reviews (15)
                                                    </div>
                                                    <div class="product-card__rating-stars">
                                                        <div class="rating">
                                                            <div class="rating__body"><svg
                                                                    class="rating__star rating__star--active"
                                                                    width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                                        </use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                                        </use>
                                                                    </g>
                                                                </svg> <svg class="rating__star rating__star--active"
                                                                    width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                                        </use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                                        </use>
                                                                    </g>
                                                                </svg> <svg class="rating__star rating__star--active"
                                                                    width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                                        </use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                                        </use>
                                                                    </g>
                                                                </svg> <svg class="rating__star" width="13px"
                                                                    height="12px">
                                                                    <g class="rating__fill">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                                        </use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                                        </use>
                                                                    </g>
                                                                </svg> <svg class="rating__star" width="13px"
                                                                    height="12px">
                                                                    <g class="rating__fill">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                                        </use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                                        </use>
                                                                    </g>
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__description">
                                                    <?php echo $product->sort_description; ?>
                                                </div>
                                                <div class="product-card__prices-list">
                                                    <div class="product-card__price">
                                                        {{ number_format($product->price) }}<span
                                                            class="woocommerce-Price-currencySymbol"> ₫</span></div>
                                                </div>
                                                <div class="product-card__buttons">
                                                    <div class="product-card__buttons-list">
                                                        <a class="btn btn-primary product-card__addtocart" type="button"
                                                            onclick="addCart({{ $product->id }})"
                                                            href="javascript:">Thêm vào giỏ hàng
                                                        </a>
                                                        <button
                                                            class="btn btn-light btn-svg-icon product-card__wishlist"
                                                            type="button"><svg width="16px" height="16px">
                                                                <use
                                                                    xlink:href="{{ url('/') }}/images/sprite.svg#wishlist-16">
                                                                </use>
                                                            </svg></button> <button
                                                            class="btn btn-light btn-svg-icon product-card__compare"
                                                            type="button"><svg width="16px" height="16px">
                                                                <use
                                                                    xlink:href="{{ url('/') }}/images/sprite.svg#compare-16">
                                                                </use>
                                                            </svg></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div>Không tìm thấy sản phẩm nào khớp với lựa chọn của bạn.</div>
                                    @endif
                                </div>
                                <div class="products-view__pagination">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            {{ $products->appends(request()->query()) }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- page__body / end -->
    </div><!-- page / end -->
</div><!-- site__body / end -->

@endsection