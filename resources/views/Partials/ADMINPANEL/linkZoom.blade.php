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

            <main>
                <div class="container-fluid">
                    <!-- Mensajes de alerta por validaciones -->
                    @if ($errors->any())
                        <div class="alert alert-danger" style="border-radius: 6px; text-align:left;">
                            <div class="container-fluid">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><strong>{{ $error }}</li></strong>
                                    @endforeach
                                </ul>
                            </div>    
                        </div>
                    @endif
                    <!-- Para los mensajes y mande su alerta -->
                    @if (Session::has('message'))
                    <div class="{{ Session::get('alert-class') }} alert-dismissable" ng-if="message">
                        <div class="container-fluid">
                            <strong><li>{{ Session::get('message') }}</li></strong>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    </div>
                    @endif

                    <form action="{{ url('/link-zoom') }}" method="post">
                        @csrf

                        <br>
                        <div class="container">
                            
                            <div class="row">
                                <div class="card col-lg-12" style="margin: 0px; text-align:center; background-color:#E0FCCC;">
                                    <div class="card-body">

                                        <h3>Añada el ID que su congrgación ocupa para acceder a Zoom</h3>
                                        <div>
                                            <input type="hidden" name="value" value="LINK-ZOOM">
                                            <input type="number" name="data" class="col-lg-4" style="text-align:center;">
                                            <input type="hidden" name="description" value="Link para acceder a una conferencia en zoom">
                                            <input type="hidden" name="status" value="ADDED">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary" disabled>Añadir</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <form action="" method="post">
                        <div class="container">
                            <br>
                            <div class="row">
                                <div class="card col-lg-12" style="margin: 0px; text-align:center; background-color:#F9FCCC;">
                                    <div class="card-body">

                                        <h3>Edite el ID que su congrgación ocupa para acceder a Zoom</h3>
                                        <div>
                                            <input type="hidden" name="value" value="LINK-ZOOM">
                                            <input type="number" name="data" class="col-lg-4" style="text-align:center;">
                                            <input type="hidden" name="description" value="Link para acceder a una conferencia en zoom">
                                            <input type="hidden" name="status" value="ADDED">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!---->
                    <form action="" method="post">
                        <div class="container">
                            <br>
                            <div class="row">
                                <div class="card col-lg-12" style="margin: 0px; text-align:center; background-color:#FCCCCC;">
                                    <div class="card-body">

                                        <h3>Eliminar el ID que su congrgación ocupa para acceder a Zoom</h3>
                                        
                                        <br>
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </main>
            
            

            @include('Partials.ADMINPANEL.footer.adminPanelFooter')
        </div>
    </div>

@endsection

@section('scriptsContent')
    @include('Partials.ADMINPANEL.scripts.adminPanelScripts')
@endsection
