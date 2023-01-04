@extends('layouts.admin_layout')

@section('title')
Admin - Godown Stock
@endsection

@section('search')
{{--sesrch--}}
@endsection


@section('admin_content')

<div class="sl-mainpanel m-4">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Godown Stock </p>
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
                        <h6 class="card-body-title">Godown Stoke Product List</h6>

                        <div class="row">
                            <div class="my-auto">
                                <form action="{{url('godown_stock_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
                                    {{csrf_field()}}

                                    <div class="input-group ">
                                        <input type="search" name="search" id="godown_stock_search" class=" form-control bg-white text-dark " placeholder="search product">
                                        <button type="submit" class="btn" title="Search">
                                            <i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="my-auto">
                                <a href="{{url('/admin_add_godown_stoke')}}" class=" btn btn-info btn-rounded">+ Stock</a>

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
                                            <button type="button" class="btn btn-warning btn-sm seenBtn" value="{{$row->id}}">
                                                <i class="fas fa-eye"></i> </a>
                                            </button>

                                            <a href="{{ url('admin_godown_stock_edit/'. $row->id ) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil"></i> </a>

                                            <a href="{{ url('admin_godown_stock_delete/'. $row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <h2 class="text-center p-5">Product Not Available In Godown Stock</h2>
                        @endif
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>
        </div>
    </div>


    <!--seen Modal-->
    <div class="modal fade" id="seenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="
            true">
        <div class="modal-dialog " role="document">
            <div class="modal-content  bg-white">
                <div class="text-center my-4">
                    <h4 class="modal-title w-100 font-weight-bold text-dark">Godown Product Details
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
                                <label class="form-control-label text-dark">Product Quantity:
                                </label>
                                <input class="form-control bg-white" id="product_quantity" style="color: black" type="text" name="product_quantity" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">
                                    Per Cost Price:</label>
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



    <div class="d-flex mt-5">
        {{ $stock->links() }}
    </div>
</div>


<!--Edit Modal-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.seenBtn', function() {
            var id = $(this).val();
            //alert(response);
            $('#seenModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin_godown_stock_seen/" + id,
                success: function(response) {
                    console.log(response.id);
                    $('#product_name').val(response.stock.product_name);
                    $('#brand').val(response.stock.brand);
                    $('#product_quantity').val(response.stock.product_quantity + " In Stock");
                    $('#per_cost_price').val(response.stock.per_cost_price + " TK");
                    $('#total_cost_price').val(response.stock.total_cost_price + " TK");
                    $('#per_selling_price').val(response.stock.per_selling_price + " TK");
                    $('#created_at').val(response.stock.created_at);
                    $('#updated_at').val(response.stock.updated_at);
                }
            });
        });
    });
</script>
@endsection