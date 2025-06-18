<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolicitudAdopcion;

class SolicitudAdopcionController extends Controller
{
    public function index()
    {
        return SolicitudAdopcion::with(['usuario', 'animal'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_animal' => 'required|exists:animals,id_animal',
            'estado_solicitud' => 'required|in:pendiente,aprobada,rechazada',
            'comentarios' => 'nullable|string',
            'fecha_aprobacion' => 'nullable|date',
        ]);

        $solicitud = SolicitudAdopcion::create($request->all());

        return response()->json($solicitud, 201);
    }

    public function show($id)
    {
        return SolicitudAdopcion::with(['usuario', 'animal'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);

        $request->validate([
            'id_usuario' => 'sometimes|exists:usuarios,id_usuario',
            'id_animal' => 'sometimes|exists:animals,id_animal',
            'estado_solicitud' => 'sometimes|in:pendiente,aprobada,rechazada',
            'comentarios' => 'nullable|string',
            'fecha_aprobacion' => 'nullable|date',
        ]);

        $solicitud->update($request->all());

        return response()->json($solicitud);
    }

    public function destroy($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $solicitud->delete();

        return response()->json(['mensaje' => 'Solicitud eliminada']);
    }
}

