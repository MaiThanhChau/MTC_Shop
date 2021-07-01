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
                        <h1 class="page__header-title decor-header decor-header--align--center">Chi tiết sản phẩm</h1>
                    </div>
                </div>
            </div>
        </div><!-- page__header / end -->
        <!-- page__body -->
        <div class="page__body">
            <!-- block -->
            <div class="block">
                <div class="product container">
                    <div class="card product__info">
                        <div class="product__gallery">
                            <div class="product-gallery">
                                <div class="product-gallery__featured">
                                    <div class="owl-carousel" id="product-image">
                                        <a href="{{ asset('storage/'.$product->image) }}" data-width="1000"
                                            data-height="1000" target="_blank"><img
                                                src="{{ asset('storage/'.$product->image) }}" alt="">
                                        </a>
                                        @foreach($images as $image)
                                        <a href="" data-width="1000" data-height="1000" target="_blank"><img
                                                src="{{ asset('storage/'.$image->image) }}" alt="">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-gallery__carousel">
                                    <div class="owl-carousel" id="product-carousel">
                                        <a href="" class="product-gallery__carousel-item"><img
                                                class="product-gallery__carousel-image"
                                                src="{{ asset('storage/'.$product->image) }}" alt="">
                                        </a>
                                        @foreach($images as $image)
                                        <a href="" class="product-gallery__carousel-item"><img
                                                class="product-gallery__carousel-image"
                                                src="{{ asset('storage/'.$image->image) }}" alt="">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__details">
                            <div class="product__categories-sku">
                                <div class="product__categories"><span
                                        href="">{{ $product->categories->catParents->name }}</span>, <a
                                        href="{{ route('shoplist.categories', $product->categories->slug) }}">{{ $product->categories->name }}</a>
                                </div>
                            </div>
                            <div class="product__name">
                                <h2 class="decor-header">{{ $product->name }}</h2>
                            </div>
                            <div class="product__rating">
                                <div class="product__rating-stars">
                                    <div class="rating">
                                        <div class="rating__body"><svg class="rating__star rating__star--active"
                                                width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                    </use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                    </use>
                                                </g>
                                            </svg> <svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                    </use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                    </use>
                                                </g>
                                            </svg> <svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                    </use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                    </use>
                                                </g>
                                            </svg> <svg class="rating__star rating__star--active" width="13px"
                                                height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
                                                    </use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{ url('/') }}/images/sprite.svg#star-normal-stroke">
                                                    </use>
                                                </g>
                                            </svg> <svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{ url('/') }}/images/sprite.svg#star-normal">
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
                                <div class="product__rating-links"><a href="#">Reviews
                                        (5)</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;<a href="#">Write A
                                        Review</a></div>
                            </div>
                            <div class="product__description">
                                <?php echo $product->sort_description; ?>
                            </div>
                            <div class="product__price"><span
                                    class="product__price-new">{{ number_format($product->price) }}<span
                                        class="woocommerce-Price-currencySymbol"> ₫</span></span>
                            </div>
                            <form class="product__options">
                                <div class="form-group"><label class="product__option-label">Số lượng</label>
                                    <div class="product__actions">
                                        <div class="product__actions-item">
                                            <div class="form-control-number product__quantity"><input
                                                    class="form-control form-control-lg form-control-number__input"
                                                    type="number" min="1" value="1">
                                                <div class="form-control-number__add"></div>
                                                <div class="form-control-number__sub"></div>
                                            </div>
                                        </div>
                                        <div class="product__actions-item">
                                            <a class="btn btn-primary product-card__addtocart" type="button"
                                                onclick="addCartwQty({{ $product->id }},this)" href="javascript:">Thêm vào giỏ
                                                hàng
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="product__share-links share-links">
                                <ul class="share-links__list">
                                    <li class="share-links__item share-links__item--type--like"><a href="">Like</a></li>
                                    <li class="share-links__item share-links__item--type--tweet"><a href="">Tweet</a>
                                    </li>
                                    <li class="share-links__item share-links__item--type--pin"><a href="">Pin It</a>
                                    </li>
                                    <li class="share-links__item share-links__item--type--counter"><a href="">4K</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card product__tabs tabs tabs--product">
                        <div class="tabs__list"><a href="#tab-description" class="tabs__tab tabs__tab--active">Mô tả sản
                                phẩm</a><a href="#tab-reviews" class="tabs__tab">Reviews</a>
                        </div>
                        <div class="tabs__tab-content tabs__tab-content--active" id="tab-description">
                            <div class="product__tab-description">
                                <div class="typography">
                                    <?php echo $product->description; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tabs__tab-content" id="tab-reviews">
                            <div class="product__tab-reviews">
                                <div class="reviews-view">
                                    <div class="reviews-view__list">
                                        <h2 class="reviews-view__header decor-header">Customer Reviews</h2>
                                        <div class="reviews-list">
                                            <ol class="reviews-list__content">
                                                <li class="reviews-list__item">
                                                    <div class="review">
                                                        <div class="review__avatar"><img
                                                                srcset="{{ url('/') }}/images/avatars/avatar1.jpg, {{ url('/') }}/images/avatars/avatar1@2x.jpg 2x"
                                                                src="{{ url('/') }}/images/avatars/avatar1.jpg" alt="">
                                                        </div>
                                                        <div class="review__content">
                                                            <div class="review__author">Samantha Smith</div>
                                                            <div class="review__rating">
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
                                                                        </svg> <svg
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
                                                                        </svg> <svg
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
                                                                        </svg> <svg
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
                                                            <div class="review__text">Phasellus id mattis
                                                                nulla. Mauris velit nisi, imperdiet vitae
                                                                sodales in, maximus ut lectus. Vivamus
                                                                commodo scelerisque lacus, at porttitor dui
                                                                iaculis id. Curabitur imperdiet ultrices
                                                                fermentum.</div>
                                                            <div class="review__date">27 May, 2018</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="reviews-list__item">
                                                    <div class="review">
                                                        <div class="review__avatar"><img
                                                                srcset="{{ url('/') }}/images/avatars/avatar2.jpg, {{ url('/') }}/images/avatars/avatar2@2x.jpg 2x"
                                                                src="{{ url('/') }}/images/avatars/avatar2.jpg" alt="">
                                                        </div>
                                                        <div class="review__content">
                                                            <div class="review__author">Adam Taylor</div>
                                                            <div class="review__rating">
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
                                                                        </svg> <svg
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
                                                                        </svg> <svg
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
                                                            <div class="review__text">Aenean non lorem nisl.
                                                                Duis tempor sollicitudin orci, eget
                                                                tincidunt ex semper sit amet. Nullam neque
                                                                justo, sodales congue feugiat ac, facilisis
                                                                a augue. Donec tempor sapien et fringilla
                                                                facilisis. Nam maximus consectetur diam.
                                                                Nulla ut ex mollis, volutpat tellus vitae,
                                                                accumsan ligula.</div>
                                                            <div class="review__date">12 April, 2018</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="reviews-list__item">
                                                    <div class="review">
                                                        <div class="review__avatar"><img
                                                                srcset="{{ url('/') }}/images/avatars/avatar3.jpg, {{ url('/') }}/images/avatars/avatar3@2x.jpg 2x"
                                                                src="{{ url('/') }}/images/avatars/avatar3.jpg" alt="">
                                                        </div>
                                                        <div class="review__content">
                                                            <div class="review__author">Helena Garcia</div>
                                                            <div class="review__rating">
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
                                                                        </svg> <svg
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
                                                                        </svg> <svg
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
                                                                        </svg> <svg
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
                                                                        </svg> <svg
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
                                                                        </svg></div>
                                                                </div>
                                                            </div>
                                                            <div class="review__text">Duis ac lectus
                                                                scelerisque quam blandit egestas.
                                                                Pellentesque hendrerit eros laoreet suscipit
                                                                ultrices.</div>
                                                            <div class="review__date">2 January, 2018</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                            <div class="reviews-list__pagination">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-center">
                                                        <li class="page-item disabled"><a class="page-link" href="#"
                                                                aria-label="Previous" tabindex="-1"><span
                                                                    aria-hidden="true"><svg width="6px" height="9px">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#arrow-left-6x9">
                                                                        </use>
                                                                    </svg> </span><span
                                                                    class="sr-only">Previous</span></a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item active"><a class="page-link" href="#">2</a>
                                                        </li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#"
                                                                aria-label="Next"><span aria-hidden="true"><svg
                                                                        width="6px" height="9px">
                                                                        <use
                                                                            xlink:href="{{ url('/') }}/images/sprite.svg#arrow-right-6x9">
                                                                        </use>
                                                                    </svg> </span><span class="sr-only">Next</span></a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="reviews-view__form">
                                        <h2 class="reviews-view__header decor-header">Write A Review</h2>
                                        <div class="row">
                                            <div class="col-12 col-lg-9 col-xl-8">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4"><label for="review-stars">Review
                                                            Stars</label> <select id="review-stars"
                                                            class="form-control">
                                                            <option>5 Stars Rating</option>
                                                            <option>4 Stars Rating</option>
                                                            <option>3 Stars Rating</option>
                                                            <option>2 Stars Rating</option>
                                                            <option>1 Stars Rating</option>
                                                        </select></div>
                                                    <div class="form-group col-md-4"><label for="review-author">Your
                                                            Name</label> <input type="text" class="form-control"
                                                            id="review-author" placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group col-md-4"><label for="review-email">Email
                                                            Address</label> <input type="text" class="form-control"
                                                            id="review-email" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="review-text">Your
                                                        Review</label> <textarea class="form-control" id="review-text"
                                                        rows="6"></textarea></div>
                                                <div class="form-group"><button type="submit"
                                                        class="btn btn-primary btn-lg">Post Your
                                                        Review</button></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- block / end -->
            <!-- block-products-carousel -->
            <div class="block block-products-carousel">
                <div class="container">
                    <div class="block__title">
                        <h2 class="decor-header decor-header--align--center">Có thể bạn quan tâm</h2>
                    </div>
                    <div class="block-products-carousel__slider slider slider--with-arrows">
                        <div class="owl-carousel">
                            @if($related_products)
                            @foreach($related_products as $related_product)
                            <div class="product-card product-card--layout--grid">
                                <div class="product-card__image"><a
                                        href="{{ route('shop.product', $related_product->slug) }}"><img
                                            src="{{ asset('storage/'.$related_product->image) }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__category"><a
                                            href="">{{ $related_product->categories->name }}</a></div>
                                    <div class="product-card__name"><a
                                            href="product.html">{{ $related_product->name }}</a></div>
                                    <div class="product-card__rating">
                                        <div class="product-card__rating-title">Reviews (15)</div>
                                        <div class="product-card__rating-stars">
                                            <div class="rating">
                                                <div class="rating__body"><svg class="rating__star rating__star--active"
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
                                                    </svg> <svg class="rating__star rating__star--active" width="13px"
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
                                                    </svg> <svg class="rating__star rating__star--active" width="13px"
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
                                                    </svg> <svg class="rating__star" width="13px" height="12px">
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
                                                    </svg> <svg class="rating__star" width="13px" height="12px">
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
                                    <div class="product-card__prices-list">
                                        <div class="product-card__price">
                                            {{ number_format($related_product->price) }}<span
                                                class="woocommerce-Price-currencySymbol"> ₫</span></div>
                                    </div>
                                    <div class="product-card__buttons">
                                        <div class="product-card__buttons-list">
                                            <a class="btn btn-primary product-card__addtocart" type="button"
                                                onclick="addCart({{ $related_product->id }})" href="javascript:">Thêm vào giỏ
                                                hàng
                                            </a>
                                            <button class="btn btn-light btn-svg-icon product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="{{ url('/') }}/images/sprite.svg#wishlist-16">
                                                    </use>
                                                </svg></button> <button
                                                class="btn btn-light btn-svg-icon product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="{{ url('/') }}/images/sprite.svg#compare-16"></use>
                                                </svg></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- block-products-carousel / end -->
        </div><!-- page__body / end -->
    </div><!-- page / end -->
</div><!-- site__body / end -->
@endsection