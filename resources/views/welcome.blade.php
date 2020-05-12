@extends('layouts.app')

@section('headContent')
    @section('page-title','Bienvenido')
    @include('Partials.head.welcomeHead')
@endsection

@section('navbarContent')
    <!-- BARRA DE NAVEGACIÓN -->
    <div class="py-4">
        @include('Partials.navbar.navbar')
    </div>
@endsection


@section('content')

    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-6 my-auto">
                    <div class="header-content mx-auto">

                        <!-- NOTICIAS -->
                        <div class="alert alert-secondary">
                            <div class="container-fluid">
                                <a href="" style="color:black;"> <b>Gracias hn@s. por darle utilidad a este proyecto 🥳</b> </a>
                                <a type="button" class="close" data-dismiss="alert">&times;</a>
                            </div>
                        </div>
                            
                        
                        @if(count($links_principal)>0)
                            @foreach($links_principal as $link_principal)

                            <h2 class="mb-3">
                                UNASE A LA REUNIÓN OPRIMIENDO EL BOTÓN <b style="color:blue;"><i>AZUL</i></b>
                             </h2>

                            <a class="btn btn-outline js-scroll-trigger" style=" text-align:center; display:block; background-color:blue;"
                                        href="{{ url('https://us04web.zoom.us/j/'.$link_principal->data.'')}}">
                                <i class="fas fa-video"></i>
                            </a>
                            @endforeach
                        @else
                            <div class="alert alert-warning" role="alert">
                                <i class="fas fa-info-circle"></i> Disculpe el inconveniente.
                                <hr>
                                <p>Link para unirse a <i>reunión</i> NO añadido. Consulte a un anciano para más información.</p>
                            </div>
                        @endif

                        <br>
                        
                        @if(count($links_servicio)>0)
                            @foreach($links_servicio as $link_servicio)
                                <h2 class="mb-3">
                                        UNASE A LA REUNIÓN <u>DE SERVICIO</u> OPRIMIENDO EL BOTÓN <b style="color:#1AC406;"><i>VERDE</i></b>
                                </h2> 
                                <a class="btn btn-outline js-scroll-trigger" style=" text-align:center; display:block; background-color:green;"
                                    href="{{ url('https://us04web.zoom.us/j/'.$link_servicio->data.'')}}">
                                    <i class="fas fa-users"></i>
                                </a>
                            @endforeach
                            <br>
                        @endif
                        
                        <!--
                        <h3 class="mb-3">
                                DAR CLICK EN EL BOTÓN <b style="color:orange;"><i>NARANJA</i></b> PARA ESCRIBIR SUS DUDAS DEL USO DE ZOOM  
                        </h3>
                        
                        <a href="{{ url('/dudas-zoom/add') }}" class="btn btn-outline" data-toggle="modal" data-target="#exampleModal"
                        style=" text-align:center; display:block; background-color:orange;">
                            <i class="fas fa-question"></i>
                        </a>

                        include('Partials.modal_questions.modal_questions')

                        
                        
                        <h5 class="mb-3">
                                ¿AÚN NO TIENE LA APP ZOOM? OPRIMA EL BOTÓN COLOR <b style="color:#E7B2FF;"><i>LILA</i></b>
                        </h5>
                        <a
                            href="#download"
                            class="btn btn-outline js-scroll-trigger"
                            style=" text-align:center; display:block; background-color:#E7B2FF;"
                            ><i class="fas fa-cloud-download-alt"></i>
                        </a>-->
                    
                    </div>
                </div>

                <div class="col-lg-6 my-auto">
                    <div class="container">
                        <div class="device-mockup ipad_pro portrait gold">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    
                                    <div class="container" style="text-align:center; padding:13px;">
 
                                        <iframe width="370" height="190" src="https://www.youtube.com/embed/UiF4icv_xMk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        
                                        <iframe width="370" height="190" src="https://www.youtube.com/embed/qUsRK5Li64c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <iframe width="370" height="190" src="https://www.youtube.com/embed/axyU7SnEyPE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </header>

    <!--include('Partials.sections.videos')-->
    <!--include('Partials.sections.download')-->
    
          
@endsection

@section('footerContent')
    @include('Partials.footer.footer')
@endsection

@section('scriptsContent')
    @include('Partials.scripts.scripts')
@endsection