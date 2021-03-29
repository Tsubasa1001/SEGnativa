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
        <link rel="stylesheet" href="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/up/assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/up/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/up/assets/vendor/animate-css/vivify.min.css">
        <link rel="stylesheet" href="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/up/assets/vendor/c3/c3.min.css"/>
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/same/assets/css/site.min.css">

        <!-- CHARTS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js" integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

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
        <script src="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/same/assets/bundles/libscripts.bundle.js"></script>
        <script src="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/same/assets/bundles/vendorscripts.bundle.js"></script>
        <script src="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/same/assets/bundles/c3.bundle.js"></script>
        <script src="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/same/assets/bundles/mainscripts.bundle.js"></script>
        <script src="https://www.tecnoweb.org.bo/inf513/grupo06sc/SEGnativa/public/xor/same/assets/js/index.js"></script>
    </body>
</html>
