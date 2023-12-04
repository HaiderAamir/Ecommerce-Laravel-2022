@extends("layouts.adminlayout")
@section("admincontent")
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <button type="button" class="float-end btn rounded-pill btn-icon btn-primary waves-effect waves-light" data-bs-toggle="modal"
                data-bs-target="#backDropModal">
                    <span class="ti ti-user-plus"></span>
                </button>
                 <!-- Modal start -->
                 <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="backDropModalTitle">New User</h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/add_user" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Enter Name</label>
                                        <input class="form-control form-control-sm" type="text" name="f_name" id="" value="{{ old('f_name') }}">
                                        @if ($errors->has('l_name'))
                                            <span class="error">{{ $errors->first('l_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Enter Name</label>
                                        <input class="form-control form-control-sm" type="text" name="l_name" id="" value="{{ old('l_name') }}">
                                        @if ($errors->has('l_name'))
                                            <span class="error">{{ $errors->first('l_name') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Enter Email</label>
                                        <input class="form-control form-control-sm" type="text" name="email" id="" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Enter Password</label>
                                        <input class="form-control form-control-sm" type="text" name="password" id="" value="{{ old('password') }}">
                                        @if ($errors->has('password'))
                                            <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="form-control form-control-sm" type="text" name="cpassword" id="" value="{{ old('cpassword') }}">
                                        @if ($errors->has('cpassword'))
                                            <span class="error">{{ $errors->first('cpassword') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Enter Date of Birth</label>
                                        <input class="form-control form-control-sm" type="date" name="dob" id="" value="{{ old('dob') }}">
                                        @if ($errors->has('dob'))
                                            <span class="error">{{ $errors->first('dob') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Select Role</label>
                                        <select class="form-select form-select-sm" name="role" id="">
                                            <option disabled selected>--Select--</option>
                                            <option value="editor">Order Manager</option>
                                            <option value="user">Product Manager</option>
                                        </select>
                                        @if ($errors->has('role'))
                                            <span class="error">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="m-3 text-center">
                                    <button class="btn btn-primary">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                  </div>

                  {{-- Modal End --}}
                  {{-- new modal --}}
                  <div class="modal fade" id="backDropModal1" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="backDropModalTitle">New User</h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/update_user" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="user_id" id="user_id" hidden>
                                        <label class="form-label">Enter First Name</label>
                                        <input class="form-control form-control-sm" type="text" name="f_name" id="f_name" value="{{ old('f_name') }}">
                                        @if ($errors->has('f_name'))
                                            <span class="error">{{ $errors->first('f_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Enter Last Name</label>
                                        <input class="form-control form-control-sm" type="text" name="l_name" id="l_name" value="{{ old('l_name') }}">
                                        @if ($errors->has('l_name'))
                                            <span class="error">{{ $errors->first('l_name') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Enter Email</label>
                                        <input class="form-control form-control-sm" type="text" name="user_email" id="user_email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Enter Date of Birth</label>
                                        <input class="form-control form-control-sm" type="date" name="user_dob" id="user_dob" value="{{ old('user_dob') }}">
                                        @if ($errors->has('user_dob'))
                                            <span class="error">{{ $errors->first('user_dob') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Select Role</label>
                                        <select class="form-select form-select-sm" name="user_role" id="user_role">
                                            <option disabled selected>--Select--</option>
                                            <option value="user">Product Manager</option>
                                            <option value="editor">Order Manager</option>
                                        </select>
                                        @if ($errors->has('role'))
                                            <span class="error">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="m-3 text-center">
                                    <button class="btn btn-primary">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                  </div>
                  {{-- new modal --}}
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span> Active User</h4>
            {{-- <div class="margin-auto"> --}}
            {{-- </div> --}}


              <!-- DataTable with Buttons -->
              <div class="card">
                <div class="card-datatable table-responsive pt-0">
                  <table class="datatables-basic table" id="myTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td id="id" >{{$data->id}}</td>
                            <td id="first_name">{{$data->f_name}}</td>
                            <td id="last_name">{{$data->l_name}}</td>
                            <td id="email">{{$data->email}}</td>
                            @if ($data->role=="user")
                            <td id="role">
                                <span class="badge rounded-pill bg-label-info">Order Manager</span>
                            </td>
                            @elseif($data->role=="editor")
                            <td id="role">
                                <span class="badge rounded-pill bg-label-warning">Product Manager</span>
                            </td>
                            @elseif($data->role=="customer")
                            <td id="role">
                                <span class="badge rounded-pill bg-label-success">Customer</span>
                            </td>
                            @endif
                            {{-- Role area end --}}
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                    <form action="/admin/delete_user" method="POST">
                                        @csrf
                                        <input type="text" name="user_id" id="" value="{{$data->id}}" hidden>
                                        <button type="submit" class="btn rounded-pill btn-icon btn-danger waves-effect waves-light">
                                            <span class="ti ti-trash"></span>
                                        </button>
                                    </form>
                                    </div>
                                    <div class="col-md-3">
                                        <button id="{{$data->id}}" onclick="update({{$data->id}})" type="submit" data-bs-target="#backDropModal1" data-bs-toggle="modal" class="btn rounded-pill btn-icon btn-warning waves-effect waves-light newclass">
                                            <span class="ti ti-edit"></span>
                                        </button>
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <label class="switch switch-success">
                                            @if ($data->status == 1)
                                            <input  onchange="statuschange({{$data->id}})" type="checkbox" class="switch-input" checked>
                                            @elseif($data->status == 0)
                                            <input  onchange="statuschange({{$data->id}})" type="checkbox" class="switch-input">
                                            @endif
                                            <span class="switch-toggle-slider">
                                              <span class="switch-on">
                                                <i class="ti ti-check"></i>
                                              </span>
                                              <span class="switch-off">
                                                <i class="ti ti-x"></i>
                                              </span>
                                            </span>

                                        </label>
                                    </div>
                                </div>
                            </td>
                            {{-- Block-Active area start --}}
                            {{-- Block-Active area end --}}
                        </tr>

                        @endforeach

                        </tbody>
                  </table>
                </div>
              </div>
              <!-- Modal to add new record -->
              <div class="offcanvas offcanvas-end" id="add-new-record">
                <div class="offcanvas-header border-bottom">
                  <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                  <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                  ></button>
                </div>

              </div>
              <!--/ DataTable with Buttons -->


            </div>
            <!-- / Content -->

          </div>
          <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

          <script>
            function statuschange(id)
            {
                window.location.href = "/admin/statuschange/"+id;
            }

            function update(id)
            {

                var parent=$("#"+id).parents("tr");
                var child= $(parent).children();

                console.log((name));
                $("#user_id").val($(parent).children("#id").html());

                $("#f_name").val($(parent).children("#first_name").html());
                $("#l_name").val($(parent).children("#last_name").html());
                $("#user_email").val($(parent).children("#email").html());
                $("#user_dob").val($(parent).children("#dob").html());
                var role=$(parent).children("#role");
                var mod_role=$("#user_role");
                var select_child=$(mod_role).children();
                  //  console.log($(mod_role).children());
                console.log($(role).html())
                    for(let i=0;i<select_child.length;i++){
                                if($(select_child[i]).html()===$(role).children().html()){
                                   $(select_child[i]).attr("selected","selected")
                                   console.log("eq")

                                }
                                else{
                                   $(select_child[i]).removeAttr("selected")

                                }
                    }




            }
          </script>
@endsection
