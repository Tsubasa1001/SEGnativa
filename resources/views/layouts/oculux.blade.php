<!doctype html>
<html lang="es">

    <head>

        @yield('titulo')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
        <meta name="keywords" content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
        <meta name="author" content="GetBootstrap, design by: puffintheme.com">

        <!-- ICON -->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="http://segnativa.test/xor/up/assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://segnativa.test/xor/up/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://segnativa.test/xor/up/assets/vendor/animate-css/vivify.min.css">
        <link rel="stylesheet" href="http://segnativa.test/xor/up/assets/vendor/c3/c3.min.css"/>
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="http://segnativa.test/xor/same/assets/css/site.min.css">
    </head>

    <body class="theme-cyan font-montserrat">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
            </div>
        </div>

        <!-- Theme Setting -->
        @include('layouts.oculux.personalizacion')

        <!-- Overlay For Sidebars -->
        <div class="overlay">
        </div>

        <div id="wrapper">

            @include('layouts.oculux.navbar')
            @include('layouts.oculux.search')
            @include('layouts.oculux.message')
            @include('layouts.oculux.barraIzquierda')

            <div id="main-content">
                <div class="container-fluid">
                    @yield('dinamico')
                </div>
            </div>

        </div>

        <!-- Javascript -->
        <script src="http://segnativa.test/xor/same/assets/bundles/libscripts.bundle.js"></script>
        <script src="http://segnativa.test/xor/same/assets/bundles/vendorscripts.bundle.js"></script>
        <script src="http://segnativa.test/xor/same/assets/bundles/c3.bundle.js"></script>
        <script src="http://segnativa.test/xor/same/assets/bundles/mainscripts.bundle.js"></script>
        <script src="http://segnativa.test/xor/same/assets/js/index.js"></script>
    </body>
</html>
