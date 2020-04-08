<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @yield('headContent')

    <body id="page-top">

        @yield('navbarContent')

        @yield('content')

        @yield('footerContent')
        
        @yield('scriptsContent')
    
    </body>
</html>
