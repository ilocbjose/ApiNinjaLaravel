<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Mision;
use App\Models\Ninja;
use App\Models\Cliente;

use Illuminate\Support\Facades\Schema;

class MisionesController extends Controller
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

    	$mision = new Mision();

    	$clientes = Cliente::all();

    	foreach ($clientes as $cliente) {
    		
    		if($cliente->codigo == $request->cliente){

    			$mision->id_cliente = $request->cliente;
    			$mision->recompensa = $request->recompensa;

		    	if($request->ninjas_estimados)

		    		$mision->ninjas_estimados = $request->ninjas_estimados;
	

		    	$mision->pago = $request->pago;

		    	if($request->estado)

		    		$mision->estado = $request->estado;

		    			

		    	if($request->urgente)

		    		$mision->urgente = $request->urgente;

		    			

		    	$mision->save();

    		}else{

    			return "Datos incorrectos";

    		}

    	}

    	

    	


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

            $this->respuesta = DB::table('misions')->orderBy('urgente','desc')->get();

        } elseif($id=="&"){

        	$this->respuesta = DB::table('misions')->orderBy('created_at','desc')->get();

        }elseif($id=="pendiente"||$id=="en proceso"||$id=="realizada"||$id=="fallida"){

        	$this->respuesta = Mision::where('estado',$id)->get();

        } else{

        	$this->respuesta = Mision::where('estado',$id)->get();

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

     	$mision = Mision::find($id);

     	if($mision){

			//Procesar los datos recibidos
			$data = $request->getContent();

			//Verificar que hay datos
			$data = json_decode($data);

			if($data){

				//TODO: validar los datos introducidos

				if(isset($data->cliente)){

					$mision->id_cliente = $data->cliente;
				}
				if(isset($data->recompensa)){

					$mision->recompensa = $data->recompensa;
				}
                if(isset($data->ninjas_estimados)){

                    $mision->ninjas_estimados = $data->ninjas_estimados;
                }
                if(isset($data->pago)){

                    $mision->pago = $data->pago;
                }
                if(isset($data->urgente)){

                	$mision->urgente = $data->urgente;
                }

                if(isset($data->estado)){

                	if(($data->estado) == "realizada"){

                		$mensajeEnhorabuena =  $data->estado;
                		$mision->estado = $mensajeEnhorabuena;

                	}else{

                		$mision->estado = $data->estado;

                	}
               
                }


                if(isset($data->ninjas_estimados)){

                	$datosNuevos = $data->ninjas_estimados;

                	if($datosNuevos>="2"){

                		$mision->estado = "en proceso";

                	}

                }
                
               
                
				//Guardar la mision
				try{

					$mision->save();

				}catch(\Exception $e){
					$response = $e->getMessage();
				}
			}else{
				$response = "Datos incorrectos";
			}
		}else{
			$response = "Mision no encontrada";
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
