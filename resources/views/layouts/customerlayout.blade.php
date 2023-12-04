<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A D O R E P A L</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('../customer/assets/img/fav.png') }}" type="image/x-icon">
        {{-- <link rel="shortcut icon" type="image/x-icon" href="../customer/assets/img/fav.png"> --}}

        <!-- Animate CSS -->
        <link href="{{ asset('../customer/assets/css/animate.min.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="../customer/assets/css/animate.min.css"> --}}
        <!-- Slider Range CSS -->
        <link href="{{ asset('../customer/assets/plugins/range-slider/slider-range.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="../customer/assets/plugins/range-slider/slider-range.css" /> --}}

        <!-- Main CSS -->
        <link href="{{ asset('../customer/assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('../customer/assets/css/mystyle.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="../customer/assets/css/style.css"> --}}

        <script src="https://kit.fontawesome.com/20b6f01eda.js" crossorigin="anonymous"></script>



        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

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
                                <a href="/my_wishlist/{{ Session::get('email') }}" class="d-flex align-items-center">
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
                                                <li class="loginitem"><a href="/profile/{{ Session::get('email') }}">Profile</a></li>
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
                        <form action="/search" method="get">
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
                                                <a href="view-product.html"><img src="{{ asset('../../products/' . $cart->product->pic1 . '.png') }}" alt=""></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="view-product.html">{{$cart->product->name}}</a></h4>
                                                <h4><span>{{$cart->product_qty}} × </span>Rs. {{$cart->product_price}}</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="/remove_cart/{{$cart->id}}"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>

                                        @endforeach


                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            @php
                                                $sessionId = Session::getId();
                                                $total = $cart->where('session_id', $sessionId)->sum(DB::raw('product_price * product_qty'));
                                            @endphp
                                            <input type="text" name="" id="total-value" value="{{$total}}" hidden>
                                            <h4>Total<span class="total_bill_show">Rs. </span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <div style="text-align: center; margin:auto"><a href="/cart" class="outline ">View cart</a></div>
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
                            <ul>
                                <li>
                                    <a class="active" href="/">Home</a>
                                </li>
                                <li>
                                    <a class="active" href="/shop">Shop</a>
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
                                {{--  <li>
                                    <a class="active" href="blog-grid.html">Blog</a>
                                </li>  --}}
                                <li>
                                    <a class="active" href="/aboutus">About Us</a>
                                </li>
                                <li>
                                    <a class="active" href="/contactus">Contact Us</a>
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
                            <a href="/my_wishlist/{{ Session::get('email') }}">
                                <img src="../customer/assets/img/icons/icon-heart.svg" alt="">
                                <span class="pro-count white" id="mobile-wishlist"></span>
                            </a>
                        </div>
                        <div class="header-inner-icon">
                            <a class="small-cart-icon" href="/cart">
                                <img src="../customer/assets/img/icons/icon-cart.svg" alt="">
                                <span class="pro-count white" id="mobile-cart"></span>
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
                        {{--  <li class="mobile-menu-item">
                            <a href="blog-grid.html">Blog</a>
                        </li>  --}}
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

        @yield("customercontent")

        <!-- Footer -->
        <footer class="footer">
            <section class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="footer-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <div class="logo mb-30">
                                    <a href="/" class="mb-15"><img src="../customer/assets/img/logo3.png" alt="logo" /></a>
                                    <p>Integer posuere orci sit amet feugiat pellent que. Suspendisse vel tempor justo, sit amet posuere orci dapibus auctor.Integer posuere orci sit amet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="footer-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="footer-title">Contact Info</h4>
                        <ul class="contact-info">
                            <li><p><i class="fas fa-phone-alt"></i> +92-322-4963358</p></li>
                            <li><p><i class="fas fa-envelope"></i> <a href="mailto: info@adorepal.com">info@adorepal.com</a></p></li>
                            <li><p><i class="fas fa-map-marker-alt"></i> Lahore</p></li>
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
                            {{--  <li><a href="">Blog</a></li>  --}}
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
                                <li><a style="color: white;" href="/terms-condition">Terms of Service</a></li>
                                <li><a style="color: white;" href="/privacy-policy">Privacy Policy</a></li>

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

        <!-- Quick view -->

        <!-- /Quick view -->


        <!-- Quick view -->
        <div class="modal fade custom-modal" id="quickViewModal2" tabindex="-1" aria-labelledby="quickViewModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close quick-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="feather-x-circle"></i>
                    </button>
                    <div class="modal-body">


                            <div class="col-md-8 col-sm-8 col-xs-8" style="margin: auto">
                                <div class="detail-info" style="margin: auto; text-align:center">
                                        <div>
                                            <h3 class="title-detail">Sign Up</h3>
                                        </div>
                                        <form action="register_submit" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" placeholder="First Name" name="f_name" value="{{old('f_name')}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" placeholder="Last Name" name="l_name" value="{{old('l_name')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" placeholder="Enter Email" name="email" value="{{old('email')}}">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input required="" type="password" placeholder="Password" name="pass" value="{{old('pass')}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input required="" type="password" placeholder="Confirm password" name="c_pass" value="{{old('c_pass')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter  Address" name="address" value="{{old('address')}}">
                                            </div>
                                            <div class="form-group">
                                                <select id="country" name="country" class="form-control">
                                                    <option value="" selected disabled>--Select--</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Åland Islands">Åland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Territories">French Southern Territories</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russian Federation">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Helena">Saint Helena</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor-leste">Timor-leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet Nam">Viet Nam</option>
                                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" placeholder="Enter City" name="city" value="{{old('city')}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" placeholder="Enter Postcde" name="postcode" value="{{old('postcode')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter Phone" name="phone" value="{{old('phone')}}">
                                            </div>

                                            <div class="chek-form">
                                                 <div class="custome-checkbox">
                                                     <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                     <label class="form-check-label" for="exampleCheckbox12"><span>By continuing, you agree to litzagency <a href="terms-conditions.html">Terms of Use</a> and <a href="privacy-policy.html">Privacy Policy.</a></span></label>
                                                 </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-brand">Create Account</button>
                                            </div>
                                            <span>If you have already Account ?</span>
                                            <a class="exist-user" data-bs-toggle="modal" data-bs-target="#quickViewModal">Login</a>
                                       </form>

                                    </div>


                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <!-- /Quick view -->




            <!-- jQuery -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/jquery-3.6.0.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/myscript.js')}}"></script>

            <script>
                let t = $("#total-value").val();

                $(".total_bill_show").append(t);
                $(".check_data1").text(t);


            </script>
            {{-- <script src="../customer/assets/js/jquery-3.6.0.min.js"></script> --}}

            <!-- Bootstrap Core JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/bootstrap.bundle.min.js')}}"></script>

            {{-- <script src="../customer/assets/js/bootstrap.bundle.min.js"></script> --}}

            <!-- Slick JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/plugins/slick/slick.js')}}"></script>

            {{-- <script src="../customer/assets/plugins/slick/slick.js"></script> --}}

            <!-- Wow JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/wow.js')}}"></script>

            {{-- <script src="../customer/assets/js/wow.js"></script> --}}

            <!-- Select2 JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/plugins/select2/select2.min.js')}}"></script>

            {{-- <script src="../customer/assets/plugins/select2/select2.min.js"></script> --}}

            <!-- Scrollup JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/scrollup.js')}}"></script>

            {{-- <script src="../customer/assets/js/scrollup.js"></script> --}}

            <!-- Sidebar JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/plugins/theia-sticky-sidebar/jquery.theia.sticky.js')}}"></script>

            {{-- <script src="../customer/assets/plugins/theia-sticky-sidebar/jquery.theia.sticky.js"></script> --}}

            <!-- Elevatezoom JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/jquery.elevatezoom.js')}}"></script>

            {{-- <script src="../customer/assets/js/jquery.elevatezoom.js"></script> --}}

            <!-- Scrollbar JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/plugins/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

            {{-- <script src="../customer/assets/plugins/perfect-scrollbar/perfect-scrollbar.js"></script> --}}

            <!-- Waypoints JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/waypoints.js')}}"></script>

            {{-- <script src="../customer/assets/js/waypoints.js"></script> --}}

            <!-- Shop JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/shop.js')}}"></script>

            {{-- <script src="../customer/assets/js/shop.js"></script> --}}

            <!-- Custom JS -->
            <script type="text/javascript" src="{{URL::asset('../customer/assets/js/script.js')}}"></script>

            {{-- <script src="../customer/assets/js/script.js"></script> --}}

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
    @include('sweetalert::alert')
</html>
