<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default Title')</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet">
    <script src="assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
    <!--bootstrap css-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="sass/main.css" rel="stylesheet">
    <link href="sass/dark-theme.css" rel="stylesheet">
    <link href="sass/blue-theme.css" rel="stylesheet">
    <link href="sass/responsive.css" rel="stylesheet">

</head>

<body>

@yield('header')
    <main>
        @yield('content')

    </main>
</body>

</html>