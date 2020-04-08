<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="color:black;">Rellene el formulario</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('/dudas-zoom') }}" method="post">
                <div class="modal-body">

                    @csrf
                    <div class="col-lg-12 text-center" style="color:black;">
                        <label> ESCRIBA SU EDAD </label>
                        <input type="number" class="form-control" name="age" value="{{ old('age') }}" min="0" required>
                    </div><br>

                    <div class="col-lg-12 text-center" style="color:black;">
                        <label> SELECCIONE SU TIPO DE DISPOSITVO CON EL QUE SE CONECTA A ZOOM</label>
                        <input type="number" class="form-control" name="age" value="{{ old('age') }}" min="0" required>
                    </div>

                    <div class="col-lg-12 text-center" style="color:black;">
                        
                        <br><br>
                        <label> A CONTINUACIÓN DESCRIBA LA DUDA QUE TIENE PARA USAR LA APLICACIÓN ZOOM </label>
                        <textarea class="form-control" aria-label="With textarea" rows="5" name="description" value="{{ old('description') }}" placeholder="Escriba su duda aquí"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Enviar formulario</button>
                </div>
            </form>

        </div>
    </div>
</div>