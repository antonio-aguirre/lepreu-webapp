<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('Partials.ADMINPANEL.head.adminPanelHead')
    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="assets/img/error-404-monochrome.svg" />
                                    <p class="lead"> Algo a salido mal :c </p>
                                    <a href="{{ url('/') }}"><i class="fas fa-arrow-left mr-1"></i>Regresar al inicio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
                @include('Partials.ADMINPANEL.footer.adminPanelFooter')
            </div>
        </div>
        
    </body>
</html>
