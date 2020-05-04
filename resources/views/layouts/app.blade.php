<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @yield('headContent')

    <body id="page-top">

        @yield('navbarContent')
        
        <span>
            <!-- Mensajes de alerta por validaciones -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" style="border-radius: 6px; text-align:left;">
                    <div class="container-fluid">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>    
                </div>
            @endif
            <!-- Para los mensajes y mande su alerta -->
            @if (Session::has('message'))
            <div class="{{ Session::get('alert-class') }} alert-dismissible fade show" ng-if="message">
                <div class="container-fluid">
                    <li>{{ Session::get('message') }}</li>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            </div>
            @endif
        </span>

        @yield('content')

        @yield('footerContent')
        
        @yield('scriptsContent')
    
    </body>
</html>
