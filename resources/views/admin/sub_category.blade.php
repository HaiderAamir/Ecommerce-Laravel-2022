@extends("layouts.adminlayout")
@section("admincontent")
<!-- Content wrapper -->
<div class="content-wrapper">
{{-- new modal --}}
        <div class="modal fade" id="addsubcategory" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="backDropModalTitle">New Sub Cetagory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/add_subcategory" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Sub Category Name</label>
                                    <input class="form-control form-control-sm" type="text" name="s_category"
                                        id="s_category" value="{{ old('s_category') }}">
                                    @if ($errors->has('s_category'))
                                    <span class="error">{{ $errors->first('s_category') }}</span>
                                    @endif
                                    <label>Upload Image</label>
                                    <input class="form-control form-control-sm" type="file" name="pic" id="pic"
                                        value="{{ old('pic') }}">
                                    @if ($errors->has('pic'))
                                    <span class="error">{{ $errors->first('pic') }}</span>
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


    <!-- Content -->
    

    <div class="container-xxl flex-grow-1 container-p-y">
         <button type="button" class="float-end ms-2 btn rounded-pill btn-icon btn-primary waves-effect waves-light"
            data-bs-toggle="modal" data-bs-target="#addsubcategory">
            <i class="fa-solid fa-boxes-stacked"></i>
        </button>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sub Category Table</h4>
        {{-- <div class="margin-auto"> --}}
            
            {{-- </div> --}}
            


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table" id="myTable">
                    <thead>
                        <tr>
                            <th>ID#</th>
                            <th>Category Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data1 as $data1)


                        <tr>

                            <td id="p_id">{{$data1->id}}</td>
                            <td id="p_name">{{$data1->name}}</td>
                            <td id="p_cat">{{$data1->created_at}}</td>
                            <td>
                                <form action="/admin/delete_sub_category" method="POST">
                                    @csrf
                                    <input type="text" name="data_id" id="" value="{{$data1->id}}" hidden>
                                    <button type="submit"
                                        class="btn rounded-pill btn-icon btn-danger waves-effect waves-light">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                </form>
                            </td>
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
@endsection
