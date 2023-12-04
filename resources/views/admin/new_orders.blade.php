@extends("layouts.adminlayout")
@section("admincontent")
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">



              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Orders </span></h4>
            {{-- <div class="margin-auto"> --}}
            {{-- </div> --}}


              <!-- DataTable with Buttons -->
              <div class="card">
                <div class="card-datatable table-responsive pt-0">
                  <table class="datatables-basic table" id="myTable">
                    <thead>
                      <tr>
                        <th>Invoice#</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Qty</th>
                        <th>Product Price</th>
                        <th>Address</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $data)
                        <tr>
                            {{--  <td id="id" hidden>{{$data->id}}</td>  --}}
                            @if($data->status == 0)
                                <td><span class="badge rounded-pill bg-label-info">{{$data->invoice_number}}</span></td>
                            @elseif($data->status == 1)
                                <td><span class="badge rounded-pill bg-label-warning">{{$data->invoice_number}}</span></td>
                            @else
                                <td><span class="badge rounded-pill bg-label-dark">{{$data->invoice_number}}</span></td>
                            @endif
                            <td id="name">{{$data->customer_name}}</td>
                            <td id="name">{{$data->customer_email}}</td>
                            <td id="name">{{$data->product_id}}</td>
                            <td id="name">{{$data->product_name}}</td>
                            <td id="name">{{$data->product_qty}}</td>
                            <td id="name">{{$data->product_price}}</td>
                            <td id="email">{{$data->address}}</td>
                            <td>
                                <select style="width: 135px" class="form-select" id="status" name="status" onchange="updateStatus(this)" data-p_id="{{ $data->id }}">
                                    {{--  <span id="p_id">{{ $data->id }}</span>  --}}
                                    @if($data->status == 0)
                                        <option style="background-color: #FF0000;" value="0" selected disabled>In progress</option>
                                    @elseif($data->status == 1)
                                        <option value="1" selected disabled>Dispatched</option>
                                    @elseif($data->status == 2)
                                        <option value="2" selected disabled>Completed</option>
                                    @elseif($data->status == 3)
                                        <option value="3" selected disabled >Declined</option>
                                    @endif
                                    <option class="bg-info" value="0">In progress</option>
                                    <option class="bg-warning" value="1">Dispatched</option>
                                    <option class="bg-success" value="2">Completed</option>
                                    <option class="bg-danger" value="3">Declined</option>
                                </select>
                            </td>
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

                $("#user_name").val($(parent).children("#name").html());
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

          <script>
            function updateStatus(selectTag) {
                alert($(selectTag).val());

                let ar = $(selectTag).html();
                console.log($(selectTag).data('p_id'));

                let status_p = $(selectTag).val();
                let order_id = $(selectTag).data('p_id');


                $.ajax({
                    url: '/admin/update-order-status',
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status_p,
                        orderId: order_id
                    },



                    success: function(response) {
                        // Check if the response is OK
                        if (response === 'ok') {
                          // Refresh the page
                          location.reload();
                        }
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                        // Handle any errors here
                        console.error(errorThrown);
                      }
                });

            }

          </script>
@endsection
