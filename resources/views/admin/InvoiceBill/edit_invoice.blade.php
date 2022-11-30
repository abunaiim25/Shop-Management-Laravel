<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Shop Stock Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>


<body style="background: #1e273b; height: 100vh">


    <div class="body">
        <div class="sl-mainpanel m-4 ">
            <nav class="breadcrumb sl-breadcrumb">
                <p class="text-white">Admin Panel / Edit Invoice </p>
            </nav>

            <div class="sl-pagebody">
                <div class="row">

                    <div class="card p-4">
                        <div class="_container">
                            <div style="display: flex; justify-content: space-between;" class="mb-2">
                                <h3 class="text-dark"><strong>Edit Product</strong></h3>
                            </div>

                            <form action="{{ url('place_order_invoice_updated/'.$invoice->id) }}" method="POST">
                                @csrf

                                @if ($product->count() > 0)
                                <div style="overflow-x: auto;">
                                    <table class="_table">
                                        <thead>
                                            <tr>
                                                <th>Product Description</th>
                                                <th>Warranty</th>
                                                <th>Product Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>

                                        @foreach ($product as $row)
                                        <tbody id="table_body">
                                            <tr>

                                                <input name="prodId[]" type="hidden" class="form_control"
                                                    placeholder="Router Tp-Link" value="{{ $row->id }}" required>

                                                <td>
                                                    <input name="product_desc[]" type=" text" class="form_control"
                                                        placeholder="Router Tp-Link" value="{{ $row->product_desc }}"
                                                        required>
                                                </td>
                                                <td>
                                                    <input name="warranty[]" type="text" class="form_control"
                                                        placeholder="1" value="{{ $row->warranty }}" required>
                                                </td>
                                                <td>
                                                    <input name="price[]" type="text" class="form_control"
                                                        placeholder="1000" value="{{ $row->price }}" required>
                                                </td>
                                                <td>
                                                    <input name="product_qty[]" type="text" class="form_control"
                                                        placeholder="3" value="{{ $row->product_qty }}" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                @else
                                @endif


                                <h3 class="mt-5 mb-3 text-black"><strong>Accounting</strong>
                                </h3>
                                <div class="card p-3 bg-white">

                                    <input class="form-control bg-white" style="color: black" type="text"
                                        name="subtotal" value="{{ $subtotal }}" placeholder="0" required>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Previous
                                                    Due:</label>
                                                <input class="form-control bg-white" style="color: black" type="text"
                                                    name="previous_due" value="{{ $invoice->previous_due }}"
                                                    placeholder="0" required>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Collecton:</label>
                                                <input class="form-control bg-white" style="color: black" type="text"
                                                    name="collecton" placeholder="0" value="{{ $invoice->collecton }}"
                                                    required>
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
                                                <input class="form-control bg-white" style="color: black" type="date"
                                                    name="date" value="{{ $customer_information->date }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Name:</label>
                                                <input class="form-control bg-white" style="color: black" type="text"
                                                    name="name" placeholder="name"
                                                    value="{{ $customer_information->name }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Person:</label>
                                                <input class="form-control bg-white " style="color: black" type="text"
                                                    name="person" placeholder="person"
                                                    value="{{ $customer_information->person }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Number:</label>
                                                <input class="form-control bg-white " style="color: black" type="text"
                                                    name="phone" placeholder="number"
                                                    value="{{ $customer_information->phone }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Email:</label>
                                                <input class="form-control bg-white " style="color: black" type="text"
                                                    name="email" placeholder="email"
                                                    value="{{ $customer_information->email }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Address:</label>
                                                <input class="form-control bg-white " style="color: black" type="text"
                                                    name="address" placeholder="address"
                                                    value="{{ $customer_information->address }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Ref By:</label>
                                                <input class="form-control bg-white " style="color: black" type="text"
                                                    name="ref_by" placeholder="ref by"
                                                    value="{{ $customer_information->ref_by }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label text-dark">Sold By:</label>
                                                <input class="form-control bg-white " style="color: black" type="text"
                                                    name="sold_by" placeholder="sold by"
                                                    value="{{ $customer_information->sold_by }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button class=" btn btn-warning mt-4">Invoice Update</button>
                                </div>


                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap script -->
    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>


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