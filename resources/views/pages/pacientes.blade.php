@extends('template/template')

@section('content')


<h1>Pacientes</h1>

<!-- Exportable Table Pacientes-->
<div class="row clearfix" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <div class="card" id="tabla_pacientes" >
            <div class="header">
                <h2>
                    Pacientes
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Dui</th>
                                <th>Afiliacion</th>
                                <th>Procedencia</th>
                                <th>Sexo</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Dui</th>
                                <th>Afiliacion</th>
                                <th>Procedencia</th>
                                <th>Sexo</th>
                            </tr>
                        </tfoot>
                    @foreach($pacientes as $pac)
                        <tbody>
                            </tr>
                            <tr>
                                <td>{{$pac->nombres}} {{$pac->apellidos}}</td>
                                <td>{{$pac->dui}}</td>
                                <td>{{$pac->afiliacion}}</td>
                                <td>{{$pac->procedencia}}</td>
                                <td>{{($pac->sexo)=='M'?"Masculino":"Femenino"}}</td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
<!-- Pacientes -->
@endsection
