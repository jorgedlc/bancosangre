@extends('template/template')

@section('title')
    Asignación de cupos
@endsection


@section('content')






        <div class="calendar-container">

            <h1 class="asignacion-cupos-titulo">Asignacion de Cupos</h1>

            <button class="btn btn-success" id="btnEstablecerHorarios">Establecer horarios</button>
            <br><br>

            @csrf
            <div id='calendar'></div>
        </div>

        <!-- Modal Establecer hora de cita -->
        <div class="modal fade" id="modalAsignacionCupos" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Horarios para 22/11/2018</h4>
                    </div>
                    <div class="modal-body">

                        <!-- TABS DE NAVEGACION -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#horarios" data-toggle="tab">
                                                <i class="material-icons">home</i>Horarios
                                            </a>
                                        </li>
                                        <li role="fecha">
                                            <a href="#fecha" data-toggle="tab">
                                                <i class="material-icons">face</i>Fecha
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="tab-content">

                                            <div role="tabpanel" class="tab-pane fade in active" id="horarios">
                                                <table class="table">
                                                    <thead>
                                                        <th colspan="3" style="text-align:center;">
                                                            Recepción de donantes
                                                        </th>
                                                    </thead>
                                                    <thead>
                                                        <th>
                                                            Horario
                                                        </th>
                                                        <th>
                                                            Numero de cupos
                                                        </th>
                                                        <th>
                                                            Dias de semana
                                                        </th>
                                                    </thead>
                                                    <tbody id="tbodyHorariosEspecificos">

                                                    </tbody>
                                                </table>

                                            </div>

                                            <div role="tabpanel" class="tab-pane fade in " id="fecha">

                                                <div class="row">
                                                    <div class="col-md-6" style="text-align:center;">
                                                        <div class="form-group">
                                                            <label for="">Deshabilitar dia</label>
                                                            <div class="switch">
                                                                <label><input type="checkbox" ><span class="lever"></span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="text-align:center;">
                                                            <label for="">Dia festivo</label>
                                                            <div class="switch">
                                                                <label><input type="checkbox" ><span class="lever"></span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justificacion-festivos">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" id="email_address" class="form-control" placeholder="Nombre dia festivo">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                    </div>
                        </ul>


                    </div>
                    <div class="modal-footer">
                    <button class="btn bg-light-green waves-effect">Establecer Horario</button>
                        <button type="submit" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Establecer hora de cita -->
@endsection
