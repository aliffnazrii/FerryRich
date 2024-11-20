<!doctype html>
<html lang="en" data-bs-theme="semi-dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default Title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">

    <!-- Loader -->
    <link rel="stylesheet" href="{{ asset('assets/css/pace.min.css') }}">
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/metismenu/mm-vertical.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/main.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/dark-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/blue-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/responsive.css') }}">


</head>

<body>

    @yield('header')
    <main>
        @yield('content')

    </main>
</body>

</html>
