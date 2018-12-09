@extends('template/template')
@section('content') 

    <h1 style="text-align:center; font-size:1.8em;">
        Confirmacion de citas
    </h1>

    <div style="background:white; font-size:1.2em; padding:2rem; border-radius:5px; border:1px solid steelblue; line-height:2em; display:flex; align:items:center; justify-content:center;">

        <div style="display:flex; flex-direction:column; justify-content:center; align-items:center; width:80%; ">
                    
                    <div class="form-group">
                        @csrf
                        <div class="form-line">
                                <input type="text" class="form-control" placeholder="Numero cita / Numero afiliación / Dui" id="documento_busqueda" name="documento_busqueda" />
                        </div>

                        <button type="button" id="btnConfirmacion" class="btn btn-default waves-effect" data-toggle="modal" data-target="#modalAsignarHora"  >
                            <i class="material-icons"  >calendar_today</i>Buscar cita
                        </button>
                    </div>
                    

                    <div style="width:100%;">
                        <div class="col-md-6">                
                            <b>Nombre del donante</b>
                        </div>
                        <div class="col-md-6">
                            Jorge Alberto de La Cruz Hernández
                        </div>
                    </div>
                    <div style="width:100%;">
                        <div class="col-md-6">                
                            <b>Nombre del paciente</b>
                        </div>
                        <div class="col-md-6">
                            Kevin Antonio Guzman Diaz
                        </div>
                    </div>
                    <div style="width:100%;">
                        <div class="col-md-6">                
                            <b>Dui</b>
                        </div>
                        <div class="col-md-6">
                            0-1234568
                        </div>
                    </div>
                    <div style="width:100%;">
                        <div class="col-md-6">                
                            <b>Fecha</b>
                        </div>
                        <div class="col-md-6">
                            23/11/2018
                        </div>
                    </div>
                    <div style="width:100%;">
                        <div class="col-md-6">                
                            <b>Hora</b>
                        </div>
                        <div class="col-md-6">
                            1:00 pm                    
                        </div>
                    </div>
                    <div style="width:100%;">
                        <div class="col-md-6">                
                            <b>Telefono 1</b>
                        </div>
                        <div class="col-md-6">
                            2272-4512
                        </div>
                    </div>
                    <div style="width:100%;">
                        <div class="col-md-6">                
                            <b>Telefono 2</b>
                        </div>
                        <div class="col-md-6">
                            2272-4512
                        </div>
                    </div>
                    <div style="width:100%;">
                        <div class="col-md-6">                
                            <b>Sexo</b>
                        </div>
                        <div class="col-md-6">
                            M
                        </div>
                    </div>
                </div>                        
        
        </div>        
        <button class="btn btn-success col-md-12">Confirmar</button>                                                    
@endsection