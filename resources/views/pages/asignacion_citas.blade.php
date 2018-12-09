@extends('template/template')
@section('content')


<div class="asignacion-citas-container">
    <div class="form-container">
        <div class="row ">
            <div class="col-sm-12">
                <div class="card">
                    <div class="header">
                        <h1 class="asignacion-citas-titulo">
                            Asignacion de citas
                        </h1>
                    </div>
                    <div class="body">
                        <!-- TABS DE NAVEGACION -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home_only_icon_title" data-toggle="tab" id="datos_paciente">
                                    <i class="material-icons">home</i>Paciente
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#profile_only_icon_title" data-toggle="tab">
                                    <i class="material-icons">face</i>Donantes
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- INFORMACION DEL PACIENTE -->
                            <div role="tabpanel" class="tab-pane fade in active" id="home_only_icon_title">
                                <h4>Datos del paciente</h4>
                                <form action="" id="frmIngresarCitas">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="idpaciente" id="idpaciente" value="0">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Dui / Numero Afiliacion" id="buscarPaciente" name="buscarPaciente" maxlength="10" autocomplete="off"/>
                                        </div>
                                        <button class="btn btn-primary" id="btnBuscarPacientes" type="button" >Buscar</button>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Dui" id="dui_paciente" name="dui_paciente" maxlength="10" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Numero afiliación" name="numero_afiliacion" id="numero_afiliacion" maxlength="9" autocomplete="off"  disabled/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Nombres" id="nombres_paciente" name="nombres_paciente" maxlength="10" autocomplete="off"  disabled/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Apellidos" id="apellidos_paciente" name="apellidos_paciente" autocomplete="off" disabled/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Procedencia" id="procedencia_paciente" name="procedencia_paciente" autocomplete="off" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <div>
                                            <input name="sexoPaciente" type="radio" id="radioM" class="radio-col-light-blue with-gap" value="M"/>
                                            <label for="radioM">M</label>

                                            <input name="sexoPaciente" type="radio" id="radioF" class="radio-col-light-blue with-gap" value="F"/>
                                            <label for="radioF">F</label>
                                        </div>
                                    </div>


                                </form>
                            </div>
                            <!--INFORMACION DEL PACIENTE-->
                            <!--INFORMACION DE LOS DONANTES-->
                            <div role="tabpanel" class="tab-pane fade" id="profile_only_icon_title">
                                <h4>Ingreso de donantes</h4>
                                <!--TABLA DE DONANTES INGRESADOS-->
                                <div class="body table-responsive">
                                        <table class="table " id="tbl-donantes">
                                            <thead>
                                                <tr>
                                                    <th>NOMBRE DONANTE</th>
                                                    <th>DUI</th>
                                                    <th>Fecha</th>
                                                    <th>Hora</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-donantes">

                                            </tbody>
                                        </table>
                                    </div>
                                    <!--TABLA DE DONANTES INGRESADOS-->
                                    <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Numero de dui / Numero afiliacion" id="buscarDonante" name="buscarDonante" maxlength="10" />
                                            </div>
                                            <button class="btn btn-primary" id="btnBuscarDonante">Buscar Donante</button>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="iddonantes" id="iddonantes">
                                    </div>
                                    <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Numero de dui" id="numero_dui" name="numero_dui" maxlength="10" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Nombre donante" id="nombre_donante" name="nombre_donante" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Apellido donante" id="apellido_donante" name="apellido_donante" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Telefono 1" id="telefono1" name="telefono1" maxlength="8"/>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Telefono 2" id="telefono2" name="telefono2" maxlength="8" />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <div>
                                            <input name="sexoDonante" type="radio" id="sexoDonanteM" class="radio-col-light-blue with-gap" value="M"/>
                                            <label for="sexoDonanteM">M</label>

                                            <input name="sexoDonante" type="radio" id="sexoDonanteF" class="radio-col-light-blue with-gap" value="F"/>
                                            <label for="sexoDonanteF">F</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" placeholder="Asignar fecha de cita." id="fecha_cita" name="fecha_cita" >
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Hora de la cita" id="hora_cita" name="hora_cita" />
                                        </div>

                                        <button type="button" id="btnAsignarHora" class="btn btn-default waves-effect" data-toggle="modal" data-target="#modalAsignarHora" disabled >
                                            <i class="material-icons"  >access_alarm</i>Asignar hora
                                        </button>
                                    </div>
                                    <button class="btn btn-block btn-lg btn-info waves-effect" id="btn-ingresar-donante">Ingresar donante</button>
                                    <button class="btn btn-block btn-lg btn-success waves-effect" id="btn-ingresar-citas"  >Terminar proceso</button>
                                </div>
                                <!--INFORMACION DE LOS DONANTES-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@include('pages.modals.citas_horas_modal');
@endsection
