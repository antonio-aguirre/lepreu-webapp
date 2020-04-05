<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @yield('headContent')

    <body id="page-top">

        <!-- BARRA DE NAVEGACIÓN -->
        <div class="py-4">
            @include('Partials.navbar.navbar')
        </div>

        @yield('content')

        @include('Partials.footer.footer')
        
        @yield('scriptsContent')
    </body>
</html>
