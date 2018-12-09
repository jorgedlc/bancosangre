@extends('template/template')
@section('content')

<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Usuarios
                </h2>
                <br>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalIngresarUsuario">Ingresar Usuarios</button>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Tipo de Usuario</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    @foreach($usuarios as $usu)
                        <tbody>
                            </tr>
                            <tr>
                                <td>{{$usu->usuario}}</td>
                                <td>{{$usu->nombres}}</td>
                                <td>{{$usu->apellidos}}</td>
                                <td>{{($usu->id_tipo_usuario)==1?"Administrador":"Recepcionista"}}</td>
                                <td>{{($usu->estado)==1?"Activo":"Inactivo"}}</td>
                                <td>
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modalEditarUsuario" data-id="{{$usu->id_usuario}}">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-warning waves-effect" data-toggle="modal" data-target="#modalCambiarClave">
                                        <i class="material-icons">lock</i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- #END# Exportable Table -->
@include('pages.modals.ingresar_usuario_modal')
@include('pages.modals.editar_usuario_modal')
@include('pages.modals.cambiar_clave_modal')
@endsection
