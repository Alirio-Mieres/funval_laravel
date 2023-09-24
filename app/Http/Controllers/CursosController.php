<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Cursos::all();
        return $docentes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // $request->validate()
            $curso = new Cursos();
            $curso->name = $request->name;
            $curso->code = $request->code;
            $curso->description = $request->description;
            $curso->startdate = $request->startdate;
            $curso->enddate = $request->enddate;
            $curso->save();
            return $curso;
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
        $curso = Cursos::find($id);
        
        if (!$curso) {
            return json_encode([
                'error' => 'No se encontro el curso'
            ]);
        }
        
        return $curso;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $docente = Cursos::find($id);
        $docente->update($request->all());
        return $docente;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->show($id);
        $docente = Cursos::destroy($id);        
        return $docente;
    }
}