<!-- Modal Cambiar Clave -->
<div class="modal fade" id="modalCambiarClave" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Cambiar Clave de Usuario</h4>
            </div>
            <form id="form_cambiarClave">
            <div class="modal-body">
                <label for="usuario">Usuario</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="cc_usuario" name="cc_usuario" class="form-control" placeholder="Número de Afiliacion" readonly>
                    </div>
                </div>
                <label for="clave">Clave</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="password" id="cc_clave" name="cc_clave" class="form-control" placeholder="Clave">
                    </div>
                </div>
                <label for="confirmar_clave">Confirmar Clave</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="password" id="cc_confirmar_clave" name="cc_confirmar_clave" class="form-control" placeholder="Repite la clave">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Cambiar Clave</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Cambiar Clave -->
