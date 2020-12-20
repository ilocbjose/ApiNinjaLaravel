<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ninja;

class NinjasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $ninja = new Ninja;

        $ninja->nombre = $request->nombre;

        $ninja->fecha_registro = $request->fecha_registro;

        $ninja->rango = $request->rango;

        $ninja->informe_habilidades = $request->informe_habilidades;

        $ninja->estado = $request->estado;

        $ninja->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respuesta = null;

        if($id=="*"){

            $this->respuesta = DB::table('ninjas')->get();

        } else if($id=="muerto"||$id=="activo"||$id=="herido"||$id==""){

            $this->respuesta = Ninja::where('estado',$id)->get();

        }else {

            $this->respuesta = Ninja::where('id',$id)->get();

        }
        
        return $this->respuesta;

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
       
        $ninja = Ninja::where('id',$id)->update([
            "estado" => $request->estado
        ]);

        return $respuesta = "Datos modificados";

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
