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

                <div class="col-lg-12 my-auto">
                    <div class="device-container">
                        
                        <div class="device-mockup iphone6 portait gold">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <!--<img src="{{ global_asset('img/zoomApp.jpg')}}" class="img-fluid" alt="" />-->
                                    <br>
                                    @if(count($links_principal)>0)
                                        @foreach($links_principal as $link_principal)
                                            <a class="btn btn-secondary" style="display:block; background: linear-gradient(to top right, #6699ff 0%, #3366ff 100%);"
                                                        href="{{ url('https://us04web.zoom.us/j/'.$link_principal->data.'')}}">
                                                <br>Unirse a Reunión <br><i class="fas fa-video"></i><br><br>
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
                                            <a class="btn btn-secondary" style="display:block; background: linear-gradient(to top right, #00cc99 0%, #669900 100%);"
                                                href="{{ url('https://us04web.zoom.us/j/'.$link_servicio->data.'')}}">
                                                Unirse a Reunión de servicio <br><i class="fas fa-users"></i>
                                            </a>
                                        @endforeach
                                        <br>
                                    @endif

                                    @if(count($links_predicacion)>0)
                                        @foreach($links_predicacion as $link_predicacion)       
                                            <a class="btn btn-secondary" style="display:block; background: linear-gradient(to top right, #ffcc00 0%, #ff6666 100%);"
                                                href="{{ url('https://us04web.zoom.us/j/'.$link_predicacion->data.'')}}">
                                                Unirse a sala de predicación via telefónica <br><i class="fas fa-phone-volume"></i>
                                            </a>    
                                        @endforeach
                                        <br>
                                    @endif
 
                                </div>
                                <div class="button btn" data-toggle="modal" data-target="#exampleModalCenter">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->

                                    <!-- Modal -->
                                    @include('Partials.acknowledgment_modal.acknowledgment')
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </header>

    <!--include('Partials.sections.videos')-->
    @include('Partials.sections.download')
    
          
@endsection

@section('footerContent')
    @include('Partials.footer.footer')
@endsection

@section('scriptsContent')
    @include('Partials.scripts.scripts')
@endsection