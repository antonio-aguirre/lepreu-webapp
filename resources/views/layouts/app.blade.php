<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('Partials.head.welcomeHead')

    <body id="page-top">

        <!-- BARRA DE NAVEGACIÓN -->
        <div class="py-4">
            @include('Partials.navbar.navbar')
        </div>

        @yield('content')

        @include('Partials.footer.footer')
        @include('Partials.scripts.scripts')
    </body>
</html>
