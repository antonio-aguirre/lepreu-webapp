@extends('layouts.appAdminPanel')

@section('headContent')
    @section('page-title','Inicio de sesión')
    @include('Partials.ADMINPANEL.head.adminPanelHead')
@endsection

@section('content')

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

    <section class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1445905595283-21f8ae8a33d2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1652&q=80'); background-size:cover; background-position: top left; background-repeat: no-repeat;">
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
                                            <label class="small mb-1" for="inputEmailAddress">Nombre de usuario</label>
                                            <input class="form-control py-4" id="username" type="username" 
                                            name="username" value="{{ old('username') }}" placeholder="Introduzca su nombre de usuario" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="password" type="password" 
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
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <!--<a class="small" href="password.html">Forgot Password?</a>-->
                                            <button class="btn btn-primary" type="submit">Accesar</button>
                                            <a class="btn btn-secondary" href="{{url('/')}}">Página de inicio</a>
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
    @include('Partials.ADMINPANEL.scripts.adminPanelScripts')
@endsection




