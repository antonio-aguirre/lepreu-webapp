@section('customs-styles')
  <!-- Custom styles for this template -->
  <link href="{{ global_asset('css/landing-page.min.css') }}" rel="stylesheet">
@endsection

<!-- Image Showcases -->
<section class=" bg-info " id="videos">
    <div class="container">
        <div style="background-color:red; border-radius:30px; box-shadow: 5px 10px 5px;">
            <center>
                <h1 class="section-heading">VIDEOS DE AYUDA PARA EL USO DE LA APP ZOOM</h1>
            </center>
        </div>      
    </div>
    <br><br><br>
    <div class="container">

        <div class="row no-gutters">          
            <iframe class="col-lg-6 order-lg-2 text-white showcase-img" width="560" height="315" src="https://www.youtube.com/embed/UiF4icv_xMk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Como instalar Zoom</h2>
                <p class="lead mb-0">Para empezar necesitamos tener la app Zoom instalada en nuestros dispositivos. <br><br>
                Lo invitamos a ver este breve video donde explica como instalar la app, de igual manera, dependiendo de su dispositivo, descargue la misma en la sección <a class="js-scroll-trigger" href="#download">descargas.</a></p>
            </div>
        </div>

        <div class="row no-gutters">
            <iframe class="col-lg-6 text-white showcase-img" width="560" height="315" src="https://www.youtube.com/embed/qUsRK5Li64c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Primeros pasos usando Zoom</h2>
                <p class="lead mb-0">
                    Usar nuevas tecnologías supone un reto, no se preocupe. Lo invitamos a ver este video donde se 
                    familiarizará con el uso de la app Zoom y sus funciones.
                </p>
            </div>
        </div>
        
    </div>
</section>