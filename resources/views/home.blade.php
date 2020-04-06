@extends('layouts.app')

@section('headContent')
    @section('page-title','Panel de administración')
    @include('Partials.ADMINPANEL.head.adminPanelHead')
@endsection

<body class="sb-nav-fixed">
    @section('navbarContent')
    <!-- BARRA DE NAVEGACIÓN -->
    @include('Partials.ADMINPANEL.navbar.navbarAdminPanel')
    
    @endsection

    @section('content')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('Partials.ADMINPANEL.sidenavbar.sideNavbarAdminPanel')
            </div>
            
            <div id="layoutSidenav_content">
                

                @include('Partials.ADMINPANEL.footer.adminPanelFooter')
            </div>
        </div>

    @endsection

    @section('scriptsContent')
        @include('Partials.ADMINPANEL.scripts.adminPanelScripts')
    @endsection
</body>

