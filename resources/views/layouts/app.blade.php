<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Lease Sentry | {{ $title }} </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('img/logo-kpknl.png')}}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    @include('partials.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('partials.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                @yield('content')
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js')}}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js')}}"></script>
    @stack('js');

</body>

</html>
