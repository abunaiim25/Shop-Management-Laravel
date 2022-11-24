@extends('layouts.admin_layout')

@section('title')
Admin - Add Invoice
@endsection

@section('admin_content')

<div class="body">
    <div class="sl-mainpanel m-4 ">
        <nav class="breadcrumb sl-breadcrumb">
            <p>Admin Panel / Add Invoice </p>
        </nav>

        <div class="sl-pagebody">
            <div class="row">

                <div class="card p-4">
                    <div class="_container">
                        <form action="product_invoice_store" method="POST">
                            @csrf
                            <div style="display: flex; justify-content: space-between;" class="mb-2">
                                <h3 class="text-dark"><strong>Add Product</strong></h3>
                            </div>

                            <div style="overflow-x: auto;">
                                <table class="_table">
                                    <thead>
                                        <tr>
                                            <th>Product Description</th>
                                            <th>Warranty</th>
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody id="table_body">
                                        <tr>
                                            <td>
                                                <input name="product_desc" type=" text" class="form_control"
                                                    placeholder="Router Tp-Link" required>
                                            </td>
                                            <td>
                                                <input name="warranty" type="text" class="form_control" placeholder="1"
                                                    required>
                                            </td>
                                            <td>
                                                <input name="price" type="text" class="form_control" placeholder="1000"
                                                    required>
                                            </td>
                                            <td>
                                                <input name="qty" type="text" class="form_control" placeholder="3"
                                                    required>
                                            </td>
                                            <td>
                                                <button class=" btn btn-success">
                                                    Save
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>



                        <form action="{{ url('place_order_invoice') }}" method="POST">
                            @csrf

                            @if ($product_invoice->count() > 0)
                            <table class="_table">
                                @foreach ($product_invoice as $row)
                                <tbody id="table_body">
                                    <tr>
                                        <td>
                                            <input name="product_desc" type=" text" class="form_control"
                                                placeholder="Router Tp-Link" value="{{ $row->product_desc }}" readonly>
                                        </td>
                                        <td>
                                            <input name="warranty" type="text" class="form_control" placeholder="1"
                                                value="{{ $row->warranty }} year" readonly>
                                        </td>
                                        <td>
                                            <input name="price" type="text" class="form_control" placeholder="1000"
                                                value="{{ $row->price }} TK" readonly>
                                        </td>
                                        <td>
                                            <input name="qty" type="text" class="form_control" placeholder="3"
                                                value="{{ $row->qty }} ({{ $row->price * $row->qty }} TK)" readonly>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin_product_invoice_delete/'. $row->id) }}"
                                                class="btn btn-sm btn-danger text-center"
                                                onclick="return confirm('Are You Sure To Delete?')">
                                                <i class="fa-solid fa-xmark"></i> Del.</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="float-right mt-2">
                                <h6 class="text-dark badge bg-secondary">Total: {{ $subtotal }} TK</h6>
                            </div>
                            @else
                            @endif


                            <h3 class="mt-5 mb-3 text-black"><strong>Accounting</strong>
                            </h3>
                            <div class="card p-3 bg-white">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Previous Due:</label>
                                            <input class="form-control bg-white" style="color: black" type="text"
                                                name="previous_due" placeholder="0" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Selling Amount:</label>
                                            <input class="form-control bg-white" style="color: black" type="text"
                                                name="subtotal" placeholder="selling amount" value="{{ $subtotal }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Collecton:</label>
                                            <input class="form-control bg-white" style="color: black" type="text"
                                                name="collecton" placeholder="0" required>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <h3 class="mt-5 mb-3 text-black"><strong>Customer Information & Data</strong>
                            </h3>
                            <div class="card p-3 bg-white">
                                <div class="row">

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Date:</label>
                                            <input class="form-control bg-white" style="color: black"
                                                type="datetime-local" name="date" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Name:</label>
                                            <input class="form-control bg-white" style="color: black" type="text"
                                                name="name" placeholder="Naiim" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Person:</label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="person" placeholder="Rayhan" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Number:</label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="phone" placeholder="01xxxxxxxxx" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Email:</label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="email" placeholder="email@gmail.com" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Address:</label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="address" placeholder="Dhaka, Bangladesh" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Ref By:</label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="ref_by" placeholder="Saddam" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">Sold By:</label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="sold_by" placeholder="Srower" required>
                                        </div>
                                    </div>
                                </div>
                                <button class=" btn btn-warning">Invoice Submit</button>
                            </div>


                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<style>
._container {
    background: white;
    width: 100%;
    margin: auto;
    padding: 15px;
    box-shadow: 0 2px 20px #0001, 0 1px 6px #0001;
    border-radius: 5px;
    overflow-x: auto;
}

._table {
    width: 100%;
    border-collapse: collapse;
}

._table :is(th, td) {
    border: 1px solid #0002;
    padding: 8px 10px;
    color: black;
}

/* form field design start */
.form_control {
    border: 1px solid #0002;
    background-color: transparent;
    outline: none;
    padding: 8px 12px;
    font-family: 1.2rem;
    width: 100%;
    color: #333;
    font-family: Arial, Helvetica, sans-serif;
    transition: 0.3s ease-in-out;
}

.form_control::placeholder {
    color: inherit;
    opacity: 0.5;
}

.form_control:is(:focus, :hover) {
    box-shadow: inset 0 1px 6px #0002;
}

/* form field design end */
.success {
    background-color: #24b96f !important;
}

.warning {
    background-color: #ebba33 !important;
}

.primary {
    background-color: #259dff !important;
}

.secondery {
    background-color: #00bcd4 !important;
}

.danger {
    background-color: #ff5722 !important;
}

.action_container {
    display: inline-flex;
}

.action_container>* {
    border: none;
    outline: none;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    padding: 8px 14px;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}

.action_container>*+* {
    border-left: 1px solid #fff5;
}

.action_container>*:hover {
    filter: hue-rotate(-20deg) brightness(0.97);
    transform: scale(1.05);
    border-color: transparent;
    box-shadow: 0 2px 10px #0004;
    border-radius: 2px;
}

.action_container>*:active {
    transition: unset;
    transform: scale(.95);
}
</style>


@endsection