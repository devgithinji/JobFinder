<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="{{secure_asset('js/app.js')}}"></script>
    @include('partials.head')
</head>
<body>
<div class="site-wrap" >
    @include('partials.mobile_site_menu')
    @include('partials.nav')
    <br>
    @yield('content')
    @include('partials.footer')
</div>
@include('partials.js')
</body>
</html>
