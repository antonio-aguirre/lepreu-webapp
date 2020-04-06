@extends('layouts.app')

@section('headContent')
    @section('page-title','Inicio de sesión')
    @include('Partials.head.welcomeHead')
@endsection

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
                                <div class="col-md-5">
                                    <div class="card" style="border-radius:20px;">
                                        <div class="card-header" style="color:black; text-align:center;">Inicio de sesión</div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <br>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input id="username" type="username" class="form-control" 
                                                        name="username" value="{{ old('username') }}" placeholder="Nombre de usuario">
                                                    </div>
                                                </div><br>

                                                <div class="form-group row">

                                                    <div class="col-md-12">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                                        name="password" required autocomplete="current-password" placeholder="Contraseña">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div><br>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-3" style="color:black; text-align:center;">
                                                        <button type="submit" class="btn btn-primary">
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
            <br><br>
        </section>

    </header>

@endsection

@section('scriptsContent')
    @include('Partials.scripts.scripts')
@endsection

