<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ace</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        .has-icons{
            display : flex;
        }
        .mb-1{
            margin-bottom: 1em;
        }
        .mr-1{
            margin-right: 1em;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Ace
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li>
                            <a href="/login">Login </a>
                        </li>
                    @else
                        <li>
                            <a>Logado como: {{ auth()->user()->nome }}</a>
                        </li>
                        <li>
                            <form action="{{ url("/logout")}}" method="POST" class="logout-form hidden">
                                {!! csrf_field() !!}
                            </form>
                            <a href="/" class="logout">Sair <i class="fa fa-exit"></i> </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @if(session('sucesso'))
        <div class="container">
            <div class="row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{session('sucesso')}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    @yield('content')
</div>

<!-- Scripts -->
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).on('click','.logout',function (e){
            e.preventDefault();
            $('.logout-form').submit();
        })
    </script>
@show
</body>
</html>
