<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calificacion;

class CalificacionController extends Controller
{
    public function index()
    {
        return Calificacion::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_animal' => 'nullable|exists:animales,id',
            'id_evento' => 'nullable|exists:eventos,id',
            'puntuacion' => 'required|numeric|min:1|max:5',
            'comentario' => 'nullable|string',
            'fecha_calificacion' => 'required|date',
        ]);
        
        $refs = collect([$request->id_animal, $request->id_evento])->filter();
        if ($refs->count() !== 1) {
            return response()->json(['error' => 'Debe asociarse solo a un animal o evento'], 422);
        }

        $calificacion = Calificacion::create($request->all());

        return response()->json($calificacion, 201);
    }

    public function show($id)
    {
        return Calificacion::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $calificacion = Calificacion::findOrFail($id);

        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_animal' => 'nullable|exists:animales,id',
            'id_evento' => 'nullable|exists:eventos,id',
            'puntuacion' => 'required|numeric|min:1|max:5',
            'comentario' => 'nullable|string',
            'fecha_calificacion' => 'required|date',
        ]);

        $refs = collect([$request->id_animal, $request->id_evento])->filter();
        if ($refs->count() !== 1) {
            return response()->json(['error' => 'Debe asociarse solo a un animal o evento'], 422);
        }

        $calificacion->update($request->all());

        return response()->json($calificacion);
    }

    public function destroy($id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->delete();

        return response()->json(['mensaje' => 'Calificación eliminada correctamente.']);
    }
}
