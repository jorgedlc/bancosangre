@extends('template/template')
@section('content') 
<div class="row">
    <div class="block-header">
        <h2>Eventos del dia</h2>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box-2 bg-pink hover-zoom-effect" id="btnausentes" onclick="mostrarAusentes()">
            <div class="icon">
                <i class="material-icons">notifications_paused</i>
            </div>
            <div class="content">
                <div class="text">Citados</div>
                <div class="number count-to" data-from="0" data-to="{{$ausentes}}" data-speed="1500" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="btnconfirmados" onclick="mostrarConfirmados()">
        <div class="info-box-2 bg-red hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">check_circle_outline</i>
            </div>
            <div class="content">
                <div class="text">Confirmados</div>
                <div class="number count-to" data-from="0" data-to="{{$confirmados}}" data-speed="1500" data-fresh-interval="20"></div>
            
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="btnasignados" onclick="mostrarAsignados()">
        <div class="info-box-2 bg-light-blue hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="content">
                <div class="text">Cupos del día</div>
                <div class="number count-to" data-from="0" data-to="{{$asignados}}" data-speed="1500" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="btndisponibles" onclick="mostrarDisponibles()">
        <div class="info-box-2 bg-cyan hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">invert_colors</i>
            </div>
            <div class="content">
                <div class="text">Cupos Disponibles</div>
                <div class="number count-to" data-from="0" data-to="{{$disponibles}}" data-speed="1500" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>

<!-- Exportable Table Ausentes-->
<div class="row clearfix" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <div class="card" id="tabla-ausentes" >
            <div class="header">
                <h2>
                    Ausentes
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Nombre donante</th>
                                <th>Dui donante</th>
                                <th>Nombres paciente</th>
                                <th>Apellidos paciente</th>
                                <th>Estado cita</th>
                                <th>Horario</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre donante</th>
                                <th>Dui donante</th>
                                <th>Nombres paciente</th>
                                <th>Apellidos paciente</th>
                                <th>Estado cita</th>
                                <th>Horario</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            @foreach($citas as $cita)
                                    <tr>
                                        <td>{{$cita->nombre}}</td>
                                        <td>{{$cita->dui}}</td>
                                        <td>{{$cita->nombres}}</td>
                                        <td>{{$cita->apellidos}}</td>
                                        <td>{{$cita->estados}}</td>
                                        <td>{{$cita->horario}}</td>
                                    </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- Ausentes -->


@endsection