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
                                                {{--  <div class="account-profile-img">
                                                    <img src="assets/img/profile-img.jpg" alt="Image">
                                                </div>  --}}
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
                                                <a class="nav-link active accordion-button collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fi-rs-user mr-10"></i>Account Information</a>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="dashboard-one" data-bs-parent="#accordionExample">
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
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <h3 class="card-title">Personal Information</h3>
                                                <div class="account-edit">
                                                    <a aria-label="editmodal" class="edit-modal-btn" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</a> <span>|</span>
                                                    <a aria-label="passwordmodal" class="edit-modal-btn" data-bs-toggle="modal" data-bs-target="#passwordmodal">Change Password</a>
                                                </div>
                                            </div>
                                            <div class="card-body profile-body">
                                                <p><span>Name :</span> {{ $user->f_name }} {{ $user->l_name }}</p>
                                                <p><span>Email :</span> {{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <!-- Edit Modal -->
        <div class="modal fade custom-modal edit-modal" id="editmodal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Your Personal Details</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="feather-x-circle"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/update_user_name" method="post">
                            @csrf
                            <input type="text" name="user_email" id="" value="{{ $user->email }}" hidden>
                            <div class="input-style mb-15">
                                <input type="text" name="f_name" class="form-control" placeholder="First Name" value="{{ $user->f_name}}">
                            </div>
                            <div class="input-style mb-15">
                                <input type="text" name="l_name" class="form-control" placeholder="Last Name" value="{{ $user->l_name}}">
                            </div>
                            <div class="input-style d-flex align-items-center justify-content-between mb-5">
                                <button class="btn update-btn" type="submit">Update</button>
                                <button data-bs-dismiss="modal" aria-label="Close" class="btn back-btn" type="button">Back</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Modal -->

        <!-- Password Modal -->
        <div class="modal fade custom-modal edit-modal" id="passwordmodal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Change password</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="feather-x-circle"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/change_user_password" method="post">
                            @csrf
                            <input type="text" name="user_email" id="" value="{{ $user->email }}" hidden>
                            <div class="input-style mb-15">
                                <input type="password" name="current_password" class="form-control" placeholder="Old Password">
                            </div>
                            <div class="input-style mb-15">
                                <input type="password" name="new_password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="input-style mb-20">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="input-style d-flex align-items-center justify-content-between mb-5">
                                <button class="btn update-btn" type="submit">Change</button>
                                <button data-bs-dismiss="modal" aria-label="Close" class="btn back-btn" type="button">Back</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Password Modal -->


@endsection
