<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Rumah Konsultasi</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('argon/img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('argon/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('argon/css/argon.css?v=1.2.0')}}" type="text/css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->

    <script src="{{asset('argon/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('argon/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('argon/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('argon/js/argon.js?v=1.2.0')}}"></script>



</head>
<body class="bg-default">
  <div id="app">
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('argon/img/brand/white.png')}}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                <img src="{{asset('argon/img/brand/blue.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <hr class="d-lg-none" />

        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          @guest
              @if (Route::has('login'))
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          @endif

          @if (Route::has('register'))
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>
          @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        <main class="py-6">
            @yield('content')
        </main>
      </div>
</body>
</html>
