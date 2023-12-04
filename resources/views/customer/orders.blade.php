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
                                                <h3 class="card-title">My Orders</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach ($order as $order)
                                            <div class="col-lg-12">
                                                <div class="card mb-25">
                                                    <div class="card-header card-header-ordered d-flex align-items-center justify-content-between">
                                                        <h4 class="card-sub-title">Order on {{ $order->date }}</h4>
                                                        <p class="bg-ordered" style="width: 15%">
                                                            @if($order->status == 0)
                                                                <span> In progress</span>
                                                            @elseif($order->status == 1)
                                                                <span>Dispatched </span>
                                                            @elseif($order->status == 2)
                                                                <span> Completed </span>
                                                            @elseif($order->status == 3)
                                                                <span> Decliened </span>
                                                            @endif
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-details pt-0">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <h4 class="card-details-title">{{ "Invoice#" }} AP{{ $order->invoice_number }}</h4>
                                                                <h4 class="card-details-title">Rs. {{ $order->total_price }}</h4>
                                                            </div>
                                                            <div class="card-delivery">
                                                                <p><i class="feather-credit-card"></i>  Cash On Delivery </p>
                                                                <p><i class="feather-map-pin"></i> {{ $order->address }}</p>
                                                                <a href="/generate_pdf/{{ $order->invoice_number }}" class="btn">Download invoice</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            {{--  <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header card-header-ordered d-flex align-items-center justify-content-between">
                                                        <h4 class="card-sub-title">Order on 13 August, 2022</h4>
                                                        <p class="bg-ordered">ordered</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-details pt-0">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <h4 class="card-details-title">Office</h4>
                                                                <h4 class="card-details-title">$$5500.00</h4>
                                                            </div>
                                                            <div class="card-delivery">
                                                                <p><i class="feather-credit-card"></i> Cash On Delivery</p>
                                                                <p><i class="feather-map-pin"></i> 3556 Beech Street,California, CA 94108</p>
                                                                <a href="invoice.html" class="btn">Download invoice</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  --}}
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


@endsection
