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
                <div class="col-lg-5 my-auto">
                    <div class="header-content mx-auto">
                        
                                                
                        @if(count($links_principal)>0)
                            @foreach($links_principal as $link_principal)
                                <div class="card text-center" style="border:0px;">
                                    <div class="card-body" style="background: linear-gradient(to top right, #99ccff 0%, #3366ff 100%);">
                                        <a class="btn btn-secondary" style="display:block; background-color:blue;"
                                                    href="{{ url('https://us04web.zoom.us/j/'.$link_principal->data.'')}}">
                                            Unirse a Reunión <br><i class="fas fa-video"></i>
                                        </a>
                                    </div>
                                </div>
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
                                <div class="card text-center" style="border:0px;">
                                    <div class="card-body" style="background: linear-gradient(to top right, #00cc99 0%, #00cc66 100%);">
                                        <a class="btn btn-secondary" style="display:block; background-color:green;"
                                            href="{{ url('https://us04web.zoom.us/j/'.$link_servicio->data.'')}}">
                                            Unirse a Reunión de servicio <br><i class="fas fa-users"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <br>
                        @endif

                        @if(count($links_predicacion)>0)
                            @foreach($links_predicacion as $link_predicacion)  
                                <div class="card text-center" style="border:0px;">
                                    <div class="card-body" style="background: linear-gradient(to top right, #ffcc00 0%, #ff6666 100%);">
                                        <a class="btn btn-secondary" style="display:block; background-color:orange;"
                                            href="{{ url('https://us04web.zoom.us/j/'.$link_predicacion->data.'')}}">
                                            Unirse a sala de predicación via telefónica <br><i class="fas fa-phone-volume"></i>
                                        </a>
                                    </div>
                                </div>
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

                <div class="col-lg-7 my-auto">
                    <div class="device-container">
                        <div class="device-mockup lumia920 portrait black">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="{{ global_asset('img/zoomApp.jpg')}}" class="img-fluid" alt="" />
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </header>

    @include('Partials.sections.videos')
    <!--include('Partials.sections.download')-->
    
          
@endsection

@section('footerContent')
    @include('Partials.footer.footer')
@endsection

@section('scriptsContent')
    @include('Partials.scripts.scripts')
@endsection