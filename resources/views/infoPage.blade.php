<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{global_asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{global_asset('css/main-page.css')}}" rel="stylesheet" />
    <link href="{{global_asset('css/animate.css')}}" rel="stylesheet" />
    <link rel="manifest" href="/manifest.json">
    <!-- Custom fonts for this template -->
    <link href="{{global_asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{global_asset('vendor/simple-line-icons/css/simple-line-icons.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet" />
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{global_asset('device-mockups/device-mockups.min.css')}}" />
    <!-- Custom styles for this template -->
    <link href="{{global_asset('css/new-age.min.css')}}" rel="stylesheet" />
    <title>Lepreu</title>

    <style>
        .header-filter:after {
            position: absolute;
            z-index: 1;
            width: 100%;
            height: 100%;
            display: block;
            left: 0;
            top: 0;
            content: "";
            background-color: rgba(0, 0, 0, 0.4);
        }
        .header-filter .container {
        z-index: 2;
        position: relative;
        }
    </style>

</head>

    <body>

        <div class="jumbotron jumbotron-fluid header header-filter">
            <div class="container wow fadeInUp" style="padding-top: 10em;">
                <h1 class="display-4 text-center">Lepreu</h1>
                <p class="text-center"><i>"No te quedes lejos de mí, porque se acercan dificultades y no tengo a nadie más que me ayude."</i></p>
                <!--<p class="text-center" style="margin-top: -15px;">Salmos 22:11</p>-->
                <p class="blockquote-footer text-center" style="margin-top: -15px; color:white;">Salmos 22:11</footper>
            </div>
        </div>


        <div class="section container ">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 wow fadeInLeftBig" style="padding-top: 10em;">
                    <h1>Bienvenido!</h1>
                    <p>
                        Este sitio está orientado a ayuda y soporte de la aplicación de Zoom, y sirve como <strong>auxiliar</strong> para acceder a la misma.
                        Toda la ayuda brindada aquí es sin fines de lucro.
                    </p>
                </div>

                <div class="col-lg-6 col-md-6 col-12 wow fadeInRightBig">
                    <img src="https://res.cloudinary.com/craftwebs/image/upload/v1586480537/zoom-phone_zlskb4.png" alt="" style="position: absolute;display: block;z-index: 100;padding-top: 6em;padding-left: 5em;" class="img-fluid">
                    <img src="https://res.cloudinary.com/craftwebs/image/upload/v1586479539/blob-shape-wine_chegj1.svg" alt="" style="display: block;z-index: -35;" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="section container">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeftBig">
                    <img class="img-fluid" src="https://res.cloudinary.com/craftwebs/image/upload/v1586543534/4373_mvaru8.jpg">
                </div>
                <div class="col-lg-6 wow fadeInRightBig" style="margin-top: 6em;">
                    <h1>¿Como funciona?</h1>
                    <ul>
                        <li>Accede de forma rápida a su reunión</li>
                        <li>Tenga instalado en su dispositivo esta página</li>
                        <li>Soporte y ayuda para la platafoma de Zoom</li>
                        <li>Pensado para nuestros hermanos </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class=" section container">
            <div class="row">
                <div class="col-lg-6 wow fadeInUp" style="margin-top: 11em;">
                    <h1>¿Tienes dudas? Contactanos!</h1>
                    <p>Mandanos un correo y nos pondremos en contacto contigo lo antes posible</p>
                    <button type="button" class="btn btn-primary">
                        <a href="mailto:helplepreu@gmail.com">Escribe un correo</a>
                    </button>
                </div>

                <div class="col-lg-6 wow fadeInUp">
                    <img class="img-fluid" src="https://res.cloudinary.com/craftwebs/image/upload/v1586538845/3236267_plvdwg.jpg">
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container">
                <p>MADE WITH 🧡 FOR OUR BROTHERS & SISTERS</p>
            </div>
        </footer>


        <script src="{{global_asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{global_asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{global_asset('js/wow.js')}}"></script>
        <script>
            new WOW().init();
        </script>
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', function () {
                    navigator.serviceWorker.register('/sw.js').then(function (registration) {
                        console.log('ServiceWorker registration :', registration.scope);
                    }).catch(function (error) {
                        console.log('ServiceWorker registration failed:', error);
                    });
                });
            }
        </script>
    
    </body>
</html>