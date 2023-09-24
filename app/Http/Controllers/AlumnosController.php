<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Alumnos::all();
        return $docentes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // $request->validate()
            $alumno = new Alumnos();
            $alumno->firstname = $request->firstname;
            $alumno->lastname = $request->lastname;
            $alumno->email = $request->email;
            $alumno->phone = $request->phone;
            $alumno->birthdate = $request->birthdate;
            $alumno->save();
            return $alumno;
        } catch (\Throwable $th) {
            return json_encode([
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $alumno = Alumnos::find($id);

        if (!$alumno) {
            return json_encode([
                'error' => 'No se encontro el alumno'
            ]);
        }

        return $alumno;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $alumno = Alumnos::find($id);

        if (!$alumno) {
            return json_encode([
                'error' => 'No se encontro el alumno'
            ]);
        }
        
        $alumno->update($request->all());
        return $alumno;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->show($id);
        $alumno = Alumnos::destroy($id);
        return $alumno;
    }
}
