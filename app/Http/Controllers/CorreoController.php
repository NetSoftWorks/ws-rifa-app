<?php

namespace App\Http\Controllers;

use App\Mail\ActivacionCuentaMailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroMailable;
use App\Mail\RestablecerPasswordMailable;
use App\Mail\VoluntarioRechazadoMailable;

class CorreoController extends Controller
{    
    public function registroVoluntario(array $data) {
        try {
            
            Mail::to($data['correo'])
            ->send(new RegistroMailable($data));

            return response()->json(['result' => "Correo enviado correctamente", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function activacionCuenta(array $data) {
        try {
            
            Mail::to($data['correo'])
            ->send(new ActivacionCuentaMailable($data));

            return response()->json(['result' => "Correo enviado correctamente", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function restablecerPassword(array $data) {
        try {
            
            Mail::to($data['correo'])
            ->send(new RestablecerPasswordMailable($data));

            return response()->json(['result' => "Correo enviado correctamente", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function voluntarioRechazado(array $data) {
        try {
            Mail::to($data['correo'])
            ->send(new VoluntarioRechazadoMailable($data));

            return response()->json(['result' => "Correo enviado correctamente", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }
}
