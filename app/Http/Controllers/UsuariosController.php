<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=DB::select("SELECT * FROM listar_usuarios");
        $tipos_usuarios=DB::select("SELECT * FROM listar_tipos_usuarios");
        return view('pages.usuarios',compact('usuarios','tipos_usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indice=1;
        $id_usuario=1;
        $usuario=$_REQUEST["form"][1]['value'];
        $clave=md5($_REQUEST["form"][2]['value']);
        $nombres=$_REQUEST["form"][4]['value'];
        $apellidos=$_REQUEST["form"][5]['value'];
        $tipo_usuario=$_REQUEST["form"][6]['value'];
        $estado=1;

        $result=DB::select("CALL crud_usuarios (?,?,?,?,?,?,?,?)", [$indice,$id_usuario,$tipo_usuario,$usuario,$clave,$nombres,$apellidos,$estado]);
        $bandera=0;

        foreach($result as $row)
        {
            $bandera=$row->bandera;
        }

        echo $bandera;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id=$_REQUEST['id'];

        $usuario=DB::select("CALL obtener_usuario(?)",[$id]);

        echo json_encode($usuario);
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
    public function update(Request $request, $id)
    {
        //
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
