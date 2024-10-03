<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    protected $reglasValidacion = [
        'rol_id' => 'required|integer|exists:roles,id',
        'usuario' => 'required|string|max:15',
        'correo' => 'required|string|email|max:50'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Usuario::with('rol')->get();
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
            $reglasEspecificas['usuario'] = 'required|string|max:15|unique:usuarios,usuario';
            $reglasEspecificas['correo'] = 'required|string|email|max:50|unique:usuarios,correo';
            $validator = Validator::make($request->all(), $reglasEspecificas);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $password = $this->generarPassword();

            $data = $request->all();
            $data['password'] = Hash::make($password);
            $usuario = new Usuario();
            $usuario->fill($data);
            $usuario->save();

            $mailData = [
                'correo' => $request->correo,
                'usuario' => $request->usuario,
                'rol' => $request->rol,
                'password' => $password,
            ];
            $correoController = new CorreoController();
            $correoController->activacionCuenta($mailData);

            return response()->json(['result' => "Dato Registrado", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
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
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:usuarios,id',
                'estado' => 'required|string|in:1,2', // Asumiendo que los valores válidos para estado son '1' y '2'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $usuario = Usuario::find($request->id);
            $usuario->fill($request->all());
            $usuario->update();
            return response()->json(['result' => "Dato Actualizado", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
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
        try {
            $response = Usuario::find($id);
            if ($response) {
                $response->delete();
                return response()->json(['result' => "Dato Eliminado", 'code' => '200']);
            }
            return response()->json(['result' => "Registro no encontrado", 'code' => '404']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'correo' => 'required|string|email',
                'password' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            return $this->validarCredenciales($request->correo, $request->password, 'login');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function restablecerPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'usuario_id' => 'required|integer|exists:usuarios,id',
                'correo' => 'required|string|email',
                'usuario' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string'

            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $response = $this->validarCredenciales($request->email, $request->password, 'validar');
            if (strpos($response, '"code":"200"') !== false) {

                $password = $this->generarPassword();
                $mailData = [
                    'correo' => $request->correo,
                    'usuario' => $request->usuario,
                    'password' => $password,
                ];

                $data = Usuario::find($request->usuario_id);
                $data->fill($request->all());
                $data->password = Hash::make($password);
                $data->update();

                $correoController = new CorreoController();
                $correoController->restablecerPassword($mailData);

                return response()->json(['result' => "Restablecimiento Realizado", 'code' => '200']);
            }

            return response()->json(['result' => "Acceso Denegado", 'code' => '409']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function validarCredenciales(string $correo, string $password, string $tipo)
    {
        try {
            $response = Usuario::where('correo', $correo)->with('rol')->first();

            if ($response && password_verify($password, $response->password)) {
                if($response->estado == '1'){
                    if ($tipo == 'validar') {
                        return response()->json(['code' => '200']);
                    } else {
                        Auth::loginUsingId($response->id_usuario);
                        $token = $response->createToken('accessToken')->plainTextToken;
                        return response()->json(['result' => $response, 'code' => '200', 'token' => $token]);
                    }
                } else {
                    return response()->json(['result' => "Usuario desactivado", 'code' => '401']);
                }
                
            }

            return response()->json(['result' => "Registro no encontrado", 'code' => '404']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function generarPassword()
    {
        $password = Str::random(10);
        $password .= rand(0, 9);
        $password .= Str::random(1, '!@#$%^&*()');
        $password = str_shuffle($password);

        return $password;
    }
}
