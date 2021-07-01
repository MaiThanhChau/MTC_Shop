@extends('layout.index')
@section('content')
<!-- site__body -->
<div class="site__body">
    <!-- page -->
    <div class="page">
        <!-- page__body -->
        <div class="page__body">
            <!-- block-slider -->
            <div class="block block-slider block-slider--featured">
                <div class="container">
                    <div class="slider slider--with-dots">
                        <div class="owl-carousel">
                            <a href="{{ route('shoplist.categories', 'tui-deo-cheo') }}">
                                <picture>
                                    <img src="{{ asset('storage/image/home-3.jpg') }}" alt=""
                                        style="width: 100%; height: 500px">
                                </picture>
                            </a>
                            <a href="{{ route('shoplist.categories', 'clutch') }}">
                                <picture>
                                    <img src="{{ asset('storage/image/home-2.jpg') }}" alt=""
                                        style="width: 100%; height: 500px">
                                </picture>
                            </a>
                            <a href="{{ route('shoplist.categories', 'tui-xach-nu') }}">
                                <picture>
                                    <img src="{{ asset('storage/image/home-1.jpg') }}" alt=""
                                        style="width: 100%; height: 500px">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- block-slider / end -->
            <!-- block-products-carousel -->
            <div class="block block-products-carousel">
                <div class="container">
                    <div class="block__title">
                        <h2 class="decor-header decor-header--align--center">Sản phẩm bán chạy</h2>
                    </div>
                    <div class="block-products-carousel__slider slider slider--with-arrows">
                        <div class="owl-carousel">
                            <!-- start loop -->
                            @foreach($products as $product)
                            <div class="product-card product-card--layout--grid">
                                <div class="product-card__actions">
                                    <div class="product-card__actions-list"><button
                                            class="btn btn-light btn-svg-icon btn-sm" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg></button> <button class="btn btn-light btn-svg-icon btn-sm"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                            </svg></button> <button class="btn btn-light btn-svg-icon btn-sm"
                                            type="button"><svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                            </svg></button></div>
                                </div>
                                <div class="product-card__image"><a href="{{ route('shop.product', $product->slug) }}"><img
                                            src="{{ asset('storage/'.$product->image) }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__category"><a href="">{{ $product->categories->name }}</a>
                                    </div>
                                    <div class="product-card__name"><a href="{{ route('shop.product', $product->slug) }}">{{ $product->name }}</a>
                                    </div>
                                    <div class="product-card__prices-list">
                                        <div class="product-card__price">{{ number_format($product->price) }}<span
                                                class="woocommerce-Price-currencySymbol"> ₫</span></div>
                                    </div>
                                    <div class="product-card__buttons">
                                        <div class="product-card__buttons-list">
                                            <a class="btn btn-primary product-card__addtocart" type="button" onclick="addCart({{ $product->id }})" href="javascript:">Thêm vào giỏ hàng
                                            </a>
                                            <button class="btn btn-light btn-svg-icon product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- end loop -->
                        </div>
                    </div>
                </div>
            </div><!-- block-products-carousel / end -->
            <!-- block-shop-categories -->
            <div class="block block-shop-categories">
                <div class="container">
                    <div class="block__title">
                        <h2 class="decor-header decor-header--align--center">Sản phẩm mới nhất</h2>
                    </div>
                    <div class="categories-list">
                    @foreach($latest_products as $latest_product)
                        <div class="card category-card">
                            <a href="{{ route('shop.product', $latest_product->slug) }}">
                                <div class="category-card__image"><img
                                        src="{{ asset('storage/'.$latest_product->image) }}" alt=""></div>
                                <div class="category-card__name">{{ $latest_product->name }}</div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div><!-- block-shop-categories / end -->
            <!-- block-posts-carousel -->
            <div class="block block-posts-carousel">
                <div class="container">
                    <div class="block__title">
                        <h2 class="decor-header decor-header--align--center">Latest Blog Posts</h2>
                    </div>
                    <div class="block-posts-carousel__slider slider slider--with-arrows">
                        <div class="owl-carousel">
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post1.jpg, images/posts/post1@2x.jpg 2x"
                                            src="images/posts/post1.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">November 30, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link" href="post.html">New
                                            Collection Of Office Furniture Anero Manero
                                            Will Go On Sale May 27</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post2.jpg, images/posts/post2@2x.jpg 2x"
                                            src="images/posts/post2.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">October 19, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link" href="post.html">Donec
                                            viverra, nulla a accumsan finibus commodo
                                            ligula</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post3.jpg, images/posts/post3@2x.jpg 2x"
                                            src="images/posts/post3.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">August 8, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link"
                                            href="post.html">Aliquam facilisis dapibus eros sit amet
                                            fermentum vestibulum congue</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post4.jpg, images/posts/post4@2x.jpg 2x"
                                            src="images/posts/post4.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">Jule 11, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link" href="post.html">Nullam
                                            at varius sapien sed sit amet
                                            condimentum elit</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post5.jpg, images/posts/post5@2x.jpg 2x"
                                            src="images/posts/post5.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">June 8, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link"
                                            href="post.html">Vestibulum leo sapien sollicitudin at magna eu
                                            interdum congue feugiat</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post6.jpg, images/posts/post6@2x.jpg 2x"
                                            src="images/posts/post6.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">May 27, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link"
                                            href="post.html">Maecenas consequat elementum orci sit amet
                                            dictum</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post7.jpg, images/posts/post7@2x.jpg 2x"
                                            src="images/posts/post7.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">April 23, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link" href="post.html">Nullam
                                            vehicula lorem nec augue semper ac
                                            vehicula enim tempus</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post8.jpg, images/posts/post8@2x.jpg 2x"
                                            src="images/posts/post8.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">March 12, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link" href="post.html">In hac
                                            habitasse platea dictumst praesent
                                            vehicula vitae pulvinar maximus</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post9.jpg, images/posts/post9@2x.jpg 2x"
                                            src="images/posts/post9.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">February 28, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link"
                                            href="post.html">Curabitur quam augue vestibulum in mauris
                                            fermentum pellentesque libero</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                            <div class="post-card post-card--layout--default">
                                <div class="post-card__image"><a href="post.html"><img
                                            srcset="images/posts/post10.jpg, images/posts/post10@2x.jpg 2x"
                                            src="images/posts/post10.jpg" alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__date">January 7, 2018</div>
                                    <div class="post-card__name"><a class="post-card__name-link"
                                            href="post.html">Suspendisse dignissim luctus metus vitae
                                            aliquam vestibulum sem odio</a></div>
                                    <div class="post-card__description">Lorem ipsum dolor sit amet,
                                        consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.</div><a href="post.html"
                                        class="btn btn-primary btn-xs post-card__read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- block-posts-carousel / end -->
        </div><!-- page__body / end -->
    </div><!-- page / end -->
</div><!-- site__body / end -->
@endsection