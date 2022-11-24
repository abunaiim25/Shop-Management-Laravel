@extends('layouts.admin_layout')

@section('title')
Admin - Add Shop Stock
@endsection

@section('admin_content')

<div class="sl-mainpanel m-4 ">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Add Shop Stock </p>
    </nav>

    <div class="sl-pagebody">
        <div class="row">

            <div class="card p-4">
                <h6 class="card-body-title mb-4">Add New Product</h6>
                <form action="{{ url('admin_store_shop_stock') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span
                                            class="text-danger">*</span></label>
                                    <select required class="form-control select2  bg-white" style="color: black"
                                        name="category_id" data-placeholder="Choose Category">
                                        <option label="Choose category"></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                        </option>
                                        @endforeach
                                    </select>
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
                                    <label class="form-control-label">Total Cost Price: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control  bg-white" style="color: black" type="text"
                                        name="total_cost_price" placeholder="21000" required>
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


                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description <span
                                            class="text-danger">*</span></label></label>
                                    <textarea required style="color:black" rows="10" name="description" required
                                        class="form-control bg-white " id="exampleInputEmail1" cols="5"></textarea>
                                </div>
                            </div>


                            <!-- image -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Image: <span
                                            class="text-danger">*</span></label>

                                    <img id="output" style="height:250px;  color:black;" alt="Image not here">
                                    <input class="form-control" type="file" name="image" onchange="loadFile(event)"
                                        required>
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

</div>

@endsection