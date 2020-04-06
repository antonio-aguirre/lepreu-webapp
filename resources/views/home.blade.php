@extends('layouts.app')

@section('headContent')
    @section('page-title','Inicio de sesión')
    @include('Partials.ADMINPANEL.head.adminPanelHead')
@endsection

@section('navbarContent')
    <!-- BARRA DE NAVEGACIÓN -->
    @include('Partials.ADMINPANEL.navbar.navbarAdminPanel')
    
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerContent')
    @include('Partials.ADMINPANEL.footer.adminPanelFooter')
@endsection

@section('scriptsContent')
    @include('Partials.ADMINPANEL.scripts.adminPanelScripts')
@endsection
