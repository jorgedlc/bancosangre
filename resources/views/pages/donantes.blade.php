@extends('template/template')
@section('content')
<h1>Donantes</h1>
<!-- Exportable Table Donantes-->
<div class="row clearfix" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <div class="card" id="tabla_donantes" >
            <div class="header">
                <h2>
                    Donantes
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Dui</th>
                                <th>Telefonos</th>
                                <th>Nombre</th>
                                <th>Sexo</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Dui</th>
                                <th>Telefonos</th>
                                <th>Nombre</th>
                                <th>Sexo</th>
                            </tr>
                        </tfoot>
                    @foreach($donantes as $don)
                        <tbody>
                            </tr>
                            <tr>
                                <td>{{$don->dui}}</td>
                                <td>{{$don->telefono1}}&nbsp;/ &nbsp;{{$don->telefono2}}</td>
                                <td>{{$don->nombre}}</td>
                                <td>{{($don->sexo)=='M'?"Masculino":"Femenino"}}</td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
<!-- Donantes -->
@endsection
