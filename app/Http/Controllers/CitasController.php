<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas=DB::select('CALL tabla_inicio(?);',[0]);
        $ausentes=DB::select('SELECT * FROM cantidad_ausente;');
        $confirmados=DB::select('SELECT * FROM vista_confirmados;');
        $asignados=DB::select('SELECT * FROM vista_cuposa');
        $disponibles=DB::select('CALL disponibles();');

        $ausentes=$ausentes[0]->ausentes;
        $confirmados=$confirmados[0]->confirmados;
        $asignados=$asignados[0]->cupos_asignados;
        $disponibles=$disponibles[0]->cupos_disponibles;


        return view('pages.inicio',compact('citas','ausentes','confirmados','asignados','disponibles'));

    }


    public function crearCitas(Request $request){

        /*
        $indice=1;
        $id_paciente=1;
        $jsonDonantes=$request->jsonDonantes;
        $numero_afiliacion=$request->numero_afiliacion;
        $nombres_paciente=$request->nombres_paciente;
        $apellidos_paciente=$request->apellidos_paciente;
        $dui_paciente=$request->dui_paciente;
        $procedencia_paciente=$request->procedencia_paciente;

        $paciente=[$indice,$id_paciente,$nombres_paciente,$apellidos_paciente,$dui_paciente,$numero_afiliacion,$procedencia_paciente];

        $result1=DB::select("call crud_pacientes(?,?,?,?,?,?,?);",$paciente);


        $id_paciente=$result1[0]->nidpaciente;
        $arregloDonantes=json_decode($jsonDonantes);

        $id_donante=1;
        //Ingreso de los donantes
        foreach($arregloDonantes as $ObjDonante){

            $donante=[$indice,$id_donante,$ObjDonante->numero_dui,$id_paciente,$ObjDonante->telefono1,$ObjDonante->telefono2,$ObjDonante->nombre_donante];

            $result2=DB::select("call crud_donantes(?,?,?,?,?,?,?);",$donante);

            $id_donante=$result2[0]->niddonante;

            $result3=DB::select("CALL crud_cita(?,?,?,?,?);",[1,1,$id_donante,$ObjDonante->id_fecha,'0001']);

        }

        echo 1;
        */
        echo var_dump($_REQUEST);

    }

    public function confirmarCitas(Request $request){


    }

    public function buscarDocumento(Request $request){

        $documento=$request->documento;

        $persona=DB::select("call existencia_paciente_donante(?);",[$documento]);

        echo json_encode($persona);

    }
}
