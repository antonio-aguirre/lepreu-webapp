@extends('layouts.appAdminPanel')

@section('headContent')
    @section('page-title','Panel de administración')
    @include('Partials.ADMINPANEL.head.adminPanelHead')
@endsection

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

            <form action="{{ route('/link-zoom/add') }}" method="post">
                <label for="inputLinkZoom"> Ingrese el link para acceder a zoom </label>
            </form>
                

            @include('Partials.ADMINPANEL.footer.adminPanelFooter')
        </div>
    </div>

@endsection

@section('scriptsContent')
    @include('Partials.ADMINPANEL.scripts.adminPanelScripts')
@endsection
