<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios=DB::select("select * from consultar_horarios_default;");

        return View('pages.cuposdias',compact('horarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //echo "Find \()/";
        $datos=$request->all();
        $estado=0;
        foreach($datos as $id => $cupos ){ //Value en este caso sera la cantidad de cupos

            //Si es un horario (input de cantidad de cupos ) y no el token
            if(substr($id,0,1)==="c"){

                if(isset($datos["h".substr($id,1)])){ //Si el estado del checkbox es checked
                    $estado = 1;
                }else{ // O no XD
                    $estado = 0;
                }

                $id=substr($id,1);

                $respuesta=DB::select("CALL actualizar_horarios_default(?,?,?);",[$id,$estado,$cupos]);

            }
        }
        echo 1;
    }

    public function consultarHorariosFechaEspecifica(Request $request){

        $fechaConsultar=$request->daySelected;

        $horarios=DB::select('call obtener_horarios_fecha_especifica(?);',[$fechaConsultar]);

        echo json_encode($horarios);

    }

    public function ingresarDomingo(Request $request){

        $day=$request->daySelected;

        $res=DB::select('call actualizar_domingos(?)',[$day]);

        echo var_dump($res);

    }

    public function asignarHorariosDefault(Request $request){

        $startDate=$request->startDate;
        $endDate=$request->endDate;


        $res=DB::select("call asignacion_horarios_default(?,?)",[$startDate,$endDate]);

        echo var_dump($res);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
