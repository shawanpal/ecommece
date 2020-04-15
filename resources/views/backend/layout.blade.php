<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="../assets/images/dashboard/favicon.png" type="image/x-icon">
        <link rel="shortcut icon" href="../assets/images/dashboard/favicon.png" type="image/x-icon">
        <title>Multikart - Premium Admin Template</title>

        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/fontawesome.css') }}">

        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/flag-icon.css') }}">

        <!-- Datatables css-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/datatables.css') }}">

        <!-- ico-font-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/icofont.css') }}">

        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/bootstrap.css') }}">

        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/admin.css') }}">
    </head>

    <body>

        <!-- page-wrapper Start-->
        <div class="page-wrapper">

            <!-- Page Header Start-->
            @include('backend.header')
            <!-- Page Header Ends -->

            <!-- Page Body Start-->
            <div class="page-body-wrapper">

                <!-- Page Sidebar Start-->
                @include('backend.sidebar')
                <!-- Page Sidebar Ends-->

                @yield('content')

                <!-- footer start-->
                @include('backend.footer')
                <!-- footer end-->
            </div>

        </div>

        <!-- latest jquery-->
        <script src="{{ url('public/assets/js/jquery-3.3.1.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ url('public/assets/js/popper.min.js') }}"></script>
        <script src="{{ url('public/assets/js/bootstrap.js') }}"></script>

        <!-- feather icon js-->
        <script src="{{ url('public/assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ url('public/assets/js/icons/feather-icon/feather-icon.js') }}"></script>

        <!-- Sidebar jquery-->
        <script src="{{ url('public/assets/js/sidebar-menu.js') }}"></script>

        <!--chartist js-->
        <script src="{{ url('public/assets/js/chart/chartist/chartist.js') }}"></script>

        <!--chartjs js-->
        <script src="{{ url('public/assets/js/chart/chartjs/chart.min.js') }}"></script>

        <!-- lazyload js-->
        <script src="{{ url('public/assets/js/lazysizes.min.js') }}"></script>

        <!--copycode js-->
        <script src="{{ url('public/assets/js/prism/prism.min.js') }}"></script>
        <script src="{{ url('public/assets/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ url('public/assets/js/custom-card/custom-card.js') }}"></script>

        <!--counter js-->
        <script src="{{ url('public/assets/js/counter/jquery.waypoints.min.js') }}"></script>
        <script src="{{ url('public/assets/js/counter/jquery.counterup.min.js') }}"></script>
        <script src="{{ url('public/assets/js/counter/counter-custom.js') }}"></script>

        <!--peity chart js-->
        <script src="{{ url('public/assets/js/chart/peity-chart/peity.jquery.js') }}"></script>

        <!--sparkline chart js-->
        <script src="{{ url('public/assets/js/chart/sparkline/sparkline.js') }}"></script>

        <!--dashboard custom js-->
        <script src="{{ url('public/assets/js/dashboard/default.js') }}"></script>

        <!--right sidebar js-->
        <script src="{{ url('public/assets/js/chat-menu.js') }}"></script>

        <!-- Datatable js-->
        <script src="{{ url('public/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('public/assets/js/datatables/custom-basic.js') }}"></script>

        <!--height equal js-->
        <script src="{{ url('public/assets/js/height-equal.js') }}"></script>

        <!-- lazyload js-->
        <script src="{{ url('public/assets/js/lazysizes.min.js') }}"></script>

        <!--script admin-->
        <script src="{{ url('public/assets/js/admin-script.js') }}"></script>

    </body>
</html>
