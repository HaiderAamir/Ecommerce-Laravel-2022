@extends("layouts.adminlayout")
@section("admincontent")
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        
        
        <button type="button" class="float-end btn rounded-pill btn-icon btn-primary waves-effect waves-light"
            data-bs-toggle="modal" data-bs-target="#backDropModal">
            <i class="fa-sharp fa-solid fa-box"></i>
        </button>
        <!-- Modal start -->
        <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="backDropModalTitle">New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/addproduct" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Product Name</label>
                                    <input class="form-control form-control-sm" type="text" name="name" id=""
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Product Category </label>
                                    <select class="form-select form-select-sm" name="category" id="">
                                        <option value="" selected disabled>--Select--</option>
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
                                        <option value="" selected disabled>--Select--</option>
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
                                    <input class="form-control form-control-sm" type="number" name="p_price" id=""
                                        value="{{ old('p_price') }}">
                                    @if ($errors->has('p_price'))
                                    <span class="error">{{ $errors->first('p_price') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Sale Price</label>
                                    <input class="form-control form-control-sm" type="number" name="s_price" id=""
                                        value="{{ old('s_price') }}">
                                    @if ($errors->has('s_price'))
                                    <span class="error">{{ $errors->first('s_price') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Quantity</label>
                                    <input class="form-control form-control-sm" type="number" name="qty" id=""
                                        value="{{ old('qty') }}">
                                    @if ($errors->has('qty'))
                                    <span class="error">{{ $errors->first('qty') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Picture 1 (Size = 1100x1200)</label>
                                    <input class="form-control form-control-sm" type="file" name="pic1" id=""
                                        value="{{ old('pic1') }}">
                                    @if ($errors->has('pic1'))
                                    <span class="error">{{ $errors->first('pic1') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Picture 2 (Size = 1100x1200)</label>
                                    <input class="form-control form-control-sm" type="file" name="pic2" id=""
                                        value="{{ old('pic2') }}">
                                    @if ($errors->has('pic2'))
                                    <span class="error">{{ $errors->first('pic2') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Picture 3 (Size = 1100x1200)</label>
                                    <input class="form-control form-control-sm" type="file" name="pic3" id=""
                                        value="{{ old('pic3') }}">
                                    @if ($errors->has('pic3'))
                                    <span class="error">{{ $errors->first('pic3') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Picture 4 (Size = 1100x1200)</label>
                                    <input class="form-control form-control-sm" type="file" name="pic4" id=""
                                        value="{{ old('pic4') }}">
                                    @if ($errors->has('pic4'))
                                    <span class="error">{{ $errors->first('pic4') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Size</label>
                                    <textarea class="form-control form-control-sm" name="size" id="" cols="30" rows="5"
                                        value="{{ old('size') }}"></textarea>
                                    @if ($errors->has('size'))
                                    <span class="error">{{ $errors->first('size') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Details</label>
                                    <textarea class="form-control form-control-sm" name="details" id="" cols="30"
                                        rows="10" value="{{ old('details') }}"></textarea>
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
            </div>
        </div>

        {{-- Modal End --}}


         <!-- Edit Modal start -->
         <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="backDropModalTitle">Update Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/update_product" method="POST">
                            @csrf
                            <div class="row">
                                <input type="text" name="id" id="prod_id">
                                <div class="col-md-6">
                                    <label class="form-label">Product Name</label>
                                    <input class="form-control form-control-sm" type="text" name="name" id="prod_name"
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Product Category </label>
                                    <input class="form-control form-control-sm" type="text" name="category" id="prod_category" value="{{ old('category') }}">
                                    @if ($errors->has('category'))
                                    <span class="error">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Product Sub Category</label>
                                    <input class="form-control form-control-sm" type="text" name="sub_category" id="prod_sub_category" value="{{ old('sub_category') }}">
                                    @if ($errors->has('sub_category'))
                                    <span class="error">{{ $errors->first('sub_category') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prouct Price</label>
                                    <input class="form-control form-control-sm" type="number" name="p_price" id="prod_price"
                                        value="{{ old('p_price') }}">
                                    @if ($errors->has('p_price'))
                                    <span class="error">{{ $errors->first('p_price') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Sale Price</label>
                                    <input class="form-control form-control-sm" type="number" name="s_price" id="prod_sale_price"
                                        value="{{ old('s_price') }}">
                                    @if ($errors->has('s_price'))
                                    <span class="error">{{ $errors->first('s_price') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Quantity</label>
                                    <input class="form-control form-control-sm" type="number" name="qty" id="prod_qty"
                                        value="{{ old('qty') }}">
                                    @if ($errors->has('qty'))
                                    <span class="error">{{ $errors->first('qty') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Size</label>
                                    <textarea class="form-control form-control-sm" name="size" id="prod_size" cols="30" rows="5"
                                        value="{{ old('size') }}"></textarea>
                                    @if ($errors->has('size'))
                                    <span class="error">{{ $errors->first('size') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Details</label>
                                    <textarea class="form-control form-control-sm" name="details" id="prod_details" cols="30"
                                        rows="10" value="{{ old('details') }}"></textarea>
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
            </div>
        </div>

        {{-- Modal End --}}
        
       


        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span> Active Products</h4>
        {{-- <div class="margin-auto"> --}}
            {{-- </div> --}}



        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table" id="myTable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Cateogry</th>
                            <th>Sub Category</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Sale</th>
                            <th>Top</th>
                            <th>Action</th>
                            <th>Status</th>
                            <th hidden>Status</th>
                            <th hidden>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prod as $prod)
                        <tr>
                            <td id="pic" class="" style="">
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2">
                                            <img src="{{ asset('../../products/' . $prod->pic1.'.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td id="p_id">{{$prod->product_id}}</td>
                            <td id="p_name">{{$prod->name}}</td>
                            <td id="p_cat">{{$prod->category}}</td>
                            <td id="p_subcat">{{$prod->sub_category}}</td>
                            <td id="p_price">{{$prod->price}}</td>
                            <td id="p_sale_price">{{$prod->sale_price}}</td>
                            <td id="p_size" hidden>{{$prod->size}}</td>
                            <td id="p_details" hidden>{{$prod->detail}}</td>
                            <td>
                                <div class="col-md-3 my-auto">
                                    <label class="switch switch-success">
                                        @if ($prod->sale_active == 1)
                                        <input onchange="saleactive({{$prod->id}})" type="checkbox" class="switch-input"
                                            checked>
                                        @elseif($prod->sale_active == 0)
                                        <input onchange="saleactive({{$prod->id}})" type="checkbox"
                                            class="switch-input">
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
                            </td>
                            <td>
                                <div class="col-md-3 my-auto">
                                    <label class="switch switch-warning">
                                        @if ($prod->top == 1)
                                        <input onchange="product_top({{$prod->id}})" type="checkbox"
                                            class="switch-input" checked>
                                        @elseif($prod->top == 0)
                                        <input onchange="product_top({{$prod->id}})" type="checkbox"
                                            class="switch-input">
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
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <form action="/admin/delete_product" method="POST">
                                            @csrf
                                            <input type="text" name="prod_id" id="" value="{{$prod->id}}" hidden>
                                            <button type="submit"
                                                class="btn rounded-pill btn-icon btn-danger waves-effect waves-light">
                                                <span class="ti ti-trash"></span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-4 mx-2">
                                        <button class="btn rounded-pill btn-icon btn-success waves-effect waves-light edit-product-btn" id="edit-product-btn" data-product-id="{{ $prod->id }}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
   <path d="M16 5l3 3"></path>
   <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
</svg></button>
                                    </div>

                                </div>
                            </td>

                            {{-- product status start --}}
                            <td>
                                <div class="col-md-3 my-auto">
                                    <label class="switch switch-primary">
                                        @if ($prod->status == 1)
                                        <input onchange="product_status({{$prod->id}})" type="checkbox"
                                            class="switch-input" checked>
                                        @elseif($prod->status == 0)
                                        <input onchange="product_status({{$prod->id}})" type="checkbox"
                                            class="switch-input">
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
                            </td>
                            {{-- product status end --}}



                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">

            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="offcanvas offcanvas-end" id="add-new-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

        </div>
        <!--/ DataTable with Buttons -->


    </div>
    <!-- / Content -->

</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>

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

<script>
    $(document).on('click', '.edit-product-btn', function () {
          var prodId = $(this).data('product-id');
          $.ajax({
            url: '/admin/product_details_fetch/' + prodId ,
            method: 'GET',
            success: function (data) {
              // Open modal and fill in form fields with blog post data
              $('#editModal').modal('show'); // Open the modal

              $('#prod_name').val(data.name); // Fill in the title field
              $('#prod_id').val(data.id); // Fill in the title field
              $('#prod_category').val(data.category); // Fill in the title field
              $('#prod_sub_category').val(data.sub_category); // Fill in the paragraph1 field
              $('#prod_size').val(data.size); // Fill in the paragraph2 field
              $('#prod_details').val(data.details); // Fill in the paragraph3 field
              $('#prod_qty').val(data.qty); // Fill in the paragraph3 field
              $('#prod_price').val(data.price); // Fill in the paragraph3 field
              $('#prod_sale_price').val(data.sale_price); // Fill in the paragraph3 field
              // $('#editform').attr('data-blog-id', data.id); // Set the data attribute of the form to the blog ID
            }
          });
        });
</script>
@endsection
