<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
//uso de la libreria
use Barryvdh\DomPDF\Facade\Pdf;

class estudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.estudiante.index");
    }
     //crear metodo pdf
     public function pdf(){
        $estudiante = estudiante::all();
        $pdf = Pdf::loadView('admin.estudiante.pdf', compact('estudiante'));
        return $pdf->stream();
    }
    public function search(Request $request)
    {
        // recuerar el parametro busqueda
        $busqueda = $request->get('busqueda', '');

        // realizar la busqueda
        // ORM -> ELOQUENT
        // select id, nombre_estudiante from tipocurso WHERE nombre_estudiante LIKE '%diplomado%' AND deleted_at IS NULL
        $listado = estudiante::where('id', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('dni', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('nombre', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('apellido', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('semestre', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('programa', 'LIKE', '%' . $busqueda . '%')
        ->select('id','dni','nombre','apellido','semestre','programa')->get();
        return view("admin.estudiante.list", [
            "listado" => $listado
        ]);
    }

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.estudiante.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // aplicar validacion de nuestros datos
        $validator = Validator::make($request->all(), [
           
            
        ]);

        if ($validator->fails()) {
            // retornar la lista de errores JSON
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        try {
            
            $dni = $request->get('dni');
            $nombre = $request->get('nombre'); 
            $apellido = $request->get('apellido');
            $semestre = $request->get('semestre');
            $programa = $request->get('programa');
           
           
            // crear un nuevo registro en la BD
            // INSERT INTO tipocurso (nombre_estudiantes, activo) VALUES ($nombre_estudiante, 1)
            $estudiante = new estudiante();
            $estudiante->dni = $dni;
            $estudiante->nombre = $nombre;
            $estudiante->apellido = $apellido;
            $estudiante->semestre = $semestre;
            $estudiante->programa = $programa;
           
          
            $estudiante ->save(); // encargado de aplicar el insert into

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
    public function edit(string $cod_estudiante)
    {
        try {
            // select * from tipocurso WHERE id = $id
            $estudiante = estudiante::find($cod_estudiante);
            // $tipocurso = Tipocurso::where('id', '=', $id)->first();
            return view('admin.estudiante.edit', ["item" => $estudiante]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cod_estudiante)
    {
        $validator = Validator::make($request->all(), [
           
        
            
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
           
           
            // crear un nuevo registro en la BD
            // INSERT INTO tipocurso (nombre_estudiantes, activo) VALUES ($nombre_estudiante, 1)
        

            $estudiante = estudiante::find($cod_estudiante);
            $estudiante->dni = $request->get('dni');
            $estudiante->nombre = $request->get('nombre');
            $estudiante->apellido = $request->get('apellido');
            $estudiante->semestre = $request->get('semestre');
            $estudiante->semestre = $request->get('semestre');
            $estudiante->programa = $request->get('programa');
            
            $estudiante->save(); // aplicando el UPDATE tipocurso SET nombre_estudiante = $reques WHERE id = $id
            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el tipo de curso'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cod_estudiante)
    {
        try {
            $estudiante = estudiante::find($cod_estudiante);
            $estudiante->delete(); // DELETE FROM tipocurso WHERE id =$id
            // UPDATE tipocurso SET deleted_at = TIMESTAMP where id = $id

            $data = ['message' => 'Eliminado correctamente'];

            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = ['message' => 'Error al eliminar estudiante'];

            return response()->json($data, 500);
        }
    }
}
