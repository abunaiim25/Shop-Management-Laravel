<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Godown Stock Details</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background: #1e273b; height: 100vh">


    <div>

        <section class="container product_deatils mt-2">
            <nav>
                <p class="text-white">Godown Stock / {{ $stock->category->category_name }} /
                    {{ $stock->product_name }}
                </p>
            </nav>

            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <img class="img-fluid w-100 pb-1"
                        src="{{ asset('img_DB/product/image_godown/' . $stock->image_godown) }}" id="display_img"
                        alt="">
                </div>


                <div class="col-lg-6 col-md-12 col-12">
                    <h6 class="text-white"><b>Product Name:</b> {{ $stock->product_name }}</h6>
                    <h6 class="mt-1 text-white"><b>Category:</b> {{ $stock->category->category_name }}</h6>
                    <h6 class="mt-1 text-white"> <b>Brand: </b>{{ $stock->brand }} </h6>
                    <h6 class="mt-1 text-white"> <b>Quantity: </b>{{ $stock->product_quantity }} in stock</h6>
                    <h6 class="mt-1 text-white"> <b>Per Cost Price: </b>{{ $stock->per_cost_price }} TK</h6>
                    <h6 class="mt-1 text-white"> <b>Total Cost Price: </b>{{ $stock->total_cost_price }} TK</h6>
                    <h6 class="mt-1 text-white"> <b>Per Selling Price: </b>{{ $stock->per_selling_price }} TK</h6>
                    <h6 class="mt-1 text-white"> <b>Created Date & Time: </b>{{ $stock->created_at }} </h6>
                    <h6 class="mt-1 text-white"> <b>Updated Date & Time: </b>{{ $stock->updated_at }} </h6>
                </div>
            </div>

            <div>
                <h6 class="mt-1 text-white">
                    <b>Product Details:</b>
                </h6>
                <div style="text-align: justify;">
                    <span class="text-white">{{ $stock->description }}</span>
                </div>
            </div>

        </section>

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