<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Donasi Yuk - @yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @stack('styles')
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark primary-bg-color shadow-none">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Donasi Yuk
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/aboutus')}}">About Us</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login/options')}}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/register/options')}}">{{ __('Daftar') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if( Auth::user()->profile->photo)
                                <img src="{{asset( Auth::user()->profile->photo() )}}" width="28" height="28"
                                    class="rounded-circle mr-2" alt="Profile Image">

                                @else
                                <h1 style="font-size : 10px" id="userIcon">
                                    <i class="fas fa-user"></i>
                                </h1>
                                <p class="text-center">
                                    <img src="" alt="Profile Preview" class="profile-image d-none rounded-circle">
                                </p>

                                @endif
                                @if(Auth::user() && Auth::user()->type == 'orphanage')
                                {{ Auth::user()->orphanage->name }}
                                @else
                                {{ Auth::user()->name }}
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">



                                @if(Auth::user() && Auth::user()->type == 'orphanage')

                                <a class="dropdown-item" href="{{ url('/orphanage') }}">
                                    <i class="fas fa-home mr-3"></i>Kelola Panti
                                </a>
                                @else
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    <i class="fas fa-user mr-3"></i>Profil Kamu
                                </a>
                                @endif

                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off text-danger mr-3"></i> Logout
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


        @yield('content')



    </div>

    <footer class="page-footer font-small primary-bg-color">

        <!-- Footer Links -->
        <div class="container pt-3 text-center text-md-left mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-6 mx-auto mb-4">
                    <h6 class="font-weight-bold">Our Vision</h6>
                    <h4 class="mt-3">
                        Bahagia itu sederhana<br>
                        Bebaskan hati dan saling berbagi!
                    </h4>
                </div>
                <!-- Grid column -->
                <div class="col-md-6 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Kontak</h6>
                    <hr class="white mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;" />

                    <div class="d-flex justify-content-start">
                        <div>
                            <i class="fas fa-home mr-3"></i>
                        </div>
                        <div>
                            <p>Jl. Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Kec.
                                Dayeuhkolot, Kota Bandung, Jawa Barat 40257</p>
                        </div>
                    </div>

                    <p>
                        <i class="fas fa-envelope mr-3"></i>
                        info@donasiyuk.id
                    </p>
                    <p><i class="fas fa-phone mr-3"></i>+628123123123123</p>

                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->
    </footer>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
    </script>
    @stack('scripts')
</body>

</html>
