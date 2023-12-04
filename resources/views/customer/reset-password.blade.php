@extends("layouts.customerlayout")
@section("customercontent")

        <!-- Main -->
        <main class="main">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                            <div class="login-wrap log-sec">
                                <h4 class="log-title">Enter Email</h4>
                                <form action="/save_password" method="POST">
                                    @csrf
                                    <input type="email" name="email" id="" value="{{$email}}" hidden>
                                    <div class="form-group">
                                        <input type="password" placeholder="Passsword" name="password" value="">
                                        @if ($errors->has('password'))
                                            <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Confirm Passsword" name="confirm_password" value="">
                                        @if ($errors->has('confirm_password'))
                                            <span class="error">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                    </div>
									<div class="form-group">
                                        <button type="submit" class="btn btn-brand">Save Password</button>
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
