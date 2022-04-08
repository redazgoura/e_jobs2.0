<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{-- ############################################################################### --}}

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="/DashAssets/plugins/images/favicon.png">
<!-- Custom CSS -->
<link href="/DashAssets/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
<link rel="stylesheet" href="/DashAssets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
<!-- Custom CSS -->
<link href="/DashAssets/css/style.min.css" rel="stylesheet">
<script src="/DashAssets/plugins/bower_components/jquery/dist/jquery.min.js" defer></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/DashAssets/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="/DashAssets/js/app-style-switcher.js"></script>
<script src="/DashAssets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js" defer></script>
<!--Wave Effects -->
<script src="/DashAssets/js/waves.js" defer></script>
<!--Menu sidebar -->
<script src="/DashAssets/js/sidebarmenu.js" defer></script>
<!--Custom JavaScript -->
<script src="/DashAssets/js/custom.js" defer></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="/DashAssets/plugins/bower_components/chartist/dist/chartist.min.js" defer></script>
<script src="/DashAssets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js" defer></script>
<script src="/DashAssets/js/pages/dashboards/dashboard1.js" defer></script>


{{-- ############################################################################### --}}

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Favicons -->
  <link href="/landingPageAssets/img/favicon.png" rel="icon">
  <link href="/landingPageAssets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/landingPageAssets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/landingPageAssets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/landingPageAssets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/landingPageAssets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/landingPageAssets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/landingPageAssets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/landingPageAssets/css/style.css" rel="stylesheet">

  <script src="/landingPageAssets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
  <script src="/landingPageAssets/vendor/glightbox/js/glightbox.min.js" defer></script>
  <script src="/landingPageAssets/vendor/isotope-layout/isotope.pkgd.min.js" defer></script>
  <script src="/landingPageAssets/vendor/php-email-form/validate.js" defer></script>
  <script src="/landingPageAssets/vendor/purecounter/purecounter.js" defer></script>
  <script src="/landingPageAssets/vendor/swiper/swiper-bundle.min.js" defer></script>
  <script src="/landingPageAssets/vendor/waypoints/noframework.waypoints.js" defer></script>

  <!-- Template Main JS File -->
  <script src="/landingPageAssets/js/main.js" defer></script>
    <!--###################################-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/navbar_collapse.js"></script>
    <script src="/js/createOffre.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/css/sidebar_collapse.css">
    <link rel="stylesheet" href="/css/createOffre.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield("scripts")
</head>
<body class="p-0">

    
    <div id="main" class="p-0 ">
        <div id="app" class="">
            <nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/logo/logo2.png" alt="" srcset="" style="height: 40px;width: 170px" class="my-0">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ml-3">
                                <a class="nav-link p-2" href="{{ url('/') }}">{{ __('Acceuil') }}</a>
                            </li>

                            <li class="nav-item ml-3">
                                <a class="nav-link p-2" href="/listesdesoffres">{{ __('Offres') }}</a>
                            </li>

                            {{-- <li class="nav-item ml-3">
                                <a class="nav-link p-2" href="#">{{ __('About Us') }}</a>
                            </li> --}}
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link border border-success rounded p-2" href="{{ route('login') }}">{{ __('Se Connecter') }}</a>
                                    </li>
                                @endif
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link btn-success border rounded ml-2 p-2" href="{{ route('register') }}">{{ __('Créer Compte') }}</a>
                                    </li>
                                @endif
                            @else
                            <img class="mr-1" src="/assets/profile_pics/{{Auth::user()->photo_profil}}" style="width:40px;height: 40px;;border-radius:25px;" alt="">

                                <li class="nav-item dropdown mr-3">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->nom }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        @include('includes.sidebar_collapse')
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    
                                </li>
                                
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!--SIDE BAR-->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>










</html>
