@extends('layouts.admin_layout')

@section('title')
Admin - Invoice
@endsection

@section('search')
{{--sesrch--}}
@endsection


@section('admin_content')


<div class="sl-mainpanel m-4">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Shop Invoice </p>
    </nav>



    <div class="content ">
        <div class="container text-left">
            <div class="row justify-content-center">
                <form action="{{ url('date_from_to_search') }}" method="POST" class="row">
                    @csrf
                    <div style="display: flex; justify-content:center; align-items:center">
                        <div class="mx-3" style="width:250px">
                            <div class="form-group">
                                <label for="input_from">From</label>
                                <input class="form-control bg-white text-dark p-2" type="date" width="295" name="fromDate" required placeholder="Previous Date">
                            </div>
                        </div>
                        <div style="width:250px">
                            <div class="form-group">
                                <label for="input_from">To</label>
                                <input class="form-control bg-white text-dark p-2" type="date" name="toDate" required placeholder="Last Date">
                            </div>
                    </div>
                    <button type="submit" class="btn" title="Search">
                        <i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        $('#fromDate').datepicker();
    </script>
    <script>
        $('#toDate').datepicker();
    </script>
</div>


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




            <div class=" card p-4" style="overflow: auto">

                <div style="display: flex; justify-content: space-between;" class="mb-2">
                    <h6 class="card-body-title">Invoice/Bill List</h6>

                    <div class="row">
                        <div class="my-auto">
                            <form action="{{url('invoice_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
                                {{csrf_field()}}

                                <div class="input-group ">
                                    <input type="search" name="invoice_search" id="invoice_search" class=" form-control bg-white text-dark " placeholder="search customer">
                                    <button type="submit" class="btn" title="Search">
                                        <i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>

                            </form>
                        </div>
                        <div class="my-auto">
                            <a href="{{url('/admin_add_invoice')}}" class=" btn btn-info btn-rounded">+
                                Invoice</a>
                        </div>
                    </div>

                </div>

                <div class="table-wrapper" style="overflow: auto">
                    <div class="product">
                        <table width="100%" class="table table-bordered display responsive  text-white">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Date (M/D/Y)</th>
                                    <th>Invoice No.</th>
                                    <th>Customer Name</th>
                                    <th>Number</th>
                                    <th>Selling Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <style>

                                </style>
                                @foreach ($invoice_bill as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->date)->format('m/d/Y')}}</td>
                                    <td>{{ $item->invoice_no ?? 0 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{$item->subtotal ?? 0 }} TK</td>
                                    <td>
                                        <a href="{{ url('admin_seen_invoicebill/'. $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-eye"></i> </a>
                                        <!-- <a href="{{ url('admin_place_order_invoice_edit/'. $item->id ) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil"></i> </a>
                                            -->
                                        <a href="{{ url('place_order_invoice_delete/'. $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- table-wrapper -->
            </div><!-- card -->



            <div class="row mt-4">
                <div class="col-sm-12 grid-margin">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="">Total Selling Amount</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0 ">{{$subtotal}} TK</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">By {{$bill_count}} Invoice Bill</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<div class="d-flex mt-5">
    {{ $invoice_bill->links() }}
</div>
</div>




@endsection