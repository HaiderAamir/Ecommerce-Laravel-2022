@extends("layouts.customerlayout")
@section("customercontent")

<!-- Main -->
<main class="main">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-5 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <!-- MAIN SLIDES -->
                                    <div class="position-relative">
                                        <div class="product-image-slider">
                                            <figure class="border-radius-7">
                                                <img src="{{ asset('../../products/' . $data->pic1 . '.png') }}"
                                                    alt="product image" />
                                            </figure>
                                            <figure class="border-radius-7">
                                                <img src="{{ asset('../../products/' . $data->pic2 . '.png') }}"
                                                    alt="product image" />
                                            </figure>
                                            <figure class="border-radius-7">
                                                <img src="{{ asset('../../products/' . $data->pic3 . '.png') }}"
                                                    alt="product image" />
                                            </figure>
                                            <figure class="border-radius-7">
                                                <img src="{{ asset('../../products/' . $data->pic4 . '.png') }}"
                                                    alt="product image" />
                                            </figure>

                                        </div>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        <div><img src="{{ asset('../../products/' . $data->pic1 . '.png') }}"
                                                alt="product image" /></div>
                                        <div><img src="{{ asset('../../products/' . $data->pic2 . '.png') }}"
                                                alt="product image" /></div>
                                        <div><img src="{{ asset('../../products/' . $data->pic3 . '.png') }}"
                                                alt="product image" /></div>
                                        <div><img src="{{ asset('../../products/' . $data->pic4 . '.png') }}"
                                                alt="product image" /></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>

                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <form action="/add_to_cart" method="post">
                                    @csrf
                                    <div class="detail-info pr-30 pl-30">
                                        <input type="text" name="prod_name" id="" value="{{$data->name}}" hidden>
                                        <h4 class="title-detail">{{$data->name}}</h4>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                @if ($data->sale_active == 1)
                                                <input type="text" name="prod_price" id="" value="{{$data->sale_price}}"
                                                    hidden>
                                                <span class="current-price" name="prod_price">Rs.
                                                    {{$data->sale_price}}</span>
                                                <span class="old-price">Rs. {{$data->price}} </span>
                                                <span class="save-price">{{ number_format(100 - ($data->sale_price /
                                                    $data->price) * 100, 0) }}%</span>
                                                @elseif ($data->sale_active == 0)
                                                <input type="text" name="prod_price" id="" value="{{$data->price}}"
                                                    hidden>
                                                <span class="current-price" name="prod_price">Rs.
                                                    {{$data->price}}</span>
                                                @endif

                                            </div>
                                        </div>
                                        <ul class="pro-code">
                                            <input type="text" name="prod_id" id="" value="{{$data->id}}" hidden>
                                            <li>Product Code : <span class="text-black">{{$data->product_id}}</span>
                                            </li>
                                            <li>Categories : <span class="text-black">{{$data->category}}</span></li>
                                        </ul>

                                        <p class="in-stock text-brand">{{$data->qty}} in Stock</p>
                                        <div class="detail-extralink">
                                            <input type="number" name="prod_qty" id="new_value" value="1" hidden>

                                            <div class="detail-qty d-qty border radius">
                                                <a href="#" class=" q-down" id="minus_prod"><i
                                                        class="fi-rs-minus-small"></i></a>
                                                <span class="qty-val q-val" id="qty_prod">1</span>
                                                <a href="#" class=" q-up" id="plus_prod"><i
                                                        class="fi-rs-plus-small"></i></a>
                                            </div>
                                            <div class="size-select">
                                                <span id="sizes" hidden>{{$data->size}}</span>
                                                <select id="sizes_show" name="prod_size" class="form-select">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="product-extra-link2">
                                            
                                            

                                            @if (in_array($data->id, $cart->pluck('product_id')->toArray()))
                                            <button type="button" class="button button-add-to-cart me-3"><i
                                                    class="fi-rs-shopping-cart"></i>Already in cart</button>
                                            @else
                                            <button type="submit" class="button button-add-to-cart me-3"><i
                                                    class="fi-rs-shopping-cart"></i>Add to cart</button>

                                            @endif

                                            @if (!session()->has('name') || !session()->has('email') ||
                                                            !session()->has('customer_id'))
                                                            <a aria-label="Add To Wishlist" class="button btn-wishlist"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quickViewModal"><i
                                                                    class="fa-regular fa-heart"></i>Add to wishlist</a>
                                                            @else
                                                            @php
                                                            $wishlistIds = $wishlist->pluck('product_id')->toArray();
                                                            $wishlistId = $data->id . '_wishlist'; // Add a unique identifier
                                                            @endphp

                                                            @if(in_array($data->id, $wishlistIds))
                                                            <a aria-label="Remove From Wishlist"
                                                            class="button btn-wishlist" id="add-to-wishlist"
                                                                data-id="{{ $data->id }}"
                                                                data-session="{{  Session::get('customer_id') }}"><i
                                                                    class="fa-solid fa-heart"></i>Already in wishlist</a>
                                                            @else
                                                            <a aria-label="Add To Wishlist"
                                                            class="button btn-wishlist" id="add-to-wishlist"
                                                                data-id="{{ $data->id }}"
                                                                data-session="{{  Session::get('customer_id') }}"><i
                                                                    class="fa-regular fa-heart"></i>Add to wishlist</a>
                                                            @endif

                                                            @endif

                                            <!-- <a aria-label="Add To Wishlist" class="button btn-wishlist"
                                                id="add-to-wishlist" data-id="{{ $data->id }}"
                                                data-session="{{  Session::get('customer_id') }}"><i
                                                    class="fi-rs-heart"></i>Add to wishlist</a> -->
                                        </div>
                                        <div class="pro-share">
                                            <ul>
                                                <li class="me-2"><span>Share :</span></li>
                                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </form>
                            </div>

                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                            href="#Description">Description</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                            href="#Specification">Specification</a>
                                    </li> --}}
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <ul class="pro-desc">
                                                <p id="details" hidden>{{$data->details}}</p>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Products -->
                        <section class="feature-products">
                            <div class="container">
                                <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                                    <h3>Related PRODUCTS</h3>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="feature-product-slider arrow-center position-relative">
                                            <div class="slider-arrow slider-arrow-two carousel-4-columns-arrow"
                                                id="carousel-4-columns-arrows"></div>
                                            <div class="carousel-4-columns carousel-arrow-center"
                                                id="carousel-4-columns">
                                                @foreach ($rel_prod as $data)
                                                <div class="product-card wow animate__animated animate__fadeIn"
                                                    data-wow-delay=".1s">
                                                    <div class="product-img-col">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="">
                                                                <img class="default-img"
                                                                    src="{{ asset('../../products/' . $data->pic1 . '.png') }}"
                                                                    alt="" />
                                                                <img class="hover-img"
                                                                    src="{{ asset('../../products/' . $data->pic2 . '.png') }}"
                                                                    alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="product-inner-details">
                                                            @if (!session()->has('name') || !session()->has('email') ||
                                                            !session()->has('customer_id'))
                                                            <a aria-label="Add To Wishlist" class="product-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quickViewModal"><i
                                                                    class="fa-regular fa-heart"></i></a>
                                                            @else
                                                            @php
                                                            $wishlistIds = $wishlist->pluck('product_id')->toArray();
                                                            $wishlistId = $data->id . '_wishlist'; // Add a unique identifier
                                                            @endphp

                                                            @if(in_array($data->id, $wishlistIds))
                                                            <a aria-label="Remove From Wishlist"
                                                                class="product-btn add-to-wishlist" id="add-to-wishlist"
                                                                data-id="{{ $data->id }}"
                                                                data-session="{{  Session::get('customer_id') }}"><i
                                                                    class="fa-solid fa-heart"></i></a>
                                                            @else
                                                            <a aria-label="Add To Wishlist"
                                                                class="product-btn add-to-wishlist" id="add-to-wishlist"
                                                                data-id="{{ $data->id }}"
                                                                data-session="{{  Session::get('customer_id') }}"><i
                                                                    class="fa-regular fa-heart"></i></a>
                                                            @endif

                                                            @endif
                                                            <a aria-label="Add to Cart" class="product-btn"
                                                                href="/view_product/{{$data->id}}"><i
                                                                    class="fi-rs-shopping-cart"></i></a>
                                                        </div>
                                                        <div class="product-badge">
                                                            @if ($data->sale_active == 1)
                                                            <span class="best">Sale</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2><a href="/view_product/{{$data->id}}">{{$data->name}}</a></h2>
                                                        <div class="product-card-bottom mt-0">
                                                            <div class="product-price">
                                                                @if ($data->sale_active == 1)
                                                                <span>Rs. {{ $data->sale_price }}</span>
                                                                <span class="old-price">Rs. {{ $data->price }}</span>
                                                                <span class="discount-tag">{{ number_format(100 -
                                                                    ($data->sale_price / $data->price) * 100, 0)
                                                                    }}%</span>
                                                                @elseif ($data->sale_active == 0)
                                                                <span>Rs. {{ $data->price }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                @endforeach

                                                <!--End product Wrap-->


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- /Products -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- /Main -->
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

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
                let val = $("#sizes").html();
                let patter = /\w+/g;
                let size_ar = val.match(patter);
                for(let i=0; i<size_ar.length; i++)
                {
                    $("#sizes_show").append("<option id='size' >"+size_ar[i]+"</option>")
                }
            })

            $(document).ready(function(){
                let ar = $("#details").text();
                console.log(ar);
                let data = [];
                let temp="";
                for(let i=0; i<ar.length; i++)
                {
                    if(ar[i]=='*')
                    {
                        data.push(temp);
                        temp = "";
                    }
                    else
                    {
                        temp+=ar[i];
                    }
                }


                for(let i=0; i<data.length; i++)
                {
                    $(".pro-desc").append("<li>"+data[i]+"</li>")
                }
            })
            $(document).ready(function(){
                $("#plus_prod").click(function(){
                    let value = parseInt($("#qty_prod").text());
                    $("#new_value").val(value+1);

                })

                $("#minus_prod").click(function(){
                    let value = parseInt($("#qty_prod").text());
                    $("#new_value").val(value-1);
                })


            })


</script>

<script>
    document.getElementById("add-to-wishlist").addEventListener("click", function() {

                var productId = $(this).data('id');
                var customerId = $(this).data('session');

                $.ajax({
                    url: "/add_wishlist",
                    type: 'GET',
                    data: {
                        product_id: productId,
                        customer_id: customerId
                    },
                    success: function (response) {
                        if (response === 'ok') {
                          // Refresh the page
                          location.reload();
                        }
                    }
                });
            });
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
