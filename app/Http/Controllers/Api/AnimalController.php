<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return response()->json($animales);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|string|max:50',
            'edad' => 'nullable|integer|min:0',
            'sexo' => 'required|in:M,F',
            'descripcion' => 'nullable|string',
            'estado_adopcion' => 'required|in:disponible,adoptado,en_proceso',
            'foto' => 'nullable|image|max:255',
            'id_adoptante' => 'nullable|exists:usuarios,id_usuario',
        ]);
        $data=$request->all();
        if ($request->hasFile('foto')) {
            $rutaImagen = $request->file('foto')->store('animals', 'public');
            $data['foto'] = $rutaImagen;
        }
        $animal = Animal::create($data);
        return response()->json($animal, 201);
    }

    public function show($id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['error' => 'Animal no encontrado'], 404);
        }
        return response()->json($animal);
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['error' => 'Animal no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|required|string|max:100',
            'tipo' => 'sometimes|required|string|max:50',
            'edad' => 'nullable|integer|min:0',
            'sexo' => 'sometimes|required|in:M,F',
            'descripcion' => 'nullable|string',
            'estado_adopcion' => 'sometimes|required|in:disponible,adoptado,en_proceso',
            'foto' => 'nullable|string|max:255',
            'id_adoptante' => 'nullable|exists:usuarios,id_usuario',
        ]);

        $animal->update($request->all());
        return response()->json($animal);
    }

    public function destroy($id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['error' => 'Animal no encontrado'], 404);
        }
        $animal->delete();
        return response()->json(['message' => 'Animal eliminado correctamente']);
    }
}
