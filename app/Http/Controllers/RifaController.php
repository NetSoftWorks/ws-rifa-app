<?php

namespace App\Http\Controllers;

use App\Models\Rifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RifaController extends Controller
{

    protected $reglasValidacion = [
        'valor' => 'required|numeric',
        'primera_suerte' => 'required|numeric',
        'segunda_suerte' => 'required|numeric',
        'tercera_suerte' => 'required|numeric',
        'cuarta_suerte' => 'required|numeric',
        'quinta_suerte' => 'required|numeric',
        'sexta_suerte' => 'required|numeric',
        'septima_suerte' => 'required|numeric',
        'cifras' => 'required|numeric',
        'valor' => 'required|numeric',
        'estado' => 'required|string|max:1'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Rifa::get();
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
            $reglasEspecificas = $this->reglasValidacion;
            $reglasEspecificas['valor'] = [
                'required',
                'numeric',
                Rule::unique('rifas')->where(function ($query) use ($request) {
                    return $query->where('valor', $request->valor)
                                 ->where('cifras', $request->cifras);
                }),
            ];
            $validator = Validator::make($request->all(), $reglasEspecificas);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $data = new Rifa();
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
     * @param  \App\Models\Rifa  $rifa
     * @return \Illuminate\Http\Response
     */
    public function show(Rifa $rifa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rifa  $rifa
     * @return \Illuminate\Http\Response
     */
    public function edit(Rifa $rifa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rifa  $rifa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rifa $rifa)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:rifas,id',
                'estado' => 'required|string|in:1,2',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $data = Rifa::find($request->id);
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
     * @param  \App\Models\Rifa  $rifa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rifa $rifa)
    {
        try {
            $response = Rifa::find($rifa->id);
            if ($response) {
                $response->delete();
                return response()->json(['result' => "Dato Eliminado", 'code' => '200']);
            }
            return response()->json(['result' => "Registro no encontrado", 'code' => '404']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function rifasActivas()
    {
        try {
            $response = Rifa::where('estado', '1')->get();
            if ($response) {
                return response()->json(['result' => $response, 'code' => '200']);
            } else
                return response()->json(['result' => "No hay registros", 'code' => '204']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }
}
