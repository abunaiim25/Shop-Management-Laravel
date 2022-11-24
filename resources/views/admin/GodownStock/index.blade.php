@extends('layouts.admin_layout')

@section('title')
Admin - Godown Stock
@endsection

@section('search')
{{--sesrch--}}
<ul class="navbar-nav w-100">
    <li class="nav-item w-100">

        <form action="{{url('shop_stock_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
            {{csrf_field()}}
            <input type="text" name="search" class="form-control bg-white text-dark" placeholder="search godown stock">
        </form>

    </li>
</ul>
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
                        <a href="{{url('/admin_add_godown_stoke')}}" class=" btn btn-info btn-rounded">+ Add Godown
                            Stock</a>
                    </div>
                    @if ($stock->count() > 0)
                    <div class="table-wrapper" style="overflow: auto">
                        <div class="product">
                            <table width="100%" class="table table-bordered display responsive  text-white">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date & Time</th>
                                        <th>Product Image</th>
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
                                        <td> {{$row->updated_at}}</td>
                                        <td>
                                            <img style="width: 100px; height:100px;"
                                                src="{{ asset('img_DB/product/image_godown/' . $row->image_godown) }}"
                                                alt="">
                                        </td>
                                        <td>{{ $row->product_name }}</td>
                                        <td>{{ $row->category->category_name }}</td>
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
                                            <a href="{{ url('admin_godown_stock_seen/'. $row->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-eye"></i> </a>

                                            <a href="{{ url('admin_godown_stock_edit/'. $row->id ) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil"></i> </a>

                                            <a href="{{ url('admin_godown_stock_delete/'. $row->id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are You Sure To Delete?')"><i
                                                    class="fa fa-trash"></i> </a>
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


    <div class="d-flex mt-5">
        {{ $stock->links() }}
    </div>
</div>

@endsection