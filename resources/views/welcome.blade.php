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

                    <h2 class="mb-3">
                            UNASE A LA REUNIÓN OPRIMIENDO EL BOTÓN COLOR <b style="color:#0846CD;"><i>AZUL</i></b> DE ABAJO
                    </h2>                
                    
                    @if(count($links)>0)
                        @foreach($links as $link)
                        <a class="btn btn-primary  " style=" text-align:center; display:block;"
                                    href="{{ url('https://us04web.zoom.us/j/'.$link->data.'')}}">
                             <i class="fas fa-video"></i>
                        </a>
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            <i class="fas fa-info-circle"></i> Disculpe el inconveniente.
                            <hr>
                            <p>Link no añadido. Consulte a un anciano para más información.</p>
                        </div>
                    @endif

                    <br>

                    <h2 class="mb-3">
                            UNASE A LA REUNIÓN DE SERVICIO OPRIMIENDO EL BOTÓN COLOR <b style="color:#1AC406;"><i>VERDE</i></b> DE ABAJO
                    </h2> 
                    <a class="btn btn-secondary" style=" text-align:center; display:block; background-color:green;"
                        href="{{ url('https://us04web.zoom.us/j/7615833527')}}">
                        <i class="fas fa-users"></i>
                    </a>
                    
                    <br>

                    <h3 class="mb-3">
                            DAR CLICK EN EL BOTÓN COLOR <b style="color:orange;"><i>NARANJA</i></b> PARA EXPRESAR DUDAS DEL USO DE ZOOM  
                    </h3>
                    <!-- Button trigger modal -->
                    <a href="{{ url('/dudas-zoom/add') }}" class="btn btn-outline" data-toggle="modal" data-target="#exampleModal"
                    style=" text-align:center; display:block; background-color:orange;">
                        <i class="fas fa-question"></i>
                    </a>

                    @include('Partials.modal_questions.modal_questions')

                    <br><br>
                    <h5 class="mb-3">
                            ¿AÚN NO TIENE LA APP ZOOM? OPRIMA EL BOTÓN COLOR <b style="color:#E7B2FF;"><i>LILA</i></b>
                    </h5>
                    <a
                        href="#download"
                        class="btn btn-outline"
                        style=" text-align:center; display:block; background-color:#E7B2FF;"
                        >
                        <i class="fas fa-cloud-download-alt"></i>
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