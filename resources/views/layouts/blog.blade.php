<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>Bootstrap Free Blog Template</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Navigation Section -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarContent" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/blog">Blog</a>
        </div>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ '/user' }}"><i class="fa fa-sign-in"></i> {{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ '/user' }}"><i class="fa fa-user-plus"></i> {{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content Section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <form action="{{ route('blog.search') }}" method="GET" class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search posts...">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </form>

                @yield('content')
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
