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
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">

                    <h1 class="mb-3">
                            UNASE A LA REUNIÓN OPRIMIENDO EL BOTÓN DE ABAJO
                    </h1>                
                    
                    @if(count($links)>0)
                        @foreach($links as $link)
                        <a class="btn btn-primary btn-xl js-scroll-trigger btn-block" style=" text-align:center; display:block;"
                                    href="{{ url('https://us04web.zoom.us/j/'.$link->data.'')}}">
                            OPRIMA AQUÍ PARA UNIRSE A LA REUNIÓN
                        </a>
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            <i class="fas fa-info-circle"></i> Disculpe el inconveniente.
                            <hr>
                            <p>Link no añadido. Consulte a un anciano para más información.</p>
                        </div>
                    @endif

                    <!------------------->
                    <br>
                    

                    <h3 class="mb-3">
                            DAR CLICK EN EL SIGUIENTE BOTÓN PARA EXPRESAR DUDAS DEL USO DE ZOOM  
                    </h3>
                    <!-- Button trigger modal -->
                    <button href="{{ url('/dudas-zoom/add') }}" class="btn btn-outline btn-xl js-scroll-trigger btn-block" data-toggle="modal" data-target="#exampleModal"
                    style=" text-align:center; display:block;">
                        OPRIMA ESTE BOTÓN PARA EXPRESAR SUS DUDAS
                    </button>

                    @include('Partials.modal_questions.modal_questions')

                    <br><br>
                    <h3 class="mb-3">
                            ¿AÚN NO TIENE LA APP ZOOM?
                    </h3>
                    <a
                        href="#download"
                        class="btn btn-outline btn-xl js-scroll-trigger btn-block"
                        style=" text-align:center; display:block;"
                        >OPRIMA ESTE BOTÓN PARA IR A SECCIÓN DE DESCARGAR ZOOM
                    </a>
                    
                    </div>
                </div>

                <div class="col-lg-5 my-auto">
                    <div class="device-container">
                        <div style="text-align:center;">
                            <h4> IMAGEN DE EJEMPLO </h4>
                        </div>
                        <div class="device-mockup lumia920 portrait black">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="{{ global_asset('img/zoomApp.jpg') }}" class="img-fluid" alt="" />
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
          
@endsection

@section('footerContent')
    @include('Partials.footer.footer')
@endsection

@section('scriptsContent')
    @include('Partials.scripts.scripts')
@endsection