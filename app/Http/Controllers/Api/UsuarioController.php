<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'correo_electronico' => 'required|email|unique:usuarios,correo_electronico',
            'contrasena' => 'required|string|min:6',
            'tipo_usuario' => 'required|in:adoptante,voluntario,administrador',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        $validated['contrasena'] = Hash::make($validated['contrasena']);
        $usuario = Usuario::create($validated);
        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'correo_electronico' => 'sometimes|email|unique:usuarios,correo_electronico,' . $id . ',id_usuario',
            'contrasena' => 'nullable|string|min:6',
            'tipo_usuario' => 'required|in:adoptante,voluntario,administrador',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        if (isset($validated['contrasena'])) {
            $validated['contrasena'] = Hash::make($validated['contrasena']);
        }

        $usuario->update($validated);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(['mensaje' => 'Usuario eliminado']);
    }
}
