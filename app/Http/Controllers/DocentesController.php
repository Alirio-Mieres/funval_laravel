<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docentes::all();
        return $docentes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // $request->validate()
            $docente = new Docentes();
            $docente->firstname = $request->firstname;
            $docente->lastname = $request->lastname;
            $docente->email = $request->email;
            $docente->phone = $request->phone;
            $docente->birthdate = $request->birthdate;
            $docente->save();
            return $docente;
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
        $docente = Docentes::find($id);
        
        if (!$docente) {
            return json_encode([
                'error' => 'No se encontro el docente'
            ]);
        }
        
        return $docente;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $docente = Docentes::find($id);

        if (!$docente) {
            return json_encode([
                'error' => 'No se encontro el docente'
            ]);
        }
        
        $docente->update($request->all());
        return $docente;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->show($id);
        $docente = Docentes::destroy($id);        
        return $docente;
    }
}
