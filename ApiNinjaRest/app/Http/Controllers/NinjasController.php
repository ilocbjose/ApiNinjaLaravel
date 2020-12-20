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

        } else if($id=="muerto"||$id=="activo"||$id=="herido"||$id=="desertor"){

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
       
       $ninja = Ninja::find($id);

       $data = $request->getContent();

            //Verificar que hay datos
            $data = json_decode($data);

            if($data){

                //TODO: validar los datos introducidos

                if(isset($data->nombre)){

                    $ninja->nombre = $data->nombre;
                }
                if(isset($data->fecha_registro)){

                    $ninja->fecha_registro = $data->fecha_registro;
                }
                if(isset($data->rango)){

                    $ninja->rango = $data->rango;
                }
                if(isset($data->estado)){

                    $ninja->estado = $data->estado;
                }
                if(isset($data->informe_habilidades)){

                    $ninja->informe_habilidades = $data->informe_habilidades;
                }
        return $respuesta = "Datos modificados";
            }
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
