<!-- Modal Ingresar Usuario -->
<div class="modal fade" id="modalIngresarUsuario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Ingresar Usuario</h4>
            </div>
            <form id="form_ingresarUsuario">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token()}} "/>
            <div class="modal-body">
                <label for="usuario">Usuario</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Número de Afiliacion">
                    </div>
                </div>
                <label for="clave">Clave</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="password" id="clave" name="clave" class="form-control" placeholder="Clave">
                    </div>
                </div>
                <label for="confirmar_clave">Confirmar Clave</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="password" id="confirmar_clave" name="confirmar_clave" class="form-control" placeholder="Repite la clave">
                    </div>
                </div>
                <label for="nombres">Nombres</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombres">
                    </div>
                </div>
                <label for="apellidos">Apellidos</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
                    </div>
                </div>
                <label for="tipo_usuario">Tipo de Usuario</label>
                <div class="form-group">
                    <select class="form-control show-tick" id="tipo_usuario" name="tipo_usuario">
                        @foreach ($tipos_usuarios as $tipos)
                    <option value="{{$tipos->id_tipo_usuario}}">{{$tipos->tipo_usuario}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Ingresar Usuario</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Ingresar Usuario -->
