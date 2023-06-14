<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResultadoController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function __construct() {
        $this->middleware('auth:api');
        }


    public function index()
    {
        Log::channel('stderr')->info("Si llega aqui");

        $resultados=Resultado::all();
        $mappedcollection = $resultados->map(function($resultado, $key) {
        return [
        'id' => $resultado->id,
        'nombre_partida' => $resultado->nombre_partida,
        'nombre_jugador1'=>$resultado->nombre_jugador1,
        'nombre_jugador2'=>$resultado->nombre_jugador2,
        'ganador'=>$resultado->ganador,
        'punto'=>$resultado->punto,
        'estado'=>$resultado->estado,
        ];
        });
        return response()->json(['success' => true,
        'data' => $mappedcollection,
        //'data' => Persona::all(),
        'message' => 'Lista de Resultados'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultado $resultado)
    {
        $input = $request->all();
        $resultado->nombre_partida = $input['nombre_partida'];
        $resultado->nombre_jugador1 = $input['nombre_jugador1'];
        $resultado->nombre_jugador2 = $input['nombre_jugador2'];
        $resultado->ganador = $input['ganador'];
        $resultado->punto = $input['punto'];
        $resultado->estado = $input['estado'];
        $resultado->save();
        return response()->json(['success' => true,
        'data' => Resultado::all(),
        'message' => 'Lista de Resultados'], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Log::channel('stderr')->info($request);
        Resultado::create($input);
        return response()->json(['success' => true,
        'data' => Resultado::all(),
        'message' => 'Lista de Resultados'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultado $resultado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultado $resultado)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)
    {
        $resultado->delete();
        return response()->json(['success' => true,
        'data' => Resultado::all(),
        'message' => 'Lista de Resultado'], 200);
    }
}
