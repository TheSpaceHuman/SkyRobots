<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="bda474c14520a6f8" />
    <link rel="icon" href="images/favicon.png" type="image/png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <the-preloader>
            @include('includes.header')
            <main class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            @include('includes.aside')
                        </div>
                        <div class="col-12 col-md-9">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
            @include('includes.footer')
        </the-preloader>
    </div>
    @include('partials.notifications.validateAlert')
</body>
</html>
