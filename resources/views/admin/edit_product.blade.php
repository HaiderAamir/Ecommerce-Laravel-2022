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

              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span> Active User</h4>
            


              <!-- DataTable with Buttons -->
              <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <form action="/admin/edit_product" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Product Name</label>
                                <input class="form-control form-control-sm" type="text" name="name" id="" value={{ $data->name }}">
                                @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Category </label>
                                <select class="form-select form-select-sm" name="category" id="">
                                    <option value="{{ $data->category }}" selected>{{ $data->category }}</option>
                                    @foreach ($cat as $cat)
                                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="error">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Product Sub Category</label>
                                <select class="form-select form-select-sm" name="sub_category" id="">
                                    <option value="{{ $data->sub_category }}" selected>{{ $data->sub_category }}</option>
                                    @foreach ($subcat as $subcat)
                                        <option value="{{$subcat->name}}">{{$subcat->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sub_category'))
                                    <span class="error">{{ $errors->first('sub_category') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Prouct Price</label>
                                <input class="form-control form-control-sm" type="number" name="p_price" id="" value="{{ $data->price }}">
                                @if ($errors->has('p_price'))
                                    <span class="error">{{ $errors->first('p_price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Sale Price</label>
                                <input class="form-control form-control-sm" type="number" name="s_price" id="" value="{{ $data->sale_price }}">
                                @if ($errors->has('s_price'))
                                    <span class="error">{{ $errors->first('s_price') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Quantity</label>
                                <input class="form-control form-control-sm" type="number" name="qty" id="" value="{{ $data->qty }}">
                                @if ($errors->has('qty'))
                                    <span class="error">{{ $errors->first('qty') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Picture 1</label>
                                <input class="form-control form-control-sm" type="file" name="pic1" id="" value="{{ $data->pic1 }}">
                                @if ($errors->has('pic1'))
                                    <span class="error">{{ $errors->first('pic1') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Picture 2</label>
                                <input class="form-control form-control-sm" type="file" name="pic2" id="" value="{{ $data->pic2 }}">
                                @if ($errors->has('pic2'))
                                    <span class="error">{{ $errors->first('pic2') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Picture 3</label>
                                <input class="form-control form-control-sm" type="file" name="pic3" id="" value="{{ $data->pic3 }}">
                                @if ($errors->has('pic3'))
                                    <span class="error">{{ $errors->first('pic3') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Picture 4</label>
                                <input class="form-control form-control-sm" type="file" name="pic4" id="" value="{{ $data->pic4 }}">
                                @if ($errors->has('pic4'))
                                    <span class="error">{{ $errors->first('pic4') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Size</label>
                                <textarea class="form-control form-control-sm" name="size" id="" cols="30" rows="5" value="{{ $data->size }}"></textarea>
                                @if ($errors->has('size'))
                                    <span class="error">{{ $errors->first('size') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Details</label>
                                <textarea class="form-control form-control-sm" name="details" id="" cols="30" rows="10" value="{{ $data->details }}"></textarea>
                                @if ($errors->has('details'))
                                    <span class="error">{{ $errors->first('details') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="m-3 text-center">
                            <button class="btn btn-primary">Submit</button>

                        </div>
                    </form>
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
