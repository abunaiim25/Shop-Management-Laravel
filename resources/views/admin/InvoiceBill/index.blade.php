@extends('layouts.admin_layout')

@section('title')
Admin - Invoice
@endsection

@section('search')
{{--sesrch--}}
<ul class="navbar-nav w-100">
    <li class="nav-item w-100">

        <form action="{{url('shop_stock_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
            {{csrf_field()}}
            <input type="text" name="search" class="form-control bg-white text-dark" placeholder="search shop stock">
        </form>

    </li>
</ul>
@endsection


@section('admin_content')

<div class="sl-mainpanel m-4">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Shop Invoice </p>
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
                        <h6 class="card-body-title">Invoice/Bill List</h6>
                        <a href="{{url('/admin_add_invoice')}}" class=" btn btn-info mg-r-5">+ Add Invoice</a>
                    </div>

                    <div class="table-wrapper" style="overflow: auto">
                        <div class="product">
                            <table width="100%" class="table table-bordered display responsive  text-white">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Invoice No.</th>
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
                                        <td>{{$item->date}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->invoice_no }}</td>
                                        <td>{{$item->subtotal}} TK</td>
                                        <td>
                                            <a href="{{ url('admin_seen_invoicebill/'. $item->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-eye"></i> </a>

                                            <a href="{{ url('admin_place_order_invoice_edit/'. $item->id ) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil"></i> </a>

                                            <a href="{{ url('place_order_invoice_delete/'. $item->id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are You Sure To Delete?')"><i
                                                    class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>

        </div>

    </div>


    <div class="d-flex mt-5">
        {{ $invoice_bill->links() }}
    </div>
</div>

@endsection