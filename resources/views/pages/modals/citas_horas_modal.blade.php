

<!-- Modal Establecer hora de cita -->
<div class="modal fade" id="modalAsignarHora" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Asignar hora de cita</h4>
            </div>
            <div class="modal-body">

                <div class="horarios-container">
                    <div class="body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">
                                        ASIGNAR
                                    </th>
                                    <th style="text-align:center;">
                                        CITAS
                                    </th>
                                    <th style="text-align:center;">
                                        CUPOS
                                    </th>
                                    <th style="text-align:center;">
                                        CUPOS DISPONIBLES
                                    </th>

                                </tr>
                            </thead>
                            <tbody id="tbhorariosMostrar">
                            
                                <tr>
                                    <td style="text-align:center;">
                                        <input name="group4" type="radio" id="radio_1" class="radio-col-light-blue with-gap" value="6:00 - 7:00" />
                                        <label for="radio_1">6:00 am - 7:00 am</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <input name="group4" type="radio" id="radio_2" class="radio-col-light-blue with-gap" value="7:00 - 8:00"/>
                                        <label for="radio_2">7:00 am - 8:00 am</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <input name="group4" type="radio" id="radio_3" class="radio-col-light-blue with-gap" value="8:00 - 9:00"/>
                                        <label for="radio_3">8:00 am - 9:00 am</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <input name="group4" type="radio" id="radio_4" class="radio-col-light-blue with-gap"  value="9:00 - 10:00" />
                                        <label for="radio_4">9:00 am - 10:00 am</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <input name="group4" type="radio" id="radio_5" class="radio-col-light-blue with-gap" value="10:00 - 11:00"/>
                                        <label for="radio_5">10:00 am - 11:00 am</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <input name="group4" type="radio" id="radio_6" class="radio-col-light-blue with-gap" value="11:00 - 12:00"/>
                                        <label for="radio_6">11:00 am - 12:00 pm</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info waves-effect" id="btn-establecer-hora">Establecer hora</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Establecer hora de cita -->
