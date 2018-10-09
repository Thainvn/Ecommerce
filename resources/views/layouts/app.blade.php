<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> 

</head>
<body>
    <div id="app">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-inverse navbar-laravel">
            
                <a class="navbar-brand" href="#">
                   CMS
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span> 
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    @if(Auth::check() && Auth::user()->role==1)
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{Route('home')}}">Home</a></li>
                            <li><a href="{{Route('homeAdmin')}}">Product</a></li>
                            <li><a href="{{Route('allUser')}}">User</a></li>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
          
            </nav>
        </div>
        <main class="container">
            <div class="row">
                <div class="col-xs-12">
                    @yield('content')
                </div>
            </div>

          

        </main>
    </div>
</body>
</html>
