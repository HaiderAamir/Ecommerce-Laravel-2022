@extends("layouts.customerlayout")
@section("customercontent")

        <!-- Main -->
        <main class="main">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                            <div class="login-wrap log-sec">
                                <h4 class="log-title">Confirm OTP</h4>
                                <form action="register_submit" method="POST">
                                    @csrf


                                    <input type="text" name="f_name" id="" value="{{$req->f_name}}" hidden>
                                    <input type="text" name="l_name" id="" value="{{$req->l_name}}" hidden>
                                    <input type="text" name="email" id="" value="{{$req->email}}" hidden>
                                    <input type="text" name="pass" id="" value="{{$req->pass}}" hidden>
                                    <input type="text" name="c_pass" id="" value="{{$req->c_pass}}" hidden>
                                    <input type="text" name="address" id="" value="{{$req->address}}" hidden>
                                    <input type="text" name="country" id="" value="{{$req->country}}" hidden>
                                    <input type="text" name="city" id="" value="{{$req->city}}" hidden>
                                    <input type="text" name="phone" id="" value="{{$req->phone}}" hidden>
                                    <input type="text" name="postcode" id="" value="{{$req->postcode}}" hidden>

                                    <div class="form-group">
                                        <input type="text" placeholder="Enter OTP" name="otp" value="">
                                    </div>
									<div class="form-group">
                                        <button type="submit" class="btn btn-brand">Create Account</button>
                                    </div>
                                    <span>If you have already Account ?</span>
									<a href="/userlogin" class="exist-user"> Login</a>
									{{-- <p>Or Sign In With</p>
                                    <div class="form-group">
                                        <a href="javascript:void();" class="btn btn-google"><i class="fab fa-google-plus-g"></i> Sign In with Google</a>
                                    </div> --}}
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- /Main -->

        <script>
            $(document).ready(function(){
                $("#exampleCheckbox12").on("change", function(){
                    if($("#exampleCheckbox12").is(":checked"))
                    {
                        $("#submit_button").removeAttr("disabled");
                    }
                    else
                    {
                        $("#submit_button").attr("disabled","disabled");
                    }
                })
            })
        </script>
@endsection
