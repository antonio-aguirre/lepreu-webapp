<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('Partials.head.welcomeHead')

    <body id="page-top">
       
        <!-- BARRA DE NAVEGACIÓN -->
        <div class="py-4">
            @include('Partials.navbar.navbar')
        </div>

        <header class="masthead">
            <div class="h-100">
                <div class="row h-100">
                    <div class="col-lg-7 my-auto">
                        <div class="header-content mx-auto">
                        <h1 class="mb-3">
                                DAR CLICK EN EL BOTÓN DE ABAJO Y EXPRESAR DUDAS DEL USO DE ZOOM  
                        </h1>
                        <!-- Button trigger modal -->
                        <a href="{{ url('/dudas-zoom/add') }}"type="button" class="btn btn-outline btn-xl js-scroll-trigger btn-block" data-toggle="modal" data-target="#exampleModal" style=" text-align:center; display:block;">
                            OPRIMA ¡SIN MIEDO NI REMORDIMIENTOS! ESTE BOTÓN PARA LAS DUDAS
                        </a> <br><br><br></br>
                        
                        <h3 class="mb-3">
                                Reuniones 👥
                        </h3>
                        <!-- Button trigger modal -->
                        <a type="button" class="btn btn-outline btn-xl js-scroll-trigger btn-block" style=" text-align:center; display:block;">
                            PROXIMAMENTE
                        </a> <br><br><br></br>

                        <h3 class="mb-3"> DESLICE EL DEDO HACIA ARRIBA PARA DESCARGAR ZOOM </h2>
                        <strong><a
                            href="#download"
                            class="btn btn-outline btn-xl js-scroll-trigger btn-block"
                            style=" text-align:center; display:block;"
                            >OPRIMA ESTE BOTÓN PARA IR A SECCIÓN DE DESCARGAR ZOOM
                        </a></strong>
                        
                        </div>
                    </div>

                    <div class="col-lg-5 my-auto">
                        <div class="device-container">
                            <div class="device-mockup iphone6_plus portrait white">
                                <div class="device">
                                    <div class="screen">
                                        <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                        <img src="{{ asset('img/zoomApp.jpg') }}" class="img-fluid" alt="" />
                                    </div>
                                    <div class="button">
                                        <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </header>

        @include('Partials.sections.download')

        @include('Partials.footer.footer')

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>

        <!-- Plugin JavaScript -->
        <script src="{{ asset('jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for this template -->
        <script src="{{ asset('js/new-age.min.js') }}"></script>
           
    </body>
</html>