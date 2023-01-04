@extends('layouts.admin_layout')

@section('title')
Admin - Add Godown Stock
@endsection

@section('admin_content')

<div class="sl-mainpanel m-4 ">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Add Godown Stock </p>
    </nav>

    <div class="sl-pagebody">
        <div class="row">

            <div class="card p-4">
                <h6 class="card-body-title mb-4">Add New Product</h6>
                <form action="{{ url('admin_store_godown_stock') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="row mg-b-25">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control bg-white " style="color: black" type="text"
                                        name="product_name" placeholder="Router22" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="form-control-label">Category: <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group mg-b-10-force">
                                            <select required class="form-control select2  bg-white" style="color: black"
                                                name="category_id" data-placeholder="Choose Category">
                                                <option label="Choose category"></option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-info btn-rounded" data-toggle="modal"
                                            data-target="#modalLoginForm">+
                                        </a>
                                    </div>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="text-danger">*</span></label>
                                    <input class="form-control bg-white " style="color: black" type="text" name="brand"
                                        placeholder="TP-Link" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control  bg-white" style="color: black" type="number"
                                        name="product_quantity" placeholder="30" required>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Per Cost Price: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control  bg-white" style="color: black" type="text"
                                        name="per_cost_price" placeholder="700" required>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Per Selling Price: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control  bg-white" style="color: black" type="text"
                                        name="per_selling_price" placeholder="1000" required>
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Add Product</button>
                        </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->
        </div><!-- card -->
    </div>


    <form action="{{ url('admin_store_category') }}" method="POST">
        @csrf
        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content  bg-white">
                    <div class="text-center my-4">
                        <h4 class="modal-title w-100 font-weight-bold text-dark">Category
                        </h4>
                    </div>

                    <div class="modal-body mx-3">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <input class="form-control bg-white" style="color: black" type="text"
                                        name="category_name" placeholder="category" required>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class=" d-flex justify-content-center mb-4">
                        <button class="btn btn-info">Add</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

@endsection