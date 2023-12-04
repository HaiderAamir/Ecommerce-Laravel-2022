@extends("layouts.customerlayout")
@section("customercontent")

        <!-- Main -->
        <main class="main pages">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 m-auto">
                            <div class="card mb-30">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                       <div class="col-lg-12">
                                            <div class="d-flex align-items-center">
                                                <div class="account-details">
                                                    <p>Hello,</p>
                                                    <h4>{{ $user->f_name }} {{ $user->l_name }}</h4>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="dashboard-menu">
                                        <ul class="nav flex-column" id="accordionExample">
                                            <li class="nav-item" id="dashboard-one">
                                                <a class="nav-link accordion-button collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fi-rs-user mr-10"></i>Account Information</a>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="dashboard-one" data-bs-parent="#accordionExample">
                                                    <ul class="dashboard-sub-link">
                                                        <li><a href="/profile/{{ $user->email }}" class="active">My Profile</a></li>
                                                        <li><a href="/manage_address/{{ $user->email }}">Manage address</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/my_orders/{{ $user->email }}"><i class="fi-rs-shopping-cart mr-10"></i>My Orders</a>
                                            </li>
                                            <li class="nav-item" id="dashboard-two">
                                                <a class="nav-link" href="/my_wishlist/{{ $user->email }}"><i class="fi-rs-heart mr-10"></i>My Wishlist</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/logout"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="account dashboard-content">
                                        <div class="card border-0 mb-25">
                                            <div class="card-header card-header-border d-flex align-items-center justify-content-between pt-0">
                                                <h3 class="card-title">My Wishlist</h3>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            @foreach ($wishlist as $item)
                                                <?php $product = App\Models\Product::find($item->product_id); ?>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="card mb-25">
                                                        <div class="card-body">
                                                            <div class="wishlist-img">
                                                                <a onclick="view_product({{$product->id}})">
                                                                    <img src="{{ asset('../../products/' . $product->pic1 . '.png') }}" alt="" class="img-fluid">
                                                                </a>
                                                                <a href="/delete_wishlist/{{  $product->id }}" class="wishlist-delete-btn">
                                                                    <i class="feather-trash-2"></i>
                                                                </a>
                                                            </div>
                                                            <div class="wishlist-content-wrap">
                                                                <h2><a onclick="view_product({{$product->id}})">{{ $product->name }}</a></h2>
                                                                <div class="wishlist-card-bottom mt-0">
                                                                    <div class="wishlist-price">
                                                                        @if($product->sale_active == 1)
                                                                            <span>Rs. {{ $product->sale_price }}</span>
                                                                            <span class="old-price">Rs. {{ $product->price }}</span>
                                                                            <span class="discount-tag">{{ number_format(100 - ($product->sale_price / $product->price) * 100, 0) }}%</span>
                                                                        @else
                                                                            <span>$ {{ $product->price }}</span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- /Main -->
        <script>
            function view_product(id)
            {
                window.location.href = "/view_product/"+id;
            }


        </script>
@endsection
