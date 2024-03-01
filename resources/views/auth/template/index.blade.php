<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Platform Sistem Informasi E-Learning & SIAKAD Unimasika' }}</title>
    <link rel="stylesheet" href="/main-assets/css/styles.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .form-card-size {
            width: 75%;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        @media only screen and (max-width: 600px) {
            .form-card-size {
                width: 100%;
            }
        }
    </style>
</head>

<body class="font-poppins">
    @yield('auth-content')
    <script src="/main-assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/main-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
