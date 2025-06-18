<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitaVacunacion;

class CitasVacunacionController extends Controller
{
    public function index()
    {
        return CitaVacunacion::with('animal')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_animal' => 'required|exists:animals,id_animal',
            'fecha_cita' => 'required|date',
            'tipo_vacuna' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $cita = CitaVacunacion::create($request->all());

        return response()->json($cita, 201);
    }

    public function show($id)
    {
        return CitaVacunacion::with('animal')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cita = CitaVacunacion::findOrFail($id);

        $request->validate([
            'id_animal' => 'sometimes|exists:animals,id_animal',
            'fecha_cita' => 'sometimes|date',
            'tipo_vacuna' => 'sometimes|string|max:100',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $cita->update($request->all());

        return response()->json($cita);
    }

    public function destroy($id)
    {
        $cita = CitaVacunacion::findOrFail($id);
        $cita->delete();

        return response()->json(['mensaje' => 'Cita de vacunación eliminada correctamente.']);
    }
}
