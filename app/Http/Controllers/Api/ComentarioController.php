<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function index(Request $request)
    {
        $query = Comentario::query();

        if ($request->has('id_animal')) {
            $query->where('id_animal', $request->id_animal);
        }

        if ($request->has('id_evento')) {
            $query->where('id_evento', $request->id_evento);
        }

        if ($request->has('id_noticia')) {
            $query->where('id_noticia', $request->id_noticia);
        }

        return response()->json($query->orderBy('fecha_comentario', 'desc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer|exists:usuarios,id_usuario',
            'id_animal' => 'nullable|integer|exists:animals,id_animal',
            'id_evento' => 'nullable|integer|exists:eventos,id_evento',
            'id_noticia' => 'nullable|integer|exists:noticias,id_noticia',
            'texto' => 'required|string',
            'fecha_comentario' => 'required|date',
        ]);

        $refs = collect([$request->id_animal, $request->id_evento, $request->id_noticia])->filter();
        if ($refs->count() !== 1) {
            return response()->json(['error' => 'Debe asociarse a un solo tipo: animal, evento o noticia'], 422);
        }

        $comentario = Comentario::create($request->all());

        return response()->json($comentario, 201);
    }

    public function show($id)
    {
        return Comentario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);

        $request->validate([
            'id_usuario' => 'sometimes|exists:usuarios,id_usuario',
            'id_animal' => 'nullable|exists:animals,id_animal',
            'id_evento' => 'nullable|exists:eventos,id_evento',
            'id_noticia' => 'nullable|exists:noticias,id_noticia',
            'texto' => 'sometimes|string',
            'fecha_comentario' => 'sometimes|date',
        ]);

        $refs = collect([$request->id_animal, $request->id_evento, $request->id_noticia])->filter();
        if ($refs->count() > 1) {
            return response()->json(['error' => 'Solo puede asociarse a un tipo: animal, evento o noticia'], 422);
        }

        $comentario->update($request->all());

        return response()->json($comentario);
    }

    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return response()->json(['mensaje' => 'Comentario eliminado correctamente.']);
    }
}
