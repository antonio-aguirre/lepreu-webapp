@extends('layouts.app')

@section('headContent')
    @section('page-title','Registro de dudas')
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

    <section class="page-section" id="contact">
      <div class="container">
        <div >

          <form action="{{ url('/dudas-zoom') }}" method="post">
            @csrf
            <div class="col-lg-12 text-center">

              <label> ESCRIBA EL NOMBRE DE SU CONGREGACIÓN A LA QUE ASISTE</label>
              <input type="text" class="form-control" name="congregation" value="{{ old('congregation') }}" placeholder="Nombre de la congregación">
            </div>

            <div class="col-lg-12 text-center">
              
              <br><br>
              <label> A CONTINUACIÓN DESCRIBA LA DUDA QUE TIENE PARA USAR LA APLICACIÓN ZOOM </label>
              <textarea class="form-control" aria-label="With textarea" rows="10" name="description" value="{{ old('description') }}" placeholder="Escriba su duda aquí"></textarea>
            </div><br><br>

            <button class="btn btn-outline btn-xl js-scroll-trigger btn-block"
                    style=" text-align:center; display:block;">
                    ENVIAR COMEMTARIO
            </button>
            <a class="btn btn-outline btn-xl js-scroll-trigger btn-block"
                    style=" text-align:center; "
                    href="{{url('/')}}">
                    REGRESAR A PÁGINA ANTERIOR
            </a>
          </form>

        </div>
      </div>
    </section>

    
  </header>

@endsection

@section('scriptsContent')
    @include('Partials.scripts.scripts')
@endsection

