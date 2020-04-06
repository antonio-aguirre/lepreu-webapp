<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @yield('headContent')

    <body class="sb-nav-fixed">

        @yield('navbarContent')

        @yield('content')

        @yield('footerContent')
        
        @yield('scriptsContent')
    </body>
</html>
