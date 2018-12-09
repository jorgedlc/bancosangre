@extends('template.template')

@section('content')
<div style="background-color:#fff; padding:25px;">
    <h3 style="text-align:center;">ASIGNACION DE CUPOS POR DEFECTO</h3>
    <div class="row">
        <!-- TABS DE NAVEGACION -->
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active">
                <a href="#home_only_icon_title" data-toggle="tab">
                    <i class="material-icons">home</i>Semana
                </a>
            </li>
            <li role="presentation">
                <a href="#profile_only_icon_title" data-toggle="tab">
                    <i class="material-icons">face</i>Fin de semana
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- HORARIOS PARA DIAS DE SEMANA -->
            <div role="tabpanel" class="tab-pane fade in active" id="home_only_icon_title">
                <div class="col-md-12">
                    <h4>Dias de semana</h4>
                        <form action="" id="frm_horarios_semana">
                            @csrf
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
                                    <tbody>
                                    @foreach($horarios as $horario)
                                        @if($horario->tipo_horario=='SEMANA')
                                            <tr>
                                                <td>{{$horario->horario}}</td>
                                                <td>
                                                    <input type="number" value="{{$horario->numero_cupos}}" name="c{{$horario->id_horarios}}" class="form-control" style="max-width:75px;" maxlength="3" />
                                                </td>
                                                @if($horario->estado==1)
                                                    <td>
                                                        <input type="checkbox" id="h{{$horario->id_horarios}}" name="h{{$horario->id_horarios}}" class="filled-out" checked />
                                                        <label for="h{{$horario->id_horarios}}" class="labels-horarios">Habilitado</label>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <input type="checkbox" id="h{{$horario->id_horarios}}" name="h{{$horario->id_horarios}}" class="filled-out" />
                                                        <label for="h{{$horario->id_horarios}}" class="labels-horarios">Inhabilitado</label>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            <button class="btn btn-primary m-t-15 waves-effect" type="submit">Guardar Cambios</button>
                        </form>
                </div>
            </div>
            <!--HORARIOS PARA DIA DE SEMANA-->
            <!--HORARIOS PARA  DIA DE FIN DE SEMANA-->
            <div role="tabpanel" class="tab-pane fade" id="profile_only_icon_title">
                <div class="col-md-12">
                    <h4>Fines de semana</h4>
                    <form action="" id="frm_horarios_fin_semana">
                        @csrf
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
                            <tbody>
                            @foreach($horarios as $horario)
                                @if($horario->tipo_horario=='FIN SEMANA')
                                    <tr>
                                        <td>{{$horario->horario}}</td>
                                        <td>
                                            <input type="number" value="{{$horario->numero_cupos}}" name="c{{$horario->id_horarios}}" class="form-control" style="max-width:75px;" maxlength="3" />
                                        </td>
                                        @if($horario->estado==1)
                                            <td>
                                                <input type="checkbox" id="h{{$horario->id_horarios}}" name="h{{$horario->id_horarios}}" class="filled-out" checked />
                                                <label for="h{{$horario->id_horarios}}" class="labels-horarios">Habilitado</label>
                                            </td>
                                            @else
                                            <td>
                                                <input type="checkbox" id="h{{$horario->id_horarios}}" name="h{{$horario->id_horarios}}" class="filled-out" />
                                                <label for="h{{$horario->id_horarios}}" class="labels-horarios">Inhabilitado</label>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary m-t-15 waves-effect">Guardar Cambios</button>
                    </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
