<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/docentes",
     *     summary="Mostrar docentes",
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los docentes."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index()
    {
        $docentes = Docentes::all();
        return $docentes;
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/api/docentes",
     *     summary="Crear un nuevo docente",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Datos del nuevo docente",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="firstname", type="string", example="Juan"),
     *             @OA\Property(property="lastname", type="string", example="Perez"),
     *             @OA\Property(property="email", type="string", format="email", example="juan@example.com"),
     *             @OA\Property(property="phone", type="string", example="123-456-7890"),
     *             @OA\Property(property="birthdate", type="date", example="1994-05-16"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Docente creado exitosamente."
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */

    public function store(Request $request)
    {
        try {
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:docentes,email,except,id',
                'phone' => 'required',
                'birthdate' => 'required|date',
            ]);

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
    /**
     * @OA\Get(
     *     path="/api/docentes/{id}",
     *     summary="Mostrar docentes por ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del docente",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar los detalles del docente por ID."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
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

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Put(
     *     path="/api/docentes/{id}",
     *     summary="Actualizar un docente por ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del docente a actualizar",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Datos del nuevo docente",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="firstname", type="string", example="Pedro"),
     *             @OA\Property(property="lastname", type="string", example="Perez"),
     *             @OA\Property(property="email", type="string", format="email", example="juan@example.com"),
     *             @OA\Property(property="phone", type="string", example="123-456-7890"),
     *             @OA\Property(property="birthdate", type="date", example="1994-05-16"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Docente creado exitosamente."
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
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
    /**
     * @OA\Delete(
     *     path="/api/docentes/{id}",
     *     summary="Eliminar un docente por ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del docente a eliminar",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Docente eliminado exitosamente."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Docente no encontrado."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $this->show($id);
        $docente = Docentes::destroy($id);
        return $docente;
    }
}
