@extends('layouts.app')

@section('page-title','Inicio de sesión')

@section('content')

    <header class="masthead">
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
        <div class="alert {{ Session::get('alert-class') }} col-xs-12 black-text alert-dismissable" ng-if="message" style="border-radius: 6px;">
            <div class="container-fluid">
                <strong><li>{{ Session::get('message') }}</li></strong>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        </div>
        @endif

        <section class="page-section">
            <div class="container">
            <div>

                <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card" style="border-radius:30px;">
                                    <div class="card-header" style="color:black; text-align:center; border-radius:30px;">Inicio de sesión</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="text" class="col-md-4 col-form-label text-md-right" style="color:black;">Usuario</label>

                                                <div class="col-md-6">
                                                    <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right" style="color:black;">Contraseña</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary disabled">
                                                        ACCEDER
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            </div>
        </section>

    </header>

@endesction

