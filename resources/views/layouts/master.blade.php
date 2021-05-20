<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="DCSoftBD" />
    <meta name="generator" content="" />
    <title>Boi Chai</title>
    <link rel="canonical" href="" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png" sizes="180x180" />
    <link rel="icon" href="favicon-32x32.png" sizes="32x32" type="image/png" />
    <link rel="icon" href="favicon-16x16.png" sizes="16x16" type="image/png" />
    <link rel="manifest" href="{{ asset('mix-manifest.json') }}" />
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#563d7c" />
    <link rel="icon" href="favicon.ico" />
    <meta name="msapplication-config" content="browserconfig.xml" />
    <meta name="theme-color" content="#563d7c" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@getbootstrap" />
    <meta name="twitter:creator" content="@getbootstrap" />
    <meta name="twitter:title" content="title-of-this-page" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="social-logo.png" />
    <!-- Facebook -->
    <meta property="og:url" content="" />
    <meta property="og:title" content="title-of-this-page" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="social.png" />
    <meta property="og:image:secure_url" content="social.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/select2@4.1.0-rc.0/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/summernote-0.8.18-dist/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    @stack('link')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    @yield('app')
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2@4.1.0-rc.0/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/moment.js/2.29.1/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/summernote-0.8.18-dist/summernote-lite.js') }}"></script>
    <script src="{{ asset('js/summernote.js') }}"></script>


    <script>
        $('#zero_config').DataTable();
        $('.toggle').bootstrapToggle('enable');
        $('.selectpicker').select2();
        $('.summernote').summernote({
            height: 150,
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

    </script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    {!! Toastr::message() !!}
    @stack('script')
</body>

</html>
