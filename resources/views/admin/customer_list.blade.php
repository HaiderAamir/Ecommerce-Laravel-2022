@extends("layouts.adminlayout")
@section("admincontent")
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">


            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Customers List</h4>
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
                        <th>Country</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Address</th>
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
                            <td id="name">{{$data->country}}</td>
                            <td id="name">{{$data->city}}</td>
                            <td id="email">{{$data->email}}</td>
                            <td id="address">{{$data->address1}}</td>
                            {{-- <td id="email">{{$data->address2}}</td> --}}
                            {{-- <td id="dob">{{$data->dob}}</td> --}}
                            {{-- Role area start --}}

                            <td id="role">
                                <span class="badge rounded-pill bg-label-success">Customer</span>
                            </td>

                            {{-- Role area end --}}
                            <td>
                                <div class="row">
                                    <div class="col-md-3 me-2">
                                    <form action="/admin/delete_user" method="POST">
                                        @csrf
                                        <input type="text" name="user_id" id="" value="{{$data->id}}" hidden>
                                        <button type="submit" class="btn rounded-pill btn-icon btn-danger waves-effect waves-light">
                                            <span class="ti ti-trash"></span>
                                        </button>
                                    </form>
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
