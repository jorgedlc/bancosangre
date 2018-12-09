<!-- Modal Editar Usuario -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Editar Usuario</h4>
            </div>
            <form id="form_editarUsuario">
                <input type="hidden" id="ed_id_usuario" name="ed_id_usuario">
            <div class="modal-body">
                <label for="usuario">Usuario</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="ed_usuario" name="ed_usuario" class="form-control" placeholder="Número de Afiliacion">
                    </div>
                </div>
                <label for="nombres">Nombres</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="ed_nombres" name="ed_nombres" class="form-control" placeholder="Nombres">
                    </div>
                </div>
                <label for="apellidos">Apellidos</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="ed_apellidos" name="ed_apellidos" class="form-control" placeholder="Apellidos">
                    </div>
                </div>
                <label for="tipo_usuario">Tipo de Usuario</label>
                <div class="form-group">
                    <select class="form-control show-tick" id="ed_tipo_usuario" name="ed_tipo_usuario">
                        @foreach ($tipos_usuarios as $tipos)
                        <option value="{{$tipos->id_tipo_usuario}}">{{$tipos->tipo_usuario}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="ed_estado">Estado</label>
                <div class="form-group">
                    <select class="form-control show-tick" id="ed_estado" name="ed_estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Editar Usuario</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Editar Usuario -->
