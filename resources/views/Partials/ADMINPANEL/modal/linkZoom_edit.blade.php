<!-- Modal -->
<div class="modal fade" id="ID_edit{{$link->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Puede cambiar el tipo de ID o el ID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('/link-zoom/'.$link->id.'/_edit') }}" method="post">
        <div class="modal-body">

            
            @csrf
            {{ method_field("POST") }}

            <label for="data">ID zoom</label>
            <input class="form-control" value="{{ old('data', $link->data) }}" type="text" name="data" id="ID" class="col-lg-5" style="text-align:center;" min="0" placeholder="Ingrese el ID" required>
            <br>
            <div class="input-group col-lg-12" style="margin:auto;">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo de ID</label>
                </div>
               
                <select class="custom-select" id="inputGroupSelect01" name="status">
                    @if($link->status == 'Principal')
                      <option value="{{$link->status}}" selected>{{$link->status}}</option>
                      <option value="Secundario">Secundaio</option>
                      <option value="Servicio">Reunión Servicio</option>
                    @endif
                    @if($link->status == 'Secundario')
                      <option value="Principal">Principal</option>
                      <option value="{{$link->status}}" selected>{{$link->status}}</option>
                      <option value="Servicio">Reunión Servicio</option>
                    @endif
                    @if($link->status == 'Servicio')
                      <option value="Principal">Principal</option>
                      <option value="Secundario">Secundario</option>
                      <option value="{{$link->status}}" selected>{{$link->status}}</option>
                    @endif
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>