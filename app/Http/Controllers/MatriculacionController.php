<?php

namespace App\Http\Controllers;

use App\Models\Matriculacion;
use Illuminate\Http\Request;

class MatriculacionController extends Controller
{
    public function store(Request $request) {
        try {
            $request->validate([
                'curso_id' => 'required|exists:cursos,id',
                'alumno_id' => 'required|exists:alumnos,id',
            ]);

            $matriculacion = Matriculacion::create([
                'curso_id' => $request->curso_id,
                'alumno_id' => $request->alumno_id,
            ]);
    
            return $matriculacion;
        } catch (\Throwable $th) {
            return json_encode([
                'error' => $th->getMessage()
            ]);
        }
    }

    public function show($id) {
        try {
            $matriculacion = Matriculacion::find($id);
            if ($matriculacion == null) {
                throw new \Exception("La matriculacion no existe");
            }
            return $matriculacion;
        } catch (\Throwable $th) {
            return json_encode([
                'error' => $th->getMessage()
            ]);
        }
    }
}
