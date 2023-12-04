@extends("layouts.customerlayout")
@section("customercontent")
        <!-- Main -->
        <main class="main">
            <section class="banner-section position-relative">
                <div class="container">
                    <div class="banner-slider">
                        <div class="banner-slider-one pagination-square align-pagination-square">
                            @foreach ($slides as $slides)
                            <div class="banner-slider-single banner-animation-col">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="banner-content">
                                            <h1 class="banner-title mb-40">
                                                {{ $slides->title1 }} <span>{{ $slides->title2 }}</span>
                                            </h1>
                                            <p style="color: #6B7280;">{{ $slides->caption }}</p>

                                            <a onclick="view_product({{$slides->prod_id}})" class="shop-now">Shop Now</a>
                                            <span class="border-line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="single-banner-slider" style="background-image: url({{ asset('../../slides/' . $slides->image.'.png') }})"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </section>
            <!--End hero slider-->

            <!-- Feature -->
            <section class="featured section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 d-flex">
                            <div class="banner-box d-flex flex-fill align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <div class="banner-icon">
                                    <i class="feather-headphones"></i>
                                </div>
                                <div class="banner-text">
                                    <h3>Customer care support</h3>
                                    <p>Get Help When You Need</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 d-flex">
                            <div class="banner-box d-flex align-items-center flex-fill wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <div class="banner-icon">
                                    <i class="feather-shield"></i>
                                </div>
                                <div class="banner-text">
                                    <h3>Secure Payment</h3>
                                    <p>Safe & Fast</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 d-flex">
                            <div class="banner-box d-flex align-items-center flex-fill wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <div class="banner-icon">
                                    <i class="feather-truck"></i>
                                </div>
                                <div class="banner-text">
                                    <h3>Free Shipping</h3>
                                    <p>On all orders</p>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </section>
            <!-- Feature -->

            <!-- Top Products -->
            <section class="product-tab-section product-section">
                <div class="container">
                    <div class="section-title wow animate__animated animate__fadeIn">
                        <h3>TOP PRODUCTS</h3>
                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="product-tab-content">

                        <!-- Product Tab-->
                        <div class="tab-pane fade show active" id="tshirt" role="tabpanel">
							<div class="row product-grid">

                                @foreach ($top as $prod)
                                 <!-- Product box -->


                                 <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-card mb-30">
                                        <div class="product-img-col">
                                            <div onclick="view_product({{$prod->id}})" class="product-img product-img-zoom">
                                                <a href="view-product.html">
                                                    <img src="{{ asset('../../products/' . $prod->pic1 . '.png') }}"alt="">
                                                </a>
                                            </div>
                                            <div class="product-inner-details">
                                                @if (!session()->has('name') || !session()->has('email') || !session()->has('customer_id'))
                                                    <a aria-label="Add To Wishlist" class="product-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fa-regular fa-heart"></i></a>
                                                @else
                                                @php
                                                $wishlistIds = $wishlist->pluck('product_id')->toArray();
                                                $wishlistId = $prod->id . '_wishlist'; // Add a unique identifier
                                                @endphp

                                                    @if(in_array($prod->id, $wishlistIds))
                                                        <a aria-label="Remove From Wishlist" class="product-btn add-to-wishlist" id="add-to-wishlist" data-id="{{ $prod->id }}" data-session="{{  Session::get('customer_id') }}"><i class="fa-solid fa-heart"></i></a>
                                                    @else
                                                        <a aria-label="Add To Wishlist" class="product-btn add-to-wishlist" id="add-to-wishlist" data-id="{{ $prod->id }}" data-session="{{  Session::get('customer_id') }}"><i class="fa-regular fa-heart"></i></a>
                                                    @endif

                                                @endif
                                                 <a aria-label="Add to Cart" class="product-btn" href="view_product/{{$prod->id}}"><i class="fi-rs-shopping-cart"></i></a>
                                            </div>
                                            <div class="product-badge">
                                                @if ($prod->sale_active == 1)
                                                    <span class="best">Sale</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h2><a href="view_product/{{$prod->id}}">{{ $prod->name }}</a></h2>
                                            <div class="product-card-bottom mt-0">
                                                <div class="product-price">
                                                    @if ($prod->sale_active == 1)
                                                        <span>Rs. {{ $prod->sale_price }}</span>
                                                        <span class="old-price">Rs. {{ $prod->price }}</span>
                                                        <span
                                                            class="discount-tag">{{ number_format(100 - ($prod->sale_price / $prod->price) * 100, 0) }}%</span>
                                                    @elseif ($prod->sale_active == 0)
                                                        <span>Rs. {{ $prod->price }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="rating d-inline-block text-over">
                                                    @php
                                                        $details = '';
                                                        foreach (explode('*', $prod->details) as $detail) {
                                                        $details .= $detail." ";
                                                        }
                                                    @endphp
                                                    <p class="text-dark" style="width:inherit; white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">{{ $details }}</p>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /Product box -->
                                @endforeach
                            </div>
                        </div>
                        <!-- /Product Tab -->
                    </div>
                    <!-- /Product Tab -->

                </div>
            </section>
            <!-- /Top Products -->

            <!-- Category -->
			<section class="section-category">
                <div class="container">
                    <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                        <h3 class="">POPULAR CATEGORIES</h3>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
							<div class="category-slider arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-two carousel-category-arrow" id="carousel-category-arrows"></div>
                                <div class="carousel-category carousel-arrow-center" id="carousel-category">


                                    <!-- Category Grid -->
                                    @foreach ($cat as $cat2)

                                    <div class="category-grid wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                        <div class="category-img-col">
                                            <div class="category-img category-img-zoom">
                                                <a href="/view_product_category/{{$cat2->id}}">
                                                    <img class="default-img" src="{{ asset('../../category/'.$cat2->pic ) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="category-content">
                                            <h4><a href="/view_product_category/{{$cat2->id}}">{{$cat2->name}}</a></h4>
                                        </div>
                                    </div>
                                    @endforeach

                                    <!-- /Category Grid -->
                                </div>
                            </div>
						</div>
                    </div>
                </div>
            </section>
            <!-- /Category -->

            <!-- Sales-->
			<section class="sales-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
							<div class="section-title animated animated">
								<h3>ON-SALE PRODUCT</h3>
							</div>

                            <div class="product-main-grid animated animated">
								<div class="sales-slider arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-two carousel-sale-arrow" id="carousel-sale-arrows"></div>
                                    <div class="carousel-sale carousel-arrow-center" id="carousel-sale">

                                    @foreach ($sale as $data)
                                    {{-- @if($data->sale_active == 1) --}}
                                    <div class="sale-card">
    									<article class="align-items-center">
    										<div class="row">
    											<figure class="col-md-4 mb-0">
    												<a href="view_product/{{$data->id}}"><img  src="{{ asset('../../products/' . $data->pic1 . '.png') }}" alt=""></a>
    											</figure>
    											<div class="col-md-8 mb-0">
    												<h6>
    													<a href="view_product/{{$data->id}}">{{$data->name}}</a>
    												</h6>
    												<div class="product-price">
    													<span>Rs. {{$data->sale_price}}</span>
    													<span class="old-price">Rs. {{$data->price}}</span>
    													<span class="discount-tag">{{ number_format(100 - ($prod->sale_price / $prod->price) * 100, 0) }}%</span>
    												</div>

    											</div>
    										</div>
    										<div class="product-tag">{{$data->sub_category}}</div>
    									</article>

    								</div>
                                    {{-- @endif --}}
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Sales -->



        </main>
        <!-- /Main -->

{{--  modal start  --}}
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModal" aria-hidden="false">
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
                                    <input class="form-control pb-5" type="text" name="email" id="" placeholder="Enter Email">
                                </div>
                                <div class="my-3 col-md-6" style="margin: auto; text-align:center">
                                    <input class="form-control pb-5" type="password" name="password" id="" placeholder="Enter Password">
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart me-3">Login</button>
                                </div>
                                </form>
                                <div class="pro-share" style="text-align: center; margin:auto">
                                    <ul>
                                        <li class="me-2"><span>Don't have account ? </span></li>
                                        <li>
                                            <a data-bs-toggle="modal" data-bs-target="#quickViewModal2">Sign-Up</a>
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
{{--  MOdal end  --}}



        <script>
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
@endsection
