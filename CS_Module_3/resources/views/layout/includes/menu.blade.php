<!-- site__header -->
<header class="site__header">
    <div class="header">
        <div class="header__body">
            <div class="search">
                <form class="search__form" action="{{ route('shop.search') }}" method="POST">
                    @csrf
                    <input class="search__input" type="search" placeholder="Search Query..." name="search">
                    <button class="search__button" type="submit">
                        <svg width="20px" height="20px">
                            <use xlink:href="{{ url('/') }}/images/sprite.svg#search-20"></use>
                        </svg>
                    </button>
                    <button class="search__button search-trigger" type="button">
                        <svg width="20px" height="20px">
                            <use xlink:href="{{ url('/') }}/images/sprite.svg#cross-20"></use>
                        </svg>
                    </button>
                </form>
            </div>
            <a class="header__logo">
                <img src="{{ url('/') }}/images/logo.png" alt="" width="85px">
            </a>
            <nav class="header__nav main-nav">
                <ul class="main-nav__list">
                    <li class="main-nav__item"><a class="main-nav__link" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="main-nav__item"><a class="main-nav__link" href="{{ route('shop.list') }}">Danh mục<svg
                                class="main-nav__link-arrow" width="9px" height="6px">
                                <use xlink:href="{{ url('/') }}/images/sprite.svg#arrow-down-9x6"></use>
                            </svg></a>
                        <div class="main-nav__sub-megamenu">
                            <!-- megamenu -->
                            <div class="megamenu">
                                <div class="row">
                                    @foreach($catParents_menu as $catParent)
                                    <div class="col-6">
                                        <ul class="megamenu__links megamenu__links--root">
                                            <li><span>{{ $catParent->name }}</span>
                                                <ul class="megamenu__links megamenu__links--sub">
                                                    @foreach($catParent->categories as $categories)
                                                    <li><a
                                                            href="{{ route('shoplist.categories', $categories->slug) }}">{{$categories->name}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            </div><!-- megamenu / end -->
                        </div>
                    </li>

                    <li class="main-nav__item main-nav__item--with--menu"><a class="main-nav__link"
                            href="blog.html">Blog <svg class="main-nav__link-arrow" width="9px" height="6px">
                                <use xlink:href="{{ url('/') }}/images/sprite.svg#arrow-down-9x6"></use>
                            </svg></a>
                        <div class="main-nav__sub-menu">
                            <ul class="menu">
                                <li class="menu__item"><a class="menu__link" href="blog-list.html">Blog
                                        List</a></li>
                                <li class="menu__item"><a class="menu__link" href="post.html">Post</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>
            <div class="header__spring"></div>
            <div class="header__indicator"><button type="button"
                    class="header__indicator-button indicator search-trigger"><span class="indicator__area"><svg
                            class="indicator__icon" width="20px" height="20px">
                            <use xlink:href="{{ url('/') }}/images/sprite.svg#search-20"></use>
                        </svg></span></button></div>
            <div class="header__indicator" data-dropdown-trigger="click">
                <a href="cart.html" class="header__indicator-button indicator">
                    <span class="indicator__area">
                        <span class="indicator__value">

                            @if(Session('cart') != null)
                                {{Session('cart')->totalQuantity}}
                                @else
                                {{0}}
                            @endif

                        </span>
                        <svg class="indicator__icon" width="20px" height="20px">
                            <use xlink:href="{{ url('/') }}/images/sprite.svg#cart-20"></use>
                        </svg>
                    </span>
                </a>
                <div class="header__indicator-dropdown">
                    <div class="dropcart" id="cart">
                        <div class="dropcart__products-list">
                        </div>
                        <div class="dropcart__totals">
                        </div>
                        <div class="dropcart__buttons">
                            <a class="btn btn-secondary" href="{{ route('shop.viewcart') }}">View Cart</a>
                            <a class="btn btn-primary" href="{{ route('shop.checkout') }}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- site__header / end -->