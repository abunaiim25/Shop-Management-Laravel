<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Edit Shop Stock</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background: #1e273b">

    <div class="container">
        <div class="sl-mainpanel m-4">
            <nav class="breadcrumb sl-breadcrumb">
                <p class="text-white">Admin Panel / Edit Godown Stock </p>
            </nav>

            <div class="sl-pagebody">
                <div class="row">

                    <div class="card p-4">
                        <h6 class="card-body-title mb-4">Edit Product</h6>
                        <form action="{{ url('admin_update_godown_stock', $stock->id) }}" method="POST"
                            enctype="multipart/form-data">
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
                                                name="product_name" placeholder="product name"
                                                value="{{$stock->product_name}}" required>
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class=" col-lg-4">
                                        <div class="form-group ">
                                            <label class="form-control-label">Category: <span
                                                    class="text-danger">*</span></label>
                                            <select required class="form-control select2  bg-white" style="color: black"
                                                name="category_id" data-placeholder="Choose Category">
                                                <option label="Choose category"></option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $stock->category_id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Brand: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="brand" placeholder="product brand" value="{{$stock->brand}}"
                                                required>
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Quantity: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control  bg-white" style="color: black" type="number"
                                                name="product_quantity" placeholder="product quantity"
                                                value="{{$stock->product_quantity}}" required>
                                        </div>
                                    </div><!-- col-4 -->


                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Per Cost Price: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control  bg-white" style="color: black" type="text"
                                                name="per_cost_price" placeholder=" per cost price"
                                                value="{{$stock->per_cost_price}}" required>
                                        </div>
                                    </div><!-- col-4 -->


                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Per Selling Price: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control  bg-white" style="color: black" type="text"
                                                name="per_selling_price" value="{{$stock->per_selling_price}}"
                                                placeholder="per selling price" required>
                                        </div>
                                    </div><!-- col-4 -->
                                </div><!-- row -->

                                <div class="form-layout-footer">
                                    <button class="btn btn-info my-3">Update Product</button>
                                </div><!-- form-layout-footer -->
                        </form>
                    </div><!-- form-layout -->
                </div><!-- card -->
            </div>

        </div>
    </div>


    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>