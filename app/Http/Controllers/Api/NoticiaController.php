<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index()
    {
        return Noticia::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:100',
            'titular' => 'required|string|max:255',
            'asunto' => 'required|string|max:255',
            'contenido_resumido' => 'required|string',
            'contenido_completo' => 'required|string',
            'imagen' => 'nullable|string|max:255',
        ]);

        $noticia = Noticia::create($request->all());

        return response()->json($noticia, 201);
    }

    public function show($id)
    {
        return Noticia::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        $request->validate([
            'fecha' => 'sometimes|date',
            'lugar' => 'sometimes|string|max:100',
            'titular' => 'sometimes|string|max:255',
            'asunto' => 'sometimes|string|max:255',
            'contenido_resumido' => 'sometimes|string',
            'contenido_completo' => 'sometimes|string',
            'imagen' => 'nullable|string|max:255',
        ]);

        $noticia->update($request->all());

        return response()->json($noticia);
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return response()->json(['mensaje' => 'Noticia eliminada correctamente.']);
    }
}
