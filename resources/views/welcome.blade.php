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
                                UNASE A LA REUNIÓN OPRIMIENDO EL BOTÓN DE ABAJO
                        </h1>
                        <!-- Button trigger modal -->
                        <strong><a class="btn btn-primary btn-xl js-scroll-trigger btn-block" style=" text-align:center; display:block;"
                                    href="{{url('https://us04web.zoom.us/j/9513005367')}}">
                            OPRIMA AQUÍ PARA UNIRSE A LA REUNIÓN
                        </a></strong> <br><br><br></br>


                        <h3 class="mb-3">
                                DAR CLICK EN EL SIGUIENTE BOTÓN Y EXPRESAR DUDAS DEL USO DE ZOOM  
                        </h3>
                        <!-- Button trigger modal -->
                        <strong><a href="{{ url('/dudas-zoom/add') }}" class="btn btn-outline btn-xl js-scroll-trigger btn-block" style=" text-align:center; display:block;">
                            OPRIMA ¡SIN MIEDO NI REMORDIMIENTOS! ESTE BOTÓN PARA ESCRIBIR SUS DUDAS
                        </a></strong> <br><br><br></br>
                        
                        
                        <h3 class="mb-3">
                                ¿AÚN NO TIENE LA APP ZOOM?
                        </h3>
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
                            <div class="device-mockup lumia920 portrait black">
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

        @include('Partials.scripts.scripts')
            
    </body>
</html>