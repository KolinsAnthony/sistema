<?php

namespace App\Http\Controllers;

use App\Models\area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
//uso de la libreria
use Barryvdh\DomPDF\Facade\Pdf;

class areaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.area.index");
    }
     //crear metodo pdf
     public function pdf(){
        $area = area::all();
        $pdf = Pdf::loadView('admin.area.pdf', compact('area'));
        return $pdf->stream();
    }
    public function search(Request $request)
    {
        // recuerar el parametro busqueda
        $busqueda = $request->get('busqueda', '');

        // realizar la busqueda
        // ORM -> ELOQUENT
        // select id, nombre_area from tipocurso WHERE nombre_area LIKE '%diplomado%' AND deleted_at IS NULL
        $listado = area::where('cod_area', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('nombre_area', 'LIKE', '%' . $busqueda . '%')
        
        ->select('id','cod_area','nombre_area')->get();
        
        return view("admin.area.list", [
            "listado" => $listado
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.area.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // aplicar validacion de nuestros datos
        $validator = Validator::make($request->all(), [
            'cod_area' => 'required|string',
            'nombre_area' => 'required',
            
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
            
            $cod_area = $request->get('cod_area');
            
           
            $nombre_area = $request->get('nombre_area');
            
           
            // crear un nuevo registro en la BD
            // INSERT INTO tipocurso (nombre_areas, activo) VALUES ($nombre_area, 1)
            $area = new area();
            
            $area->cod_area = $cod_area;
            $area->nombre_area = $nombre_area;

            
            
            $area ->save(); // encargado de aplicar el insert into

            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = [
                'message' => 'Error al registrar el area. Contactarse con el area de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cod_area)
    {
        try {
            // select * from tipocurso WHERE id = $id
            $area = area::find($cod_area);
            // $tipocurso = Tipocurso::where('id', '=', $id)->first();
            return view('admin.area.edit', ["item" => $area]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cod_area)
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
            $area = area::find($cod_area);
           
            $area->nombre_area = $request->get('nombre_area');
            
            
            $area->save(); // aplicando el UPDATE tipocurso SET nombre_area = $reques WHERE id = $id
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
    public function destroy(string $cod_area)
    {
        try {
            $area = area::find($cod_area);
            $area->delete(); // DELETE FROM tipocurso WHERE id =$id
            // UPDATE tipocurso SET deleted_at = TIMESTAMP where id = $id

            $data = ['message' => 'Eliminado correctamente'];

            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = ['message' => 'Error al eliminar area'];

            return response()->json($data, 500);
        }
    }
}
