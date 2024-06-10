<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use App\Models\programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class estudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.");
    }

    public function search(Request $request)
    {
        $busqueda = $request->get('busqueda', '');
        /*
        SELECT curso.id, curso.nombre, curso.tipocurso_id, curso.imagen, tipocurso.nombre AS nombre_tipocurso
        FROM curso INNER JOIN tipocurso ON curso.tipocurso_id = tipocurso.id
        WHERE curso.nombre LIKE '%BUSQUEDA%'
         */
        $listado = estudiante::join('programa', 'estudiante.programa_id', '=', 'programa.id')
            ->where('estudiante.nombre', 'LIKE', '%' . $busqueda . '%')
            ->select('estudiante.id', 'estudiante.nombre', 'estudiante.programa_id','estudiante.dni','estudiante.apellido','estudiante.imagen', 'programa.nombre AS nombre_programa')
            ->get();
        // CALL listarCurso 'diplomado' SELECT
        // $listado = DB::select("SELECT curso.id, curso.nombre, curso.tipocurso_id, curso.imagen, tipocurso.nombre AS nombre_tipocurso
        //     FROM curso INNER JOIN tipocurso ON curso.tipocurso_id = tipocurso.id
        //     WHERE curso.nombre LIKE ?", ['%' . $busqueda . '%']);
        return view("admin.estudiante.list", [
            "listado" => $listado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programas = programa::orderBy('nombre', 'ASC')->select('id', 'nombre')->get();
        return view("admin.estudiante.create", ['programas' => $programas]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|min:3|max:50',
            'programa_id' => 'required|int',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        try {
            $estudiante = new estudiante();
            $estudiante->nombre = $request->get('nombre');
            $estudiante->apellido = $request->get('apellido');
            $estudiante->dni = $request->get('dni');
            $estudiante->programa_id = $request->get('programa_id');
            // subir imagen
            $estudiante->imagen = $request->file('imagen')->store("public/estudiantes");
            $estudiante->save();
            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar el estudiante. Contactarse con el area de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $estudiante = estudiante::find($id);
            $programa_estudiante = programa::orderBy('nombre', 'ASC')->select('id', 'nombre')->get();

            return view('admin.estudiante.edit', [
                "item" => $estudiante,
                "programa_estudiante" => $programa_estudiante,
            ]);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar el estudiante. Contactarse con el area de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|min:3|max:50',
            'apellido' => 'required|string|min:3|max:50',
            'dni' => 'required|string|min:3|max:50',
            
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $data = [
                'errors' => $errors,
                'message' => 'Error al validar los datos'
            ];

            return response()->json($data, 422);
        }

        try {
            $estudiante = estudiante::find($id);
            $estudiante->nombre = $request->get('nombre').value;
            $estudiante->apellido = $request->get('apellido').value;
            $estudiante->dni = $request->get('dni').value;
            $estudiante->programa_id = $request->get('programa_id').value;
            // subir imagen
            $estudiante->save();
            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el estudiante'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $estudiante = estudiante::find($id);
            $estudiante->delete();
            $data = ['message' => 'Eliminado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = ['message' => 'Error al eliminar curso'];
            return response()->json($data, 500);
        }
    }
}
