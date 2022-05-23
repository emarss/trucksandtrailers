<!DOCTYPE html>
<html>
<head>
    <title>{{ config("app.name") }} - @yield('title')</title>
    @include('includes.head')
    @yield('styles')
</head>
<body>
    <div id="page">
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
    </div>
    @include('includes.scripts')
    @yield('scripts')
</body>
</html>
