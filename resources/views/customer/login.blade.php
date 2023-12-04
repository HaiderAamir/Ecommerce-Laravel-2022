@extends("layouts.customerlayout")
@section("customercontent")
        <!-- Main -->
        <main class="main">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="login-wrap">
                                        <h4 class="log-title">Login</h4>
                                        <form method="post" action="login_submit">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required name="email" placeholder="Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" required name="password" placeholder="password">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
											<a class="forgot-link" href="/forgot_password">Forgot password?</a>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-brand" name="login">Log in</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
									<div class="new-customer">
										<h4 class="log-title">New Customer</h4>
										<p style="color: #6B7280;">Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt out, click unsubscribe in our emails.</p>
										<a href="/userregister" class="btn btn-reg">Register</a>
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
