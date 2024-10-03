<?php

namespace App\Http\Controllers;

use App\Models\Suerte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuerteController extends Controller
{
    protected $reglasValidacion = [
        'primera_suerte' => 'required|string',
        'segunda_suerte' => 'required|string',
        'tercera_suerte' => 'required|string',
        'cuarta_suerte' => 'required|string',
        'quinta_suerte' => 'required|string',
        'sexta_suerte' => 'required|string',
        'septima_suerte' => 'required|string',
        'fecha' => 'required|date'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Suerte::get();
            if ($response) {
                return response()->json(['result' => $response, 'code' => '200']);
            } else
                return response()->json(['result' => "No hay registros", 'code' => '204']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
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
        try {
            $validator = Validator::make($request->all(), $this->reglasValidacion);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $fechaExistente = Suerte::where('fecha', $request->fecha)->first();
            if ($fechaExistente) {
                return response()->json(['error' => 'La fecha ya existe en el registro.', 'code' => '401']);
            }

            $data = new Suerte();
            $data->fill($request->all());
            $data->save();

            return response()->json(['result' => "Dato Registrado", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suerte  $suerte
     * @return \Illuminate\Http\Response
     */
    public function show(Suerte $suerte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suerte  $suerte
     * @return \Illuminate\Http\Response
     */
    public function edit(Suerte $suerte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suerte  $suerte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suerte $suerte)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:suertes,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $data = Suerte::find($request->id);
            $data->fill($request->all());
            $data->update();
            return response()->json(['result' => "Dato Actualizado", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suerte  $suerte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suerte $suerte)
    {
        try {
            $response = Suerte::find($suerte->id);
            if ($response) {
                $response->delete();
                return response()->json(['result' => "Dato Eliminado", 'code' => '200']);
            }
            return response()->json(['result' => "Registro no encontrado", 'code' => '404']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function suerteFecha($fecha) {
        try {
            $response = Suerte::whereDate('fecha_venta', $fecha)->get();

            if ($response) {
                return response()->json(['result' => $response, 'code' => '200']);
            } else
                return response()->json(['result' => 0, 'code' => '204']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }
}
