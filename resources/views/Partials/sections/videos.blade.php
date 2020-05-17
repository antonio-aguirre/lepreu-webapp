@section('customs-styles')
  <!-- Custom styles for this template -->
  <link href="{{ global_asset('css/landing-page.min.css') }}" rel="stylesheet">
@endsection

<!-- Image Showcases -->
<section class=" bg-info " id="videos">
    <center>
        <h1 style="color:#b3ecff;"><b>VIDEOS DE AYUDA</b></h1>
    </center>
    <br>
    <div class="container">

        <div class="row no-gutters">          
            <iframe class="col-lg-6 order-lg-2 showcase-img" width="560" height="315" src="https://www.youtube.com/embed/UiF4icv_xMk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h3 style="color:#b3d9ff;">Como instalar Zoom</h3>
                <p class="lead mb-0">Para empezar necesitamos tener la app Zoom instalada en nuestros dispositivos.<br>
                Lo invitamos a ver este breve video donde explica como instalar la aplicación.</p><br>
            </div>
        </div>

        <div class="row no-gutters">
            <iframe class="col-lg-6 showcase-img" width="560" height="315" src="https://www.youtube.com/embed/qUsRK5Li64c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="col-lg-6 my-auto showcase-text">
                <h3 style="color:#b3d9ff;">Primeros pasos usando Zoom</h3>
                <p class="lead mb-0">
                    Usar nuevas tecnologías supone un reto, no se preocupe. Lo invitamos a ver este video donde se 
                    familiarizará con el uso de la app Zoom y sus funciones.
                </p>
            </div>
        </div>

        <div class="row no-gutters">          
            <iframe class="col-lg-6 order-lg-2 showcase-img" width="560" height="315" src="https://www.youtube.com/embed/axyU7SnEyPE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h3 style="color:#b3d9ff;">Zoom por llamada telefónica</h3>
                <p class="lead mb-0">Es posible que no contemos con acceso a internet en algún momento, para esto
                lo invitamos a ver este breve video donde explica como unirse a una reunión en zoom por medio de una llamada telefónica</p><br>
            </div>
        </div>
        
    </div>
</section>