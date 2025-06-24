<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Verifica que haya un usuario logueado y que su rol esté permitido
        if (!$user || !in_array($user->rol, $roles)) {
            return response()->json(['error' => 'No autorizado.'], 403);
        }

        return $next($request);
    }
}
