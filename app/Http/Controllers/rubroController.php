<?php

namespace App\Http\Controllers;

use App\Models\rubro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
//uso de la libreria
use Barryvdh\DomPDF\Facade\Pdf;

class rubroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.rubro.index");
    }
     //crear metodo pdf
     public function pdf(){
        $rubros = rubro::all();
        $pdf = Pdf::loadView('admin.rubro.pdf', compact('rubros'));
        return $pdf->stream();
    }
    public function search(Request $request)
    {
        // recuerar el parametro busqueda
        $busqueda = $request->get('busqueda', '');

        // realizar la busqueda
        // ORM -> ELOQUENT
        // select id, nombre_rubro from tipocurso WHERE nombre_rubro LIKE '%diplomado%' AND deleted_at IS NULL
        $listado = rubro::where('id', 'LIKE', '%' . $busqueda . '%')->select('id','nombre_rubro','monto')->get();
        return view("admin.rubro.list", [
            "listado" => $listado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.rubro.create");
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
            
            
            $nombre_rubro = $request->get('nombre_rubro');
            $monto = $request->get('monto');
            // crear un nuevo registro en la BD
            // INSERT INTO tipocurso (nombre_rubros, activo) VALUES ($nombre_rubro, 1)
            $rubro = new rubro();
           
            $rubro->nombre_rubro = $nombre_rubro;
            $rubro->monto = $monto;
           
        
            $rubro ->save(); // encargado de aplicar el insert into

            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = [
                'message' => 'Error al registrar el rubro. Contactarse con el area de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cod_rubro)
    {
        try {
            // select * from tipocurso WHERE id = $id
            $rubro = rubro::find($cod_rubro);
            // $tipocurso = Tipocurso::where('id', '=', $id)->first();
            return view('admin.rubro.edit', ["item" => $rubro]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cod_rubro)
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
            $rubro = rubro::find($cod_rubro);
            $rubro->nombre_rubro = $request->get('nombre_rubro');
            $rubro->monto = $request->get('monto');
           
            $rubro->save(); // aplicando el UPDATE tipocurso SET nombre_rubro = $reques WHERE id = $id
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
    public function destroy(string $cod_rubro)
    {
        try {
            $rubro = rubro::find($cod_rubro);
            $rubro->delete(); // DELETE FROM tipocurso WHERE id =$id
            // UPDATE tipocurso SET deleted_at = TIMESTAMP where id = $id

            $data = ['message' => 'Eliminado correctamente'];

            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = ['message' => 'Error al eliminar rubro'];

            return response()->json($data, 500);
        }
    }
}
