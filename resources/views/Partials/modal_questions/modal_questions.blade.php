<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#EEEEEE;">
                <h3 class="modal-title" id="exampleModalLabel" style="color:black;">Rellene el formulario</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('/dudas-zoom') }}" method="post">
                <div class="modal-body" style="background-color:#FFFEF0;">
                    @csrf
                    <div class="col-lg-12 text-center" style="color:black;">
                        <h4> INGRESE SU EDAD </h4>
                        <input type="number" class="form-control" name="age" value="{{ old('age') }}" min="0" max="100">
                    </div><br>

                    <div class="col-lg-12 text-center" style="color:black; background-color:#EEEEEE;">
                        <h4> SELECCIONE SU TIPO DE DISPOSITVO CON EL QUE SE CONECTA A ZOOM</h4>
                        <h8 style="color:red;">(Puede seleccionar más de uno)</h8>
                        <br><br>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="device1">
                                    <label class="custom-control-label" for="customCheck1"><i class="fas fa-mobile-alt"></i> Celular</label>
                                </div><br>
                            </div>
                            <div class="col-lg-4">
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="device2">
                                    <label class="custom-control-label" for="customCheck2"><i class="fas fa-tablet-alt"></i> Tablet</label>
                                </div><br>
                            </div>
                            <div class="col-lg-4">
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="device3">
                                    <label class="custom-control-label" for="customCheck3"><i class="fas fa-laptop"></i> Computadora</label>
                                </div>
                            </div>
                        </div><br>
                    </div>
                    
                    <div class="col-lg-12 text-center" style="color:black;">
                        <h4> SELECCIONE SISTEMA DE SU DISPOSITIVO</h4>
                        <h8 style="color:red;">(Puede seleccionar más de uno)</h8>
                        <br><br>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="OS1">
                                    <label class="custom-control-label" for="customCheck4"><i class="fab fa-android"></i> Android</label>
                                </div><br>
                            </div>
                            <div class="col-lg-8">
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5" name="OS2">
                                    <label class="custom-control-label" for="customCheck5"><i class="fab fa-apple"></i> Apple (iPhone / iPad / Macbook) </label>
                                </div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6" name="OS3">
                                    <label class="custom-control-label" for="customCheck6"><i class="fab fa-windows"></i> Windows</label>
                                </div><br>
                            </div>
                            <div class="col-lg-6">
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7" name="OS4">
                                    <label class="custom-control-label" for="customCheck7"><i class="fab fa-amazon"></i> Kindle (Amazon)</label>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="col-lg-12 text-center" style="color:black; background-color:#EEEEEE;">
                        <h4> A CONTINUACIÓN DESCRIBA LA DUDA QUE TIENE AL USAR LA APLICACIÓN ZOOM </h4>
                        <h8 style="color:red;">(Ej. ¿Cómo comentar?)</h8>
                        <textarea class="form-control" aria-label="With textarea" rows="5" name="description" value="{{ old('description') }}" placeholder="Escriba su duda aquí" required></textarea>
                        <br>
                    </div>

                </div>

                <div class="modal-footer" style="background-color:#EEEEEE;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i> Oprima para enviar el formulario</button>
                </div>
            </form>

        </div>
    </div>
</div>