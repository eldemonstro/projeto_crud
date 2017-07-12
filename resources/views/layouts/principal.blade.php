<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CRUD - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/main.css') !!}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong>Home</strong>
                        </a>
                </div>
                <ul class='nav navbar-nav'>
                    <li ><a href="@yield('path')/produtos">Produtos</a></li>
                    <li ><a href="@yield('path')/clientes">Clientes</a></li>
                    <li ><a href="@yield('path')/pedidos">Pedidos</a></li>
                </ul>

                
            </div>
        </nav>
        <div class='container'>
            
        @include('layouts.mensagem')
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {!! Html::script('js/parsley.js') !!}
    {!! Html::script('js/pt-br.js') !!}
    {!! Html::script('js/jquery.mask.min.js') !!}
    {!! Html::script('js/main.js') !!}
</body>
</html>
