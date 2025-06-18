<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use Closure;
use Illuminate\Http\Request;

class AutenticacionToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Token no proporcionado'], 401);
        }

        $usuario = Usuario::where('api_token', $token)->first();

        if (!$usuario) {
            return response()->json(['error' => 'Token inválido'], 401);
        }

        // Puedes guardar el usuario autenticado si quieres usarlo más adelante
        $request->merge(['usuario_autenticado' => $usuario]);

        return $next($request);
    }
}
