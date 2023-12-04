<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A D O R E P A L</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../customer/assets/img/fav.png">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="../customer/assets/css/animate.min.css">

    <!-- Slider Range CSS -->
    <link rel="stylesheet" href="../customer/assets/plugins/range-slider/slider-range.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="../customer/assets/css/style.css">
    <link rel="stylesheet" href="../customer/assets/css/mystyle.css">

    <script src="https://kit.fontawesome.com/20b6f01eda.js" crossorigin="anonymous"></script>

</head>

<body>



    <!-- Header -->
    <header class="header">
        <div class="mobile-view">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-2 col-lg-4"> </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="header-details">
                            <div class="header-inner">
                                <div class="header-inner-icon">
                                    <a href="/my_wishlist/{{ Session::get('email') }}"
                                        class="d-flex align-items-center">
                                        <span><img src="../customer/assets/img/icons/icon-wishlist.svg" alt=""></span>
                                        @if(!Session::has("email"))
                                        <span class="lable mt-0">wishlist (0)</span>
                                        @else
                                        <span class="lable mt-0" id="get-wishlist">{{$wishlist->count()}}</span>
                                        @endif
                                    </a>
                                </div>

                                <div class="header-inner-icon">
                                    @if (Session::has('name') && Session::has('email'))
                                    @else
                                    <a href="/userregister" class="d-flex align-items-center">
                                        <span><img src="../customer/assets/img/icons/icon-profile.svg" alt=""></span>
                                        <span class="lable mt-0">Register</span>
                                    </a>
                                    @endif
                                </div>
                                <div class="header-inner-icon">
                                    @if (Session::has('name') && Session::has('email'))
                                    <a class="d-flex align-items-center">
                                        <span><img src="../customer/assets/img/icons/icon-profile.svg" alt=""></span>
                                        <span class="lable mt-0" id="loginbutton">{{Session::get("name")}}</span>
                                        <div class="loginbox shadow">
                                            <ul class="loginmenu">
                                                <li class="loginitem"><a
                                                        href="/profile/{{ Session::get('email') }}">Profile</a></li>
                                                <hr>
                                                <li class="loginitem"><a href="/logout">Logout</a></li>
                                            </ul>
                                        </div>
                                    </a>
                                    @else
                                    <a href="/userlogin" class="d-flex align-items-center">
                                        <span><img src="../customer/assets/img/icons/icon-profile.svg" alt=""></span>
                                        <span class="lable mt-0" id="loginbutton">Login</span>
                                    </a>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle d-none d-lg-block">
            <div class="container">
                <div class="header-col">
                    <div class="logo header-logo">
                        <a href="/"><img src="../customer/assets/img/logo3.png" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="header-search">
                            <form action="/search" method="post">
                                @csrf
                                <input name="prod_name" type="text" placeholder="Search for items...">
                                <input type="submit" name="form-submit" class="submit-btn">
                            </form>
                        </div>
                        <div class="header-details">
                            <div class="header-inner">
                                <div class="header-inner-icon">

                                    <a href="/cart" class="me-3">

                                        <span class="lable d-block mt-0">My Cart</span>

                                        <span class="cart-amout d-block text-end total_bill_show">Rs. </span>
                                    </a>
                                    <a class="small-cart-icon" href="/cart">
                                        <img src="../customer/assets/img/icons/icon-cart.svg" alt="">
                                        <span class="pro-count blue" id="get-cart">{{$cart->count()}}</span>
                                    </a>
                                    <div class="cart-dropdown-wrap">
                                        <ul>

                                            @foreach ($cart as $cart)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="view-product.html"><img
                                                            src="{{ asset('../../products/' . $cart->product->pic1 . '.png') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="view-product.html">{{$cart->product->name}}</a></h4>
                                                    <h4><span>{{$cart->product_qty}} × </span>Rs.
                                                        {{$cart->product_price}}</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="/remove_cart/{{$cart->id}}"><i
                                                            class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>

                                            @endforeach


                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                @php
                                                $sessionId = Session::getId();
                                                $total = $cart->where('session_id',
                                                $sessionId)->sum(DB::raw('product_price * product_qty'));
                                                @endphp
                                                <input type="text" name="" id="total-value" value="{{$total}}" hidden>
                                                <h4>Total <span class="total_bill_show">Rs. </span></h4>
                                            </div>
                                            <div class="shopping-cart-btn">
                                                <div style="text-align: center; margin:auto">
                                                    <a href="/cart" class="outline">View cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-bar">
            <div class="container">
                <div class="header-col">
                    <div class="logo header-logo d-block d-lg-none">
                        <a href="/"><img src="../customer/assets/img/logo3.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="categories-col d-none d-lg-block">
                            <a class="categories-btn" href="#">
                                <span class="fi-rs-menu-burger"></span> Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-col categories-dropdown-list">
                                <div class="d-flex categories-dropdown-inner">
                                    <ul>
                                        @foreach ($cat as $data)
                                        <li>
                                            <a href="/view_product_category/{{$data->id}}">{{$data->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul class="main-nav">
                                    <li class="mobile-menu-item">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="mobile-menu-item">
                                        <a href="/shop">Shop</a>
                                    </li>
                                    <li class="position-static">
                                        <a href="#">Our Services <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            <li class="sub-mega-menu sub-mega-menu-two">
                                                <div class="menu-banner-wrap">
                                                    <div class="menu-banner-content">
                                                        <p>Earn Extra 5% Cashback</p>
                                                        <h4>Amazing Deals</h4>
                                                        <h3>Just For You</h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="/water.adorepal.com">Shop now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-one">

                                                <h5>Water Supplies</h5>
                                                <ul class="dropdown">
                                                    <li><a href="product-category-grid.html">1 lIter</a></li>
                                                    <li><a href="product-category-grid.html">2 lIter</a></li>
                                                    <li><a href="product-category-grid.html">3 lIter</a></li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </li>
                                    {{-- <li class="mobile-menu-item">
                                        <a href="blog-grid.html">Blog</a>
                                    </li> --}}
                                    <li class="mobile-menu-item">
                                        <a href="/aboutus">About Us</a>
                                    </li>
                                    <li class="mobile-menu-item">
                                        <a href="/contactus">Contact Us</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="contact-item d-none d-lg-flex">
                        <img src="../customer/assets/img/icons/icon-headphone-white.svg" alt="contact-number">
                        <p>CALL US NOW<span>+92-322-4963358</span></p>
                    </div>
                    <div class="header-inner-icon d-block d-lg-none">
                        <div class="bar-icon">
                            <span class="bar-icon-one"></span>
                            <span class="bar-icon-two"></span>
                            <span class="bar-icon-three"></span>
                        </div>
                    </div>
                    <div class="header-details d-block d-lg-none">
                        <div class="header-inner">
                            <div class="header-inner-icon">
                                <a href="wishlist.html">
                                    <img src="../customer/assets/img/icons/icon-heart.svg" alt="">
                                    <span class="pro-count white" id="mobile-wishlist"></span>
                                </a>
                            </div>
                            <div class="header-inner-icon">
                                <a class="small-cart-icon" href="#">
                                    <img src="../customer/assets/img/icons/icon-cart.svg" alt="">
                                    <span class="pro-count white" id="mobile-cart">2</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main-menu-wrapper">
        <div class="mobile-header-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="/"><img src="../customer/assets/img/logo3.png" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-col menu-close-position">
                    <button class="close-style">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content">
                <div class="mobile-search mobile-search-three mobile-header-border">
                    <form action="/search" method="post">
                        @csrf
                        <input name="prod_name" type="text" placeholder="Search for items...">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>

                </div>
                <div class="mobile-menu-col mobile-header-border">

                    <!-- Mobile Menu -->
                    <nav>
                        <ul class="main-nav">
                            <li class="mobile-menu-item">
                                <a href="/">Home</a>
                            </li>
                            <li class="mobile-menu-item">
                                <a href="/shop">Shop</a>
                            </li>
                            <li class="mobile-menu-item">
                                <a href="#">Our Services</a>
                                <ul class="dropdown">
                                    <li class="mobile-menu-item">
                                        <a href="#">Water Supplies</a>
                                        <ul class="dropdown">
                                            <li><a href="#">5 Liter</a></li>
                                            <li><a href="#">19 Liter</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            {{-- <li class="mobile-menu-item">
                                <a href="blog-grid.html">Blog</a>
                            </li> --}}
                            <li class="mobile-menu-item">
                                <a href="/aboutus">About Us</a>
                            </li>
                            <li class="mobile-menu-item">
                                <a href="/contactus">Contact Us</a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /Mobile Menu -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Header -->
    <!-- Main -->
    <main class="main">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="product-main-content">
                            <div class="">
                                <div class="products-found">
                                    @if (request()->is('shop'))
                                    {{ "" }}
                                    @elseif(request()->is('search'))
                                    @if($prod->count() == 0)
                                    <h5 hidden> <span id="p_count">{{ $prod->count() }}</span> Products Found</h5>
                                    @else
                                    <h5 hidden> <span id="p_count">{{ $prod->count() }}</span> Products Found</h5>
                                    @endif
                                    @elseif(request()->is('view_product_category'))
                                    @if($prod->count() == 0)
                                    {{ "" }}
                                    @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mb-30">
                <div class="row flex-row-reverse">
                    <div class="col-lg-4-5">
                        <div class="row product-grid">
                            <!-- Product Card -->
                            <div id="p_error" class="align-items-center" hidden>
                                <div class="mx-auto text-center h2">
                                    No products found!
                                </div>
                            </div>
                            @foreach ($prod as $data)
                            <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                                <div class="product-card mb-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".1s">
                                    <div class="product-img-col">
                                        <div onclick="viewprod({{ $data->id }})" class="product-img product-img-zoom">
                                            <a onclick="view_product({{$data->id}}">
                                                <img class="img-fluid"
                                                    src="{{ asset('../../products/' . $data->pic1 . '.png') }}"
                                                    alt="product image" />
                                            </a>
                                        </div>
                                        <div class="product-inner-details">
                                            @if (!session()->has('name') || !session()->has('email') ||
                                            !session()->has('customer_id'))
                                            <a aria-label="Add To Wishlist" class="product-btn" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="fa-regular fa-heart"></i></a>
                                            @else
                                            @php
                                            $wishlistIds = $wishlist->pluck('product_id')->toArray();
                                            @endphp
                                            @if(in_array($data->id, $wishlistIds))
                                            <a aria-label="Remove From Wishlist" class="product-btn add-to-wishlist"
                                                id="add-to-wishlist" data-id="{{ $data->id }}"
                                                data-session="{{  Session::get('customer_id') }}"><i
                                                    class="fa-solid fa-heart"></i></a>
                                            @else
                                            <a aria-label="Add To Wishlist" class="product-btn add-to-wishlist"
                                                id="add-to-wishlist" data-id="{{ $data->id }}"
                                                data-session="{{  Session::get('customer_id') }}"><i
                                                    class="fa-regular fa-heart"></i></a>
                                            @endif
                                            @endif
                                            <a aria-label="Add to Cart" class="product-btn"
                                                href="view_product/{{$data->id}}"><i
                                                    class="fi-rs-shopping-cart"></i></a>
                                        </div>
                                        @if ($data->sale_active == 1)
                                        <div class="product-badge">
                                            <span class="best">Sale</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-content">
                                        <h2><a href="view_product/{{ $data->id }}">{{ $data->name }}</a></h2>
                                        <div class="product-card-bottom mt-0">
                                            <div class="product-price">
                                                @if ($data->sale_active == 1)
                                                <span>Rs. {{ $data->sale_price }}</span>
                                                <span class="old-price">Rs. {{ $data->price }}</span>
                                                <span class="discount-tag">{{ number_format(100 - ($data->sale_price /
                                                    $data->price) * 100, 0) }}%</span>
                                                @elseif($data->sale_active == 0)
                                                <span>Rs. {{ $data->price }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- /Product Card -->
                        </div>

                        <!--product grid-->
                        {{-- Pagination start --}}

                        @if ($prod->lastPage() > 1)
                        <div class="pagination-area">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    @if ($prod->currentPage() != 1 && $prod->lastPage() >= 5)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $prod->url($prod->url(1)) }}"
                                            aria-label="Previous">
                                            <span aria-hidden="false"><i class="fi-rs-angle-left"></i></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if ($prod->currentPage() != 1)
                                    <li>
                                        <a class="page-link" href="{{ $prod->url($prod->currentPage() - 1) }}"
                                            aria-label="Previous">
                                            <span aria-hidden="false"><i class="fi-rs-angle-left"></i></span>
                                        </a>
                                    </li>
                                    @endif
                                    @for ($i = max($prod->currentPage() - 2, 1); $i <= min(max($prod->currentPage() - 2,
                                        1) + 4, $prod->lastPage()); $i++)
                                        @if ($prod->currentPage() == $i)
                                        <li class="page-item active">
                                            @else
                                        <li>
                                            @endif
                                            <a class="page-link" href="{{ $prod->url($i) }}">{{ $i }}</a>
                                        </li>
                                        @endfor
                                        @if ($prod->currentPage() != $prod->lastPage())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $prod->url($prod->currentPage() + 1) }}"
                                                aria-label="Next">
                                                <span aria-hidden="false"><i class="fi-rs-angle-right"></i></span>
                                            </a>
                                        </li>
                                        @endif
                                        @if ($prod->currentPage() != $prod->lastPage() && $prod->lastPage() >= 5)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $prod->url($prod->lastPage()) }}"
                                                aria-label="Next">
                                                <span aria-hidden="false"><i class="fi-rs-angle-right"></i></span>
                                            </a>
                                        </li>
                                        @endif
                                </ul>
                            </nav>
                        </div>
                        @endif
                        {{-- pagination end --}}
                        <!--End Deals-->
                    </div>
                    <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <h5 class="section-title style-1 mb-20">Filters</h5>
                            <div class="list-group">
                                <div class="list-group-item mb-10 accordion-collapse collapse">
                                    <label class="list-group-text collapsed">FILTER BY CATEGORY <i
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne"
                                            class="fi-rs-angle-down collapsed"></i></label>

                                    <div class="custome-checkbox" id="collapseOne">
                                        @foreach ($cat as $prod_cat)
                                        <input onchange="view_by_category({{$prod_cat->id}})" class="form-check-input"
                                            type="checkbox" name="" id="exampleCheckbox{{$prod_cat->id}}"
                                            value="cat{{$prod_cat->id}}" />
                                        <label class="form-check-label"
                                            for="exampleCheckbox{{$prod_cat->id}}"><span>{{$prod_cat->name}}</span></label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="list-group-item mb-10 accordion-collapse ">
                                    <label class="list-group-text">FILTER BY SubCategory <i data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseOne" class="fi-rs-angle-down"></i></label>
                                    <div class="custome-checkbox" id="collapseTwo">
                                        @foreach ($subcat as $prod_subcat)
                                        <input onchange="view_by_subcategory({{$prod_subcat->id}})"
                                            class="form-check-input" type="checkbox" name=""
                                            id="exampleCheckboxsub{{$prod_subcat->id}}"
                                            value="subcat{{$prod_subcat->id}}" />
                                        <label class="form-check-label"
                                            for="exampleCheckboxsub{{$prod_subcat->id}}"><span>{{$prod_subcat->name}}</span></label>
                                        @endforeach

                                    </div>
                                </div>

                            </div>

                            {{-- <a href="product-category-grid.html" class="btn fillter-btn">Fillter</a> --}}
                        </div>
                        <!-- Product sidebar Widget -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- /Main -->



    <!-- Footer -->
    <footer class="footer">
        <section class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                            data-wow-delay="0">
                            <div class="logo mb-30">
                                <a href="/" class="mb-15"><img src="../customer/assets/img/logo3.png" alt="logo" /></a>
                                <p>Integer posuere orci sit amet feugiat pellent que. Suspendisse vel tempor justo, sit
                                    amet posuere orci dapibus auctor.Integer posuere orci sit amet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="footer-title">Contact Info</h4>
                        <ul class="contact-info">
                            <li>
                                <p><i class="fas fa-phone-alt"></i> +92-322-4963358</p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i><a
                                        href="mailto: info@adorepal.com">info@adorepal.com</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i> Lahore</p>
                            </li>
                        </ul>
                        <ul class="footer-social-icon">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="footer-title">Usefull Links</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="/ourpolicy">Returns & Exchange</a></li>
                            <li><a href="/privacy-policy">Privacy Policy</a></li>
                            <li><a href="/terms-condition">Terms & Condition</a></li>

                        </ul>
                    </div>
                    <div class="footer-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="footer-title">Quick Links</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            {{-- <li><a href="blog-grid.html">Blog</a></li> --}}
                            <li><a href="/aboutus">About Us </a></li>
                            <li><a href="/contactus">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="footer-bottom wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-5">
                        <p class="font-sm mb-0">Copyright © 2023 ADOREPAL All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a style="color: white;" href="terms-conditions.html">Terms of Service</a></li>
                            <li><a style="color: white;" href="privacy-policy.html">Privacy Policy</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->



    <!-- Preloader -->
    <div id="loader-wrapper">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="../customer/assets/img/loading.gif" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- /Preloader -->

    {{-- modal start --}}
    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModal"
        aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close quick-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="feather-x-circle"></i>
                </button>
                <div class="modal-body">


                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin: auto">
                        <div class="detail-info" style="margin: auto; text-align:center">
                            <div class="mb-5">
                                <h3 class="title-detail">Login</h3>
                            </div>
                            <form action="/cart/cart_login" method="POST">
                                @csrf
                                <div class="my-3 col-md-6" style="margin: auto; text-align:center">
                                    <input class="form-control pb-5" type="text" name="email" id=""
                                        placeholder="Enter Email">
                                </div>
                                <div class="my-3 col-md-6" style="margin: auto; text-align:center">
                                    <input class="form-control pb-5" type="password" name="password" id=""
                                        placeholder="Enter Password">
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart me-3">Login</button>
                                </div>
                            </form>
                            <div class="pro-share" style="text-align: center; margin:auto">
                                <ul>
                                    <li class="me-2"><span>Don't have account ? </span></li>
                                    <li>
                                        <a href="/userregister">Sign-Up</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    {{-- MOdal end --}}




    <!-- My code -->
    <script>
        function viewprod(id)
            {
                window.location.href = "/view_product/"+id;
            }

            function view_by_category(id)
            {
                console.log(id);
                localStorage.setItem("product_id", id);
                window.location.href = "/view_product_category/"+id;
            }

            function view_by_subcategory(id)
            {
                console.log(id);
                localStorage.setItem("product_id", id);
                window.location.href = "/view_product_subcategory/"+id;
            }

    </script>
    <!-- My code -->


    <!-- jQuery -->
    <script src="../customer/assets/js/jquery-3.6.0.min.js"></script>

    <script>
        if(window.location.pathname!=="/shop")
            {
                let path = window.location.pathname;

                if(path.includes("/view_product_subcategory/"))
                {
                    let pro_id = localStorage.getItem("product_id");
                    let temp = $("input[value=subcat"+pro_id+"]").attr("checked",true)
                    console.log(temp);
                }
                else if(path.includes("/view_product_category/"))
                {
                    let pro_id = localStorage.getItem("product_id");
                    let temp = $("input[value=cat"+pro_id+"]").attr("checked",true)

                }
            }

            function view_product(id)
            {
                window.location.href = "/view_product/"+id;
            }
    </script>

    <script>
        $(document).ready(function(){
                $(".add-to-wishlist").click(function(){
                    var productId = $(this).data('id');
                var customerId = $(this).data('session');

                $.ajax({
                    url: "/add_wishlist",
                    type: 'GET',
                    data: {
                        product_id: productId,
                        customer_id: customerId
                    },
                    success: function(response) {
                        // Check if the response is OK
                        if (response === 'ok') {
                          // Refresh the page
                          location.reload();
                        }
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                        // Handle any errors here
                        console.error(errorThrown);
                      }
                });
                })
            })

    </script>

    <script>
        $(document).ready(function(){
                $(".product-btn").click(function(){
                    if($(this).children().hasClass("fa-solid"))
                    {
                        $(this).children().removeClass("fa-solid");
                        $(this).children().addClass("fa-regular");
                    }
                    else if($(this).children().hasClass("fa-regular"))
                    {
                        $(this).children().removeClass("fa-regular");
                        $(this).children().addClass("fa-solid");
                    }
                })

            });
    </script>

    <script>
        let t = $("#total-value").val();

            $(".total_bill_show").append(t);
            $(".check_data1").text(t);


    </script>

    <script>
        $(document).ready(function(){
                if($("#p_count").text() == "0")
                {
                    $("#p_error").removeAttr("hidden");
                }
            })
    </script>


    <!-- Bootstrap Core JS -->
    <script src="../customer/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../customer/assets/js/myscript.js"></script>

    <!-- Slick JS -->
    <script src="../customer/assets/plugins/slick/slick.js"></script>

    <!-- Wow JS -->
    <script src="../customer/assets/js/wow.js"></script>

    <!-- Select2 JS -->
    <script src="../customer/assets/plugins/select2/select2.min.js"></script>

    <!-- Scrollup JS -->
    <script src="../customer/assets/js/scrollup.js"></script>

    <!-- Sidebar JS -->
    <script src="../customer/assets/plugins/theia-sticky-sidebar/jquery.theia.sticky.js"></script>

    <!-- Elevatezoom JS -->
    <script src="../customer/assets/js/jquery.elevatezoom.js"></script>

    <!-- Scrollbar JS -->
    <script src="../customer/assets/plugins/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Waypoints JS -->
    <script src="../customer/assets/js/waypoints.js"></script>

    <!-- Slider Rrange  JS -->
    <script src="../customer/assets/plugins/range-slider/slider-range.js"></script>

    <!-- Shop JS -->
    <script src="../customer/assets/js/shop.js"></script>

    <!-- Custom JS -->
    <script src="../customer/assets/js/script.js"></script>
    <script>
        $(document).ready(function(){
                let cart_value = $("#get-cart").text();
                let wishlist_value = $("#get-wishlist").text();
                if(wishlist_value == 0)
                {
                    $("#mobile-wishlist").text(0);
                }
                else
                {
                    $("#mobile-wishlist").text(wishlist_value);
                }
                $("#mobile-cart").text(cart_value);
            })
    </script>

</body>

</html>
