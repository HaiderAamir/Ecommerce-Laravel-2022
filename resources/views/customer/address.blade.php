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
                                        <ul class="nav align-items-center">
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="active">
                                                    <i class="feather-shopping-cart"></i> <span>Shopping Cart</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="inactive">
                                                    <i class="feather-map"></i> <span>Address</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)">
                                                    <i class="feather-credit-card"></i> <span>Payment</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <form action="/cart/submit_address" method="POST">
                        @csrf
                        <input type="text" name="user_id" id="" value="{{Session::get('customer_id')}}" hidden>
                        <input type="text" name="user_name" id="" value="{{Session::get('name')}}" hidden>
                        <input type="text" name="user_email" id="" value="{{Session::get('email')}}" hidden>
                        <div class="col-lg-12">
                            <div class="table-responsive shopping-table">
                                <table class="table">
                                    <thead>
                                        <tr class="table-head">
                                            <th>Alias</th>
                                            <th>Address</th>
                                            <th>Billing Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="table-head">
                                            <td>Current Address</td>
                                            <td>
                                                <input class="input-1" id="in1" type="text" name="address" value="{{$user->address1}}" readonly>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="custom-radio-button">
                                                        <label class="radiobutton-col">
                                                            <input type="radio" class="input-1" checked="checked" name="example" id="ch1" value="">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-head">
                                            <td>Other Address</td>
                                            <td>
                                                <input type="text" id="in2" class="input-2" name="address">
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="custom-radio-button">
                                                        <label class="radiobutton-col">
                                                            <input class="input-2" type="radio" name="example" id="ch2" value="">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="shop-cart">
                           <div class="shop-cart-btn">
                                <button type="submit" class="btn continue-btn">Continue</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- /Main -->


        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


        <script>
            $(document).ready(function(){
                $("#in2").prop('disabled', true);
                $("#ch1").click(function(){
                    $("#in1").prop('disabled', false);
                    $("#in2").prop('disabled', true);
                });

                $("#ch2").click(function(){
                    $("#in1").prop('disabled', true);
                    $("#in2").prop('disabled', false);
                })
            })
        </script>
@endsection
