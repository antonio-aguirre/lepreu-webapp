 <head>
    <meta charset="utf-8" />
    
    <!--Meta tags for pwa -->
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="theme-color" content="#379271">
    <link rel="manifest" href="/manifest.json">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-starturl" content="/">

    <title>@yield('page-title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{global_asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{global_asset('css/main-page.css')}}" rel="stylesheet" />
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

    @yield('customs-styles')
    <!--include('Partials.Google.analytics')-->
</head>