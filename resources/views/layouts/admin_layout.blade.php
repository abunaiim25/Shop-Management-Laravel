{{-- admin --}}
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/myadmin/admin.css">

    <link rel="shortcut icon" href="{{ asset('frontend') }}/image/logo2.png" alt="" />

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/admin.css">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--new font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="">
    <div class="container-scroller">

        @include('layouts.admin_inc.sidebar')

        <div class="container-fluid page-body-wrapper">

            @include('layouts.admin_inc.navbar')

            <div class="main-panel " style="background: #1e273b">

                @yield('admin_content')
                {{-- @include('layouts.admin_inc.footer') --}}
            </div>
        </div>
    </div>





    <script src="{{ asset('admin') }}/myadmin/main.js"></script>

    <script src="{{ asset('admin') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('admin') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('admin') }}/assets/js/misc.js"></script>
    <script src="{{ asset('admin') }}/assets/js/settings.js"></script>
    <script src="{{ asset('admin') }}/assets/js/todolist.js"></script>
    <script src="{{ asset('admin') }}/assets/js/dashboard.js"></script>
    <script src="{{ asset('admin') }}/assets/lib/medium-editor/medium-editor.js"></script>
    <script src="{{ asset('admin') }}/assets/lib/summernote/summernote-bs4.min.js"></script>



    <!--https://sweetalert.js.org/guides/-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status_swal'))
    <script>
        swal("{{ session('status_swal') }}");
    </script>
    @endif



    <!--Product Autocomplite search-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT
        2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#search_stock_product_name").autocomplete({
                source: availableTags
            });
        }
    </script>

    <!--End Product Autocomplite search-->


    <!--Invoice Autocomplite search-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT
        2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/invoice_autocomplete_search",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#invoice_search").autocomplete({
                source: availableTags
            });
        }
    </script>
    <!--End Invoice Autocomplite search-->

    <!--Combined Ledger Autocomplite search-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT
        2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/ledger_autocomplete_search",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#customer_ledger_search").autocomplete({
                source: availableTags
            });
        }
    </script>
    <!--End Combined Ledger Autocomplite search-->

    <!--Stock Autocomplite search-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT
        2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/stock_autocomplete_search",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#shop_stock_search").autocomplete({
                source: availableTags
            });
        }
    </script>
    <!--End stock Autocomplite search-->

    <!--Godown Autocomplite search-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT
        2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/godownstock_autocomplete_search",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#godown_stock_search").autocomplete({
                source: availableTags
            });
        }
    </script>
    <!--End Godown Autocomplite search-->

    <!--Contact Autocomplite search-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT
        2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/contact_autocomplete_search",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#contact_search").autocomplete({
                source: availableTags
            });
        }
    </script>
    <!--End Contact Autocomplite search-->


    <!--User Autocomplite search-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT
        2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/user_autocomplete_search",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#search_user").autocomplete({
                source: availableTags
            });
        }
    </script>
    <!--End User Autocomplite search-->

    <!--Admin Autocomplite search-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT
        2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/admin_autocomplete_search",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#search_admin").autocomplete({
                source: availableTags
            });
        }
    </script>
    <!--End Admin Autocomplite search-->
</body>

</html>