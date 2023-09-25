<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    //
    public function store(Request $request)
    {
        try {
            $request->validate([
                'matricula_id' => 'required|exists:matriculaciones,id',
                'fecha' => 'required|date',
                'estado' => 'required|in:A,T,F',
            ]);

            $asistencia = new Asistencia();
            $asistencia->matricula_id = $request->matricula_id;
            $asistencia->fecha = $request->fecha;
            $asistencia->estado = $request->estado;
            $asistencia->save();
            return $asistencia;
        } catch (\Throwable $th) {
            return json_encode([
                'error' => $th->getMessage()
            ]);
        }
    }
}
