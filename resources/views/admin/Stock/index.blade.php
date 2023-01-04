@extends('layouts.admin_layout')

@section('title')
Admin - Shop Stock
@endsection

@section('search')
{{--sesrch--}}
@endsection


@section('admin_content')

<div class="sl-mainpanel m-4">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Shop Stock </p>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('status_inactive'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('status_inactive') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('delete') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif


                <div class="card p-4" style="overflow: auto">

                    <div style="display: flex; justify-content: space-between;" class="mb-2">
                        <h6 class="card-body-title">Shop Stoke Product List</h6>

                        <div class="row">
                            <div class="my-auto">
                                {{--search--}}
                                <form action="{{url('shop_stock_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
                                    {{csrf_field()}}

                                    <div class="input-group">
                                        <input type="search" name="search" id="shop_stock_search" class=" form-control bg-white text-dark " placeholder="search product">
                                        <button type="submit" class="btn" title="Search">
                                            <i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="my-auto">
                                <a href="{{url('/admin_add_shop_stoke')}}" class=" btn btn-info btn-rounded">+ Stock</a>

                            </div>
                        </div>


                    </div>
                    @if ($stock->count() > 0)
                    <div class="table-wrapper" style="overflow: auto">
                        <div class="product">
                            <table width="100%" class="table table-bordered display responsive  text-white">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date & Time</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Quantity</th>
                                        <th>Add Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = $stock->perPage() * ($stock->currentPage() - 1); ?>

                                    @foreach ($stock as $row)
                                    <tr>
                                        <td> <?php $i++; ?> {{ $i }}</td>
                                        <td> {{$row->updated_at ?? $row->created_at}}</td>
                                        <td>{{ $row->product_name }}</td>
                                        <td>{{ $row->category_name }}</td>
                                        <td>{{ $row->brand }}</td>
                                        <td>
                                            @if($row->product_quantity > 0)
                                            <label class="badge bg-success ">{{ $row->product_quantity }} In
                                                Stock</label>
                                            @else
                                            <label class="badge bg-danger"> Out
                                                Of Stock</label>
                                            @endif
                                        </td>

                                        <td>
                                            <!-Modal-->
                                                <button type="button" class="btn btn-success btn-sm addQtybtn" value=" {{$row->id}}">
                                                    + Add Qty
                                                </button>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm seenBtn" value=" {{$row->id}}">
                                                <i class="fas fa-eye"></i> </a>
                                            </button>

                                            <a href="{{ url('admin_shop_stock_edit/'. $row->id ) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil"></i> </a>

                                            <a href="{{ url('admin_shop_stock_delete/'. $row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <h2 class="text-center p-5">Product Not Available In Shop Stock</h2>
                        @endif
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>

        </div>
    </div>


    <!--Add Quantity product Modal Modal-->
    <form action="{{ url('addQty_stock_update')}}" method="POST">
        @csrf
        @method('POST')

        <div class="modal fade" id="addQtyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content  bg-white">
                    <div class="text-center my-4">
                        <h4 class="modal-title w-100 font-weight-bold text-dark">Add Product Quantity
                        </h4>
                    </div>

                    <div class="modal-body mx-3">
                        <div class="row">

                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="previous_product_quantity_addQty" name="previous_product_quantity_addQty">
                            <input type="hidden" id="product_quantity_total_addQty" name="product_quantity_total_addQty">

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="form-control-label text-dark">Product Quantity:
                                    </label>
                                    <input class="form-control bg-white" id="product_quantity_addQty" style="color: black" type="number" name="product_quantity_addQty" placeholder="20" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-success">Add Quantity</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!--End Add Quantity product Modal Modal-->

    <!--seen Modal-->
    <div class="modal fade" id="seenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="
            true">
        <div class="modal-dialog " role="document">
            <div class="modal-content  bg-white">
                <div class="text-center my-4">
                    <h4 class="modal-title w-100 font-weight-bold text-dark">Stock Product Details
                    </h4>
                </div>

                <div class="modal-body mx-3">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Product Name:
                                </label>
                                <input class="form-control bg-white" id="product_name" style="color: black" type="text" name="product_name" readonly>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Brand:
                                </label>
                                <input class="form-control bg-white" id="brand" style="color: black" type="text" name="brand" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Total Product Quantity:
                                </label>
                                <input class="form-control bg-white" id="product_quantity_total" style="color: black" type="text" name="product_quantity_total" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Product Quantity:
                                </label>
                                <input class="form-control bg-white" id="product_quantity" style="color: black" type="text" name="product_quantity" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Product Sales:
                                </label>
                                <input class="form-control bg-white" id="product_sales" style="color: black" type="text" name="product_sales" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">
                                    Per Purchase Price:</label>
                                <input class="form-control bg-white" id="per_cost_price" style="color: black" type="text" name="per_cost_price" readonly>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Per Selling Price:
                                </label>
                                <input class="form-control bg-white" id="per_selling_price" style="color: black" type="text" name="per_selling_price" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Created Time:
                                </label>
                                <input class="form-control bg-white" id="created_at" style="color: black" type="text" name="created_at" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">
                                    Updated Time:</label>
                                <input class="form-control bg-white" id="updated_at" style="color: black" type="text" name="updated_at" readonly>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End seen Modal-->


    <div class="d-flex mt-5">
        {{ $stock->links() }}
    </div>
</div>


<!--Add Quantity product Modal-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.addQtybtn', function() {
            var id = $(this).val();
            //alert(response);
            $('#addQtyModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/addQty_stock/" + id,
                success: function(response) {
                    console.log(response.id);
                    $('#id').val(response.stock.id);
                    //$('#product_quantity_addQty').val(response.stock.product_quantity);
                    $('#previous_product_quantity_addQty').val(response.stock.product_quantity);
                    $('#product_quantity_total_addQty').val(response.stock.product_quantity_total);
                }

            });
        });
    });
</script>


<!--seen Modal-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.seenBtn', function() {
            var id = $(this).val();
            //alert(response);
            $('#seenModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin_shop_stock_seen/" + id,
                success: function(response) {
                    console.log(response.id);
                    $('#product_name').val(response.stock.product_name);
                    $('#brand').val(response.stock.brand);
                    $('#product_quantity').val(response.stock.product_quantity + " In Stock");
                    $('#product_quantity_total').val(response.stock.product_quantity_total);
                    $('#product_sales').val(response.stock.product_quantity_total - response.stock.product_quantity);
                    $('#per_cost_price').val(response.stock.per_cost_price + " TK");
                    $('#per_selling_price').val(response.stock.per_selling_price + " TK");
                    $('#created_at').val(response.stock.created_at);
                    $('#updated_at').val(response.stock.updated_at);
                }
            });
        });
    });
</script>
@endsection