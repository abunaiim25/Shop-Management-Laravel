@extends('layouts.admin_layout')

@section('title')
Admin - Dashboard
@endsection


@section('search')
{{--sesrch--}}
@endsection


@section('admin_content')
<div class="sl-mainpanel m-4">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Dashboard </p>
    </nav>

    <div class="sl-pagebody">

        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <a style="text-decoration: none;" href="{{url('admin_invoice_bill')}}" target="_blank">
                        <div class="card-body">
                            <h5 class="text-black">Sales</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0 text-black">{{$subtotal}} TK</h2>
                                        <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">By {{$invoice}} invoice bill</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <a style="text-decoration: none;" href="{{url('users')}}" target="_blank">
                        <div class="card-body">
                            <h5 class="text-black">Users</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0 text-black">{{ $user }}</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Total People are {{$people}}</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <a style="text-decoration: none;" href="{{url('admins')}}" target="_blank">
                        <div class="card-body">
                            <h5 class="text-black">Admins</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0 text-black">{{ $admin }}</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Total People are {{$people}}</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card p-4" style="overflow: auto">

                    <!-------------------------------Sidebar review------------------------------>
                    <div class="row ">

                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="card l-bg-cherry">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-money-bill"></i></div>
                                    <a style="text-decoration: none;" href="{{url('admin_invoice_bill')}}" target="_blank">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start ">
                                                    <h6 class="mb-0 text-white">Invoice/Bill</h6>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="text-white">{{ $invoice }}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="card l-bg-blue-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                                    <a style="text-decoration: none;" href="{{url('admin_combined_ledger')}}" target="_blank">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start ">
                                                    <h6 class="mb-0 text-white">Transaction</h6>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="text-white">{{ $ledger_customer }}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                                    <a style="text-decoration: none;" href="{{url('admin_shop_stock')}}" target="_blank">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h6 class="mb-0 text-white">Shop Stock</h6>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="text-white">{{ $stock }}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="card l-bg-orange-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-shop"></i></div>
                                    <a style="text-decoration: none;" href="{{url('admin_godown_stock')}}" target="_blank">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h6 class="mb-0 text-white">Godown Stock</h6>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="text-white">{{ $godown }}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="card l-bg-orange-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-comment"></i></div>
                                    <a style="text-decoration: none;" href="{{url('admin_contact')}}" target="_blank">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h6 class="mb-0 text-white">Contact </h6>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="text-white">{{ $contact }}
                                            <span class="badge badge-danger"><small>{{ $contact_unseen }} unseen
                                                </small></span>
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <a style="text-decoration: none;" href="{{url('admins')}}" target="_blank">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start ">
                                                    <h6 class="mb-0 text-white">Admins</h6>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="text-white">{{ $admin }}
                                        </h1>

                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="card l-bg-blue-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <a style="text-decoration: none;" href="{{url('users')}}" target="_blank">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start ">
                                                    <h6 class="mb-0 text-white">Users</h6>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="text-white">{{ $user }}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="card l-bg-cherry">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-list"></i></div>
                                    <a style="text-decoration: none;" href="{{url('admins')}}" target="_blank">

                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h6 class="mb-0 text-white">Category</h6>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="text-white">{{ $category }}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-------------------------------Chart------------------------------>
        <!--
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php echo $chartData ?>
                ]);

                var options = {
                    title: 'Product Sales Activities',
                    is3D: true,
                    //legend: 'none',
                    pieSliceText: 'label',
                    slices: {
                        4: {
                            offset: 0.2
                        },
                        12: {
                            offset: 0.3
                        },
                        14: {
                            offset: 0.4
                        },
                        15: {
                            offset: 0.5
                        },
                    },

                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>

        <div id="piechart" style="height: 500px;"></div>
        -->
    </div>
</div>



<style>
    .card {
        background-color: #fff;
        border-radius: 10px;
        border: none;
        position: relative;
        margin-bottom: 30px;
        box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
    }

    .l-bg-cherry {
        background: linear-gradient(to right, #493240, #f09) !important;
        color: #fff;
    }

    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }

    .l-bg-green-dark {
        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
        color: #fff;
    }

    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }

    .card .card-statistic-3 .card-icon-large .fas,
    .card .card-statistic-3 .card-icon-large .far,
    .card .card-statistic-3 .card-icon-large .fab,
    .card .card-statistic-3 .card-icon-large .fal {
        font-size: 110px;
    }

    .card .card-statistic-3 .card-icon {
        text-align: center;
        line-height: 50px;
        margin-left: 15px;
        color: #000;
        position: absolute;
        right: -5px;
        top: 20px;
        opacity: 0.1;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }

    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }
</style>
@endsection