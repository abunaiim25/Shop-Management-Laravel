@extends('layouts.admin_layout')

@section('title')
Admin - Combined Ledger
@endsection

@section('search')
{{--sesrch--}}
<ul class="navbar-nav w-100">
    <li class="nav-item w-100">

        <form action="{{url('customer_ledger_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
            {{csrf_field()}}
            <input type="text" name="search" class="form-control bg-white text-dark" placeholder="search customer">
        </form>

    </li>
</ul>
@endsection


@section('admin_content')


<div class="sl-mainpanel m-4">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Combined Ledger </p>
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
                        <h6 class="card-body-title">Combined Ledger List</h6>

                        <!-Modal-->

                            <div class="text-center">
                                <a href="" class="btn btn-info btn-rounded" data-toggle="modal"
                                    data-target="#modalLoginForm">+
                                    Create Ledger
                                </a>
                            </div>
                    </div>

                    <div class="table-wrapper" style="overflow: auto">
                        <div class="product">
                            <table class="table table-bordered display responsive  text-white">
                                <thead>
                                    <tr style="width: 100%;">
                                        <th class="w-30">Sl</th>
                                        <th>Customer Name</th>
                                        <th>Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($customer as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <!--
                                            {{ $item->combined_ledger()->latest()->first()->balance ?? 0 }}
                                        -->
                                        <td>{{ $item->latest_balance ?? 0 }} TK
                                        </td>
                                        <td>
                                            <a href=" {{ url('admin_seen_ledger/'. $item->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-eye"></i> </a>

                                            <button type="button" class="btn btn-info btn-sm editbtn"
                                                value=" {{$item->id}}">
                                                <i class="fa fa-pencil"></i>
                                            </button>

                                            <a href="{{ url('customer_ledger_delete/'. $item->id) }}"
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
</div>

<!--Create Modal-->
<form action="customer_ledger_store" method="POST">
    @csrf
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content  bg-white">
                <div class="text-center my-4">
                    <h4 class="modal-title w-100 font-weight-bold text-dark">Combined Ledger
                    </h4>
                </div>

                <div class="modal-body mx-3">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">
                                    Date
                                </label>
                                <input class="form-control bg-white" style="color: black" type="date" name="date"
                                    required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Customer Name:
                                </label>
                                <input class="form-control bg-white" style="color: black" type="text" name="name"
                                    placeholder="Naiim" required>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Customer
                                    Number</label>
                                <input class="form-control bg-white" style="color: black" type="text" name="phone"
                                    placeholder="01xxxxxxxxx" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Customer Email
                                </label>
                                <input class="form-control bg-white" style="color: black" type="text" name="email"
                                    placeholder="email@gmail.com" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">
                                    Customer Address</label>
                                <input class="form-control bg-white" style="color: black" type="text" name="address"
                                    placeholder="Dhaka, Bangladesh" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">
                                    Openning Amount
                                </label>
                                <input class="form-control bg-white" style="color: black" type="text" name="balance"
                                    placeholder="10000" required>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="d-flex justify-content-center mb-4">
                    <button class="btn btn-info">Create</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!--End Create Modal-->

<!--Edit Modal-->
<form action="{{ url('customer_ledger_update')}}" method="POST">
    @csrf
    @method('PUT')

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content  bg-white">
                <div class="text-center my-4">
                    <h4 class="modal-title w-100 font-weight-bold text-dark">Update Combined Ledger
                    </h4>
                </div>

                <div class="modal-body mx-3">
                    <div class="row">

                        <input type="hidden" id="customerLedger_id" name="customerLedger_id">

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Customer Name:
                                </label>
                                <input class="form-control bg-white" id="name" style="color: black" type="text"
                                    name="name" placeholder="Naiim" required>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Customer
                                    Number</label>
                                <input class="form-control bg-white" id="phone" style="color: black" type="text"
                                    name="phone" placeholder="01xxxxxxxxx" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Customer Email
                                </label>
                                <input class="form-control bg-white" id="email" style="color: black" type="text"
                                    name="email" placeholder="email@gmail.com" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">
                                    Customer Address</label>
                                <input class="form-control bg-white" id="address" style="color: black" type="text"
                                    name="address" placeholder="Dhaka, Bangladesh" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-center mb-4">
                    <button class="btn btn-info">Update</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!--End Edit Modal-->


<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous">
</script>
<!--Edit Modal-->
<script>
$(document).ready(function() {
    $(document).on('click', '.editbtn', function() {
        var customerLedger_id = $(this).val();
        //alert(response);
        $('#editModal').modal('show');

        $.ajax({
            type: "GET",
            url: "/customer_ledger_edit/" + customerLedger_id,
            success: function(response) {
                console.log(response.customerLedger_id);
                $('#name').val(response.customer.name);
                $('#phone').val(response.customer.phone);
                $('#email').val(response.customer.email);
                $('#address').val(response.customer.address);
                $('#customerLedger_id').val(customerLedger_id);
            }
        });
    });
});
</script>
@endsection