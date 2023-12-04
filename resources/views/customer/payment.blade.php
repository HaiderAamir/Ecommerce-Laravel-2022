@extends("layouts.customerlayout")
@section("customercontent")

        <!-- Main -->
        <main class="main">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-20">
                                <div class="card-body">
                                    <div class="shop-cart-box">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="active">
                                                    <i class="feather-shopping-cart"></i> Shopping Cart
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="active">
                                                    <i class="feather-map"></i> Address
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="active">
                                                    <i class="feather-truck"></i> Delivery
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="inactive">
                                                    <i class="feather-credit-card"></i> Payment
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                           <div class="payment-card">
                                <div class="payment-inner">
                                    <div class="payment-info">
                                        <h5>Payment</h5>
                                        <p>Please choose your payment method</p>
                                    </div>
                                </div>
                           </div>
                           {{--  <div class="payment-card border-top-0 mt-0">
                                <div class="payment-inner mb-0">
                                    <div class="payment-info">
                                        <h5>VISA</h5>
                                        <p>The new standard in online payments</p>
                                    </div>
                                    <div class="payment-btn">
                                        <a href="#" class="btn pay-btn-two">Pay with CARD</a>
                                    </div>
                                </div>
                           </div>  --}}
                           <div class="payment-card border-top-0 mt-0">
                                <div class="payment-inner mb-0">
                                    <div class="payment-info">
                                        <h5>Cash On Delivery</h5>
                                    </div>
                                    <div class="payment-btn">
                                        <form id="payment_form" action="/cart/cashondelivery" method="POST">
                                            @csrf
                                            <input type="text" name="id" id=""  value="{{Session::getId()}}" hidden>
                                            <input type="text" name="name" id=""  value="{{Session::get("name")}}" hidden>
                                            <input type="text" name="email" id=""  value="{{Session::get("email")}}" hidden>
                                            <input type="text" name="customer_id" id=""  value="{{Session::get("customer_id")}}" hidden>
                                            <button type="button" onclick="confirmOrder()" class="btn pay-btn-three">Place Order</button>
                                        </form>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- /Main -->


        <!-- Quick view1 -->
        <div class="modal fade custom-modal modal-sm justify-content-center d-flex align-items-center" id="paymentModal" tabindex="-1" aria-labelledby="quickViewModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close quick-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="feather-x-circle"></i>
                    </button>
                    <div class="modal-body">


                            <div class="col-md-6 col-sm-6 col-xs-6" style="margin: auto">
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
                                                    <a href="/userregister">Sign-Up</a>
                                                    {{--  <a data-bs-toggle="modal" data-bs-target="#quickViewModal2">Sign-Up</a>  --}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                </div>
            </div>
        <!-- /Quick view -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>

        <script>
            function confirmOrder() {
                Swal.fire({
                    title: '<h5>Are you sure you want to proceed?</h5>',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('payment_form').submit();
                    }
                })
            }
        </script>






@endsection
