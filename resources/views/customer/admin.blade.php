
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
        <title>Resturent app</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="_token" content="{{csrf_token()}}" />
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('style/style.css') }}" />
        <script src="{{ asset('jquery/jquery.js') }}"></script>
        <script src="{{ asset('javascript/validation.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>

<body class="admin">
    <div id="app1">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="words"><a href="/customer/home"><b>W</b><em>ord</em>s <b>O</b><em>f</em>  <b>W</b><em>isdom</em> </a></li>
                </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/customer/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/customer/list">list</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/customer/buy">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/customer/recent">Recent-oders</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative; padding-left:50px;">
                                <img src="/avatars/{{Auth::user()->avtar}}" class="profileimg">
                                Welcome | Mr {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                    {{ __('Logout') }}
                                </a></li>
                                <li><a class="dropdown-item" href="/customer/profile" ><i class="fa fa-user"></i>Profile</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>