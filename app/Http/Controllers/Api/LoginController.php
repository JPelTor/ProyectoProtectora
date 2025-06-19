<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'correo_electronico' => 'required|email',
            'contrasena' => 'required'
        ]);
        $usuario = Usuario::where('correo_electronico', $request->correo_electronico)->first();
        if (
            !$usuario ||
            !Hash::check($request->contrasena, $usuario->contrasena)
        ) {
            return response()->json(
                ['error' => 'Credenciales no válidas'],
                401
            );
        } else {
            $usuario->api_token = Str::random(60);
            $usuario->save();
            return response()->json([
                'token' => $usuario->api_token,
                'usuario' => [
                    'nombre' => $usuario->nombre,
                    'tipo_usuario' => $usuario->tipo_usuario,
                    'correo_electronico' => $usuario->correo_electronico
                ]
            ]);
        }
    }
}
