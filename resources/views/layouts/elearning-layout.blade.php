<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url()->current() }}">
    <title>{{ $title ?? env('APP_NAME') }}</title>
    <link rel="shortcut icon" type="image/png" href="/main-assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/main-assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .font-poppins {
            font-family: 'Poppins', sans-serif;
            font-weight: 500
        }

        #display_image_div img {
            max-width: 100%;
        }

        #cropped_image_result img {
            max-width: 100%;
        }

        .cropper-view-box,
        .cropper-face {
            border-radius: 50%;
        }

        .crop_result {
            width: 1px !important;
        }
    </style>
</head>

<body class="font-poppins">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('layouts.partials.sidebar')
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('layouts.partials.navbar')
            <!--  Header End -->
            <div class="container-fluid">
                @session('success')
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {!! $value !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endsession
                @session('error')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {!! $value !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endsession
                @yield('content')
                <div class="py-6 px-6 text-center">
                    <p class="mb-0 fs-4">&copy;Copyright by <a href="" target="_blank"
                            class="pe-1 text-primary text-decoration-underline">unimasika.ac.id</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="/main-assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <script src="/js/custom.js"></script>
    <script src="/js/cropper.js"></script>
    <script src="/main-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/main-assets/js/sidebarmenu.js"></script>
    <script src="/main-assets/js/app.min.js"></script>
    <script src="/main-assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/main-assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="/main-assets/js/dashboard.js"></script>
</body>

</html>
