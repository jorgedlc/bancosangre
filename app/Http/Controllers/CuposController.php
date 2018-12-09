<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CuposController extends Controller
{

    public function index()
    {
        $ausentes=DB::select('SELECT * FROM cantidad_ausente;');
        $confirmados=DB::select('SELECT * FROM vista_confirmados;');
        $asignados=DB::select('SELECT * FROM vista_cuposa');
        $disponibles=DB::select('CALL disponibles();');

        $ausentes=$ausentes[0]->ausentes;
        $confirmados=$confirmados[0]->confirmados;
        $asignados=$asignados[0]->cupos_asignados;
        $disponibles=$disponibles[0]->cupos_disponibles;
                
        return View('pages.inicio',compact('ausentes','confirmados','asignados','disponibles'));

    }


    public function consultarFechasCalendario(Request $request){

        //echo "Find \()/";
        $fecha_inicio=$request->fecha_inicio;
        $fecha_fin=$request->fecha_fin;

        $result=DB::select('call consultar_fechas_calendario(?,?);',[$fecha_inicio,$fecha_fin]);
        echo json_encode($result);
    }


    public function consultarHorariosHabiles(Request $request){

        $fecha=explode("/",$request->fecha);
        $fechaConsultar=$fecha[2]."-".$fecha[1]."-".$fecha[0];
        $horarios=DB::select("call obtener_horarios_habiles_fecha(?);",[$fechaConsultar]);
        echo json_encode($horarios);
    }
}
