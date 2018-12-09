@extends('template/template')
@section('content') 

<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tipos Usuarios
                </h2>
               
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Tipo Usuario</th>
                                <th>Estado</th>
                                <th>Editar</th>                                
                            </tr>
                        </thead>
                    
                        <tbody>

                            @foreach($tipos_usuarios as $tipo)
                            <tr>
                                <td>{{$tipo->tipo_usuario}}</td>
                                <td>{{($tipo->estado==1?"Activo":"Inactivo")}}</td>
                                <td>
                                    <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">edit</i>
                                    </button>
                                
                                </td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->

@endsection