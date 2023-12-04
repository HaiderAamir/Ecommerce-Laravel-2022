@extends("layouts.adminlayout")
@section("admincontent")
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">


                <button type="button" class="float-end btn rounded-pill btn-icon btn-primary waves-effect waves-light" data-bs-toggle="modal"
                data-bs-target="#backDropModal">
                <i class="fa-solid fa-sliders"></i>
                </button>
                 <!-- Modal start -->
                 <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="backDropModalTitle">New Slide</h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/addslide" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">First Title</label>
                                        <input class="form-control form-control-sm" type="text" name="title1" id="" value="{{ old('title1') }}">
                                        @if ($errors->has('title1'))
                                            <span class="error">{{ $errors->first('title1') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Title</label>
                                        <input class="form-control form-control-sm" type="text" name="title2" id="" value="{{ old('title2') }}">
                                        @if ($errors->has('title2'))
                                            <span class="error">{{ $errors->first('title2') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Slider Caption </label>
                                        <input class="form-control form-control-sm" type="text" name="caption" id="" value="{{ old('caption') }}">
                                        @if ($errors->has('caption'))
                                            <span class="error">{{ $errors->first('caption') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Product List</label>
                                        <select class="form-select" name="prod_id" id="">
                                            @foreach ($prodlist as $sdata)
                                                <option value="{{ $sdata->id }}">{{ $sdata->name }}</option>
                                            @endforeach
                                        </select>
                                        {{--  <input class="form-control form-control-sm" type="text" name="prod_id" id="" value="{{ old('prod_id') }}">  --}}
                                        @if ($errors->has('prod_id'))
                                            <span class="error">{{ $errors->first('prod_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Slider Image (Size = 740x600)</label>
                                        <input class="form-control form-control-sm" type="file" name="slide_image" id="" value="{{ old('slide_image') }}">
                                        @if ($errors->has('slide_image'))
                                            <span class="error">{{ $errors->first('slide_image') }}</span>
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


              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Slides </span></h4>
            {{-- <div class="margin-auto"> --}}
            {{-- </div> --}}


              <!-- DataTable with Buttons -->
              <div class="card">
                <div class="card-datatable table-responsive pt-0">
                  <table class="datatables-basic table" id="myTable">
                    <thead>
                      <tr>
                        <th>Title 1</th>
                        <th>Title 2</th>
                        <th>Caption</th>
                        <th>Image</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td id="p_id">{{$data->title1}}</td>
                            <td id="p_name">{{$data->title2}}</td>
                            <td id="p_cat">{{$data->caption}}</td>

                            <td id="pic" class="" style="">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2">
                                            <img src="{{ asset('../../slides/' . $data->image.'.png') }}" alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-md-4">
                                    <form action="/admin/delete_slide" method="POST">
                                        @csrf
                                        <input type="text" name="slide_id" id="" value="{{$data->id}}" hidden>
                                        <button type="submit" class="btn rounded-pill btn-icon btn-danger waves-effect waves-light">
                                            <span class="ti ti-trash"></span>
                                        </button>
                                    </form>
                                </div>
                            </td>



                            {{-- sale active td start --}}


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
            function saleactive(id)
            {
                window.location.href = "/admin/sale_active/"+id;
            }

            function product_top(id)
            {
                window.location.href = "/admin/product_top/"+id;
            }

            function product_status(id)
            {
                window.location.href = "/admin/product_status/"+id;
            }


            function update(id)
            {

                var parent=$("#"+id).parents("tr");
                var child= $(parent).children();

                console.log((name));
                $("#p_id").val($(parent).children("#p_id").html());

                $("#p_name").val($(parent).children("#p_name").html());
                $("#p_cat").val($(parent).children("#p_cat").html());
                $("#p_subcat").val($(parent).children("#p_subcat").html());
                $("#p_price").val($(parent).children("#p_price").html());
                $("#p_sale_price").val($(parent).children("#p_sale_price").html());
                $("#p_size").val($(parent).children("#p_size").html());
                $("#p_detail").val($(parent).children("#p_detail").html());
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
