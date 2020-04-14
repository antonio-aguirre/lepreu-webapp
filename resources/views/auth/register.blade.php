<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('Partials.head.welcomeHead')

    <!-- Mensajes de alerta por validaciones -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable fade show" style="border-radius: 6px; text-align:left;">
            <div class="container-fluid">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</li></strong>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    @endforeach
                </ul>
            </div>    
        </div>
    @endif
    <!-- Para los mensajes y mande su alerta -->
    @if (Session::has('message'))
    <div class="{{ Session::get('alert-class') }} alert-dismissable fade show" ng-if="message">
        <div class="container-fluid">
            <strong><li>{{ Session::get('message') }}</li></strong>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    </div>
    @endif

    
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear cuenta</h3></div>
                                    <div class="card-body">
                                        
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror py-4" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror py-4" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Apellido paterno" autofocus>

                                                        @error('last_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror py-4" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Nombre de usuario" autofocus>

                                                        @error('username')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror py-4" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="phone_number" type="text" class="form-control @error('email') is-invalid @enderror py-4" 
                                                        name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Teléfono (Ej.7352223344)" required>

                                                        @error('phone_number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="token" type="password" class="form-control @error('token') is-invalid @enderror py-4" name="token" placeholder="TOKEN" required autocomplete="new-token">

                                                        @error('token')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <input id="typeUser" type="hidden" name="typeUser" value="ADMIN" required autocomplete="typeUser">


                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password" class="small mb-1">{{ __('Contraseña') }}</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror py-4" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password-confirm" class="small mb-1">{{ __('Confirmar contraseña') }}</label>
                                                        <input id="password-confirm" type="password" class="form-control py-4" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Registrarse') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                   
                                   
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="{{ url('/login') }}" style="color:blue;">Regresar a login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        @include('Partials.scripts.scripts')
    </body>
</html>
