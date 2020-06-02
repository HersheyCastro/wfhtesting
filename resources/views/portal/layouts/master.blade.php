
<!DOCTYPE html>
<html lang="en">

<head>
    @include('portal.partials.header')
    @yield('css')
</head>

<body>
<a href="#" class="cd-top"> </a>
@include('portal.partials.navbar')
@yield('content')
@include('portal.partials.footer')
@include('portal.partials.javascripts')
@yield('javascript')
</body>
</html>



