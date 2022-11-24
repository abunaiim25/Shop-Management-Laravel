<html>

<head>
    <meta charset="utf-8">
    <title>{{$customer->name}}-Ledger</title>
    <link rel="stylesheet" href="style.css">
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


</head>

<body style="background: #999; height: 100vh">

    <div style="display: flex; justify-content:center;" class=" mt-4">
        <div style="display: flex; justify-content: space-between; width:8.5in;" class="mb-2">
            <h6 class="card-body-title text-white">Combined Ledger / {{$customer->name}}</h6>

            <div class="div">
                <button type="button" class="btn btn-success btn-sm " data-bs-toggle="modal"
                    data-bs-target="#debitModal">
                    Debit
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#creditModal">
                    Credit
                </button>
            </div>
        </div>
    </div>

    <div class="body">
        <div style="padding:30px">
            <header>
                <h2 style=" display:flex; justify-content:center; text-transform:uppercase; font-weight: bold;
                    margin-bottom:10px">
                    Shopno
                    Enterprise</h2>

                <div style="line-height: 0px; ">
                    <p style="display:flex; justify-content:center; font-size:12px;">Address: Lorem ipsum dolor
                        sit
                        amet
                        consectetur adipisicing elit. Cupiditate, voluptates.
                    </p>
                    <p style="display:flex; justify-content:center; font-size:12px;">
                        Service Hot Line: 01812112395, 01812112395. cell: 01812112395</p>
                    <p style="display:flex; justify-content:center; font-size:12px;">Email: naiim@gmail.com,
                        naiim@gmail.com, naiim@gmail.com
                    </p>
                    <p style="display:flex; justify-content:center; font-size:12px;">Visit:
                        www.shonnoenterprise.com
                    </p>
                </div>
            </header>

            <h5 class="text-center p-1 my-4" style="background: #999; color:white">Combined Ledger</h1>

                <div style=" line-height: 7px; margin-bottom: 20px">
                    <p>
                        <b>Buyer Name: </b>
                        {{$customer->name}}
                    </p>
                    <p>
                        <b>Mobile: </b>
                        {{$customer->phone}}
                    </p>
                    <p>
                        <b>Email: </b>
                        {{$customer->email}}
                    </p>
                    <p>
                        <b>Address: </b>
                        {{$customer->address}}
                    </p>
                </div>

                <table class="table table-borderless">
                    <thead class="table-bordered">
                        <tr>
                            <th class="fw-bold" scope=" col">SI</th>
                            <th class="fw-bold" scope="col">Date</th>
                            <th class="fw-bold" scope="col">Particulars</th>
                            <th class="fw-bold" scope="col">Referance No.</th>
                            <th class="fw-bold" scope="col">Debit(TK)</th>
                            <th class="fw-bold" scope="col">Credit(TK)</th>
                            <th class="fw-bold" scope="col">Balance(TK)</th>
                        </tr>
                    </thead>


                    <tbody class="table-bordered">
                        @foreach ($ledger as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->particulars}}</td>
                            <td>{{$item->referance_no}}</td>
                            <td>{{$item->debit}}</td>
                            <td>{{$item->credit}}</td>
                            <td>{{$item->balance}}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="fw-bold">
                                <hr>Total:
                            </td>
                            <td class="fw-bold">
                                <hr>{{$debit}} (D)
                            </td>
                            <td class="fw-bold">
                                <hr>{{$credit}} (C)
                            </td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
        </div>


        <!-- Debit Modal -->
        <div class="modal fade" id="debitModal" tabindex="-1" aria-labelledby="debitModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center my-4">
                            <h4 class="modal-title w-100 font-weight-bold text-dark">
                                Debit Amount
                            </h4>
                        </div>
                        <form action="{{ url('customer_ledger_debit/'.$customer->id) }}" method="POST">
                            @csrf
                            <div class="modal-body mx-3">
                                <div class="row">
                                    <input type="hidden" value="{{$customer->id}}" name="customerLedger_id">
                                    <input type="hidden" value="{{$customer->latest_balance}}" name="balance">

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">
                                                Date
                                            </label>
                                            <input class="form-control bg-white" style="color: black" type="date"
                                                name="date" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">
                                                Amount
                                            </label>
                                            <input class="form-control bg-white" style="color: black" type="text"
                                                name="debit" placeholder="10000" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mb-4">
                                <button class="btn btn-success">Debit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Credit Modal -->
        <div class="modal fade" id="creditModal" tabindex="-1" aria-labelledby="creditModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center my-4">
                            <h4 class="modal-title w-100 font-weight-bold text-dark">
                                Credit Amount
                            </h4>
                        </div>
                        <form action="{{ url('customer_ledger_credit/'.$customer->id) }}" method="POST">
                            @csrf
                            <div class="modal-body mx-3">
                                <div class="row">
                                    <input type="hidden" value="{{$customer->id}}" name="customerLedger_id">
                                    <input type="hidden" value="{{$customer->latest_balance}}" name="balance">

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">
                                                Date
                                            </label>
                                            <input class="form-control bg-white" style="color: black" type="date"
                                                name="date" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark">
                                                Amount
                                            </label>
                                            <input class="form-control bg-white" style="color: black" type="text"
                                                name="credit" placeholder="10000" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mb-4">
                                <button class="btn btn-danger">Credit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:flex; justify-content:center; margin-bottom:20px; margin-top: 10px;">
            <div
                style="height:30px; width:150px; background:#000; display:flex; justify-content:center; align-items:center">
                <a style="color:#FFF; text-decoration:none" href="javascript:window.print()"> Print or Download</a>
            </div>
        </div>
    </div>




    <style>
    html {
        font: 16px/1 ' Open Sans', sans-serif;
        overflow: auto;
        background: #999;
        cursor: default;
    }

    .body {
        box-sizing: border-box;
        height: 11in;
        margin: 0 auto;
        overflow: hidden;
        width:
            8.5in;
        background: #FFF !important;
        border-radius: 1px;
    }
    </style>


</body>

</html>