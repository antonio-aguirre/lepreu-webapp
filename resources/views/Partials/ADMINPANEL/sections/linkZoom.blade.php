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

                    <section>
                        <form action="{{ Route('link-zoom.store') }}" method="post">
                            @csrf

                            <br>
                            <div class="container">
                                
                                <div class="row">
                                    <div class="card col-lg-8" style="margin: auto; text-align:center; background-color:white; border:none;">
                                        <div class="card-body">

                                            <h3>Agregar ID de conferencia en Zoom</h3>
                                            <hr>
                                            
                                            <div>
                                                <div class="input-group col-lg-6" style="margin:auto;">
                                                    <input type="hidden" name="value" value="LINK-ZOOM">
                                                    <input class="form-control" type="text" name="data" id="ID" class="col-lg-5" style="text-align:center;" placeholder="Ingrese el ID">
                                                    <input type="hidden" name="description" value="Link para acceder a una conferencia en zoom">
                                                </div>
                                                <br>
                                                <div class="input-group col-lg-6" style="margin:auto;">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01">Tipo de ID</label>
                                                    </div>
                                                    <select class="custom-select" id="inputGroupSelect01" name="status">
                                                        <option value="Principal">Principal</option>
                                                        <option value="Secundario">Secundaio</option>
                                                    </select>

                                                    <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fas fa-info"></i>
                                                    </button>
                                                    
                                                    <div class="collapse" id="collapseExample">
                                                        <div class="card card-body">
                                                            <p><b>Id principal:</b> Es el cual estará disponible al oprimir el botón "unirse a reunion" en la página principal. Solo se puede tener un id principal.</p>
                                                            <p><b>Id secundario:</b> Es el cual estará como reserva, si se quiere usar para unirse a una reunión, cambie su tipo a "Principal" en el botón de edición. 
                                                                                     Se pueden tener múltiples Id de reserva. </p>
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                            </div>

                                            <br>
                                            <button type="submit" class="btn btn-primary btn-block col-lg-6" style="margin:auto;">Agregar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>

                    <br>

                    <section>
                        <!-- TABLA --> 
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i> ID's de zoom añadidos </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Tipo ID</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Tipo ID</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody>
                                            <?php $count = 1; ?>
                                            @if(count($links)>0)
                                                @foreach($links as $link)
                                                    <tr>
                                                        <th>{{$count}}</th>
                                                        <td>{{ $link->data }}</td>
                                                        <td>{{ $link->status }}</td>
                                                        <td style="text-align:center;">
                                                            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#ID_edit{{$link->id}}">
                                                                <i class="far fa-edit"></i> Editar
                                                            </a>
                                                            @include('Partials.ADMINPANEL.modal.linkZoom_edit')
                                                        </td> 
                                                        <td style="text-align:center;">   
                                                            <form action="{{ url('/link-zoom/'.$link->id.'/_delete') }}" method="post">
                                                                @csrf
                                                                {{ method_field('delete') }}
                                                                
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fa fa-trash"></i> Eliminar
                                                                </button>
                                                            </form>
                                                        </td> 
                                                    </tr>                                                       
                                                <?php $count++; ?>
                                                @endforeach
                                            @else
                                                <div class="alert alert-info" role="alert" style="text-align:center;">
                                                    <strong> ¡No se han registrado links! </strong>
                                                </div>
                                            @endif
                                        </tbody>
                                       
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- FIN TABLA -->
                    </section>

                </div>
            </main>
            
            

            @include('Partials.ADMINPANEL.footer.adminPanelFooter')
        </div>
    </div>

@endsection

@section('scriptsContent')
    @include('Partials.ADMINPANEL.scripts.adminPanelScripts')
@endsection
