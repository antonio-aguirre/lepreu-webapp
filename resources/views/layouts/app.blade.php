<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @yield('headContent')

    <!-- BODY-->
    @yield('navbarContent')

    @yield('content')

    @yield('footerContent')
    
    @yield('scriptsContent')
    <!-- END_BODY-->
    
</html>
