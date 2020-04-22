@extends('layouts.appAdminPanel')

@section('headContent')
    @section('page-title','Inicio de sesión')
    @include('Partials.ADMINPANEL.head.adminPanelHead')
@endsection

@section('navbarContent')
    <!-- BARRA DE NAVEGACIÓN -->
    <div class="py-4">
        @include('Partials.navbar.navbar_Login_Register')
    </div>
@endsection

@section('content')

    <style>
        .header-filter:after {
            position: fixed;
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

    <section class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1486551937199-baf066858de7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1146&q=80'); background-size:cover; background-position: top left; background-repeat: no-repeat;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Inicio de sesión</h3></div>
                                <div class="card-body">

                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" 
                                            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Introduzca su nombre de usuario" />
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>verifique su nombre de usuario o contraseña</strong>
                                                </span>
                                            @enderror
                                        </div>
                                            
                                        <div class="form-group">
                                            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" 
                                            name="password" required autocomplete="current-password" placeholder="Introduzca su contraseña" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        
                                        <!--<div class="form-group">
                                            <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                        </div>-->
                                        <div class="form-group col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12" style="text-align:center;">
                                                    <button class="btn btn-primary" type="submit">Accesar</button>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="checkbox" style="text-align:center;">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <!--EL helper OLD ayuda a recuperar un valor anterior escrito en un input-->
                                                    Recordar sesión
                                            </label>
                                        </div>

                                        <hr>
                                        <div class="form-group col-lg-12">
                                            <!--<a class="small" href="password.html">Forgot Password?</a>-->
                                            <div class="row">
                                                <div class="col-lg-12" style="text-align:center;">
                                                    <a class="btn btn-link" href="{{url('/')}}">Página de inicio</a>
                                                    <a class="btn btn-link" href="{{url('/registeruser/add')}}">Registrarse</a>
                                                </div>
                                                <!--<div class="col-lg-6">
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            ¿Olvidaste la contraseña?
                                                        </a>
                                                    @endif
                                                </div>-->
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsContent')
    @include('Partials.scripts.scripts')
@endsection




