<?php

namespace App\Http\Controllers;

use App\Models\comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
//uso de la libreria
use Barryvdh\DomPDF\Facade\Pdf;

use function Ramsey\Uuid\v1;
class comprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.comprobante.index");
    }
     //crear metodo pdf
     public function pdf()
    {
    $comprobante = comprobante::all();

    // Crear una instancia de Dompdf
    $pdf = Pdf::loadView('admin.comprobante.pdf', compact('comprobante'));

    // Obtener la instancia de Dompdf
    $domPdf = $pdf->getDomPdf();

    // Configurar la orientación a horizontal
    $domPdf->set_option('isHtml5ParserEnabled', true);
    $domPdf->set_option('isPhpEnabled', true);
    $domPdf->set_option('isPhpEnabled', true);
    $domPdf->setPaper('A4', 'landscape');

    return $pdf->stream();
    }

    public function pdf2($id)
    {
        // Obtén el comprobante específico basado en el $id
        $comprobante = comprobante::findOrFail($id);

        // Crear una instancia de Dompdf para el PDF individual
        $pdf2 = PDF::loadView('admin.comprobante.pdf2', compact('comprobante'));

        // Obtener la instancia de Dompdf
        $domPdf = $pdf2->getDomPdf();

        // Configurar la orientación a horizontal (o según tus necesidades)
        $domPdf->set_option('isHtml5ParserEnabled', true);
        $domPdf->set_option('isPhpEnabled', true);
        $domPdf->set_option('isPhpEnabled', true);
        $domPdf->setPaper('A4', 'landscape');

        return $pdf2->stream();
    }

    public function search(Request $request)
    {
        // recuerar el parametro busqueda
        $busqueda = $request->get('busqueda', '');

        // realizar la busqueda
        // ORM -> ELOQUENT
        // select id, nombre_comprobante from tipocurso WHERE nombre_comprobante LIKE '%diplomado%' AND deleted_at IS NULL
        $listado = comprobante::where('id', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('nombre_rubro', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('dni', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('estado', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('apellido', 'LIKE', '%' . $busqueda . '%')
        ->orwhere('programa', 'LIKE', '%' . $busqueda . '%')
        ->select('id','nombre_rubro',
        'semestre','nombre_area','fecha','dni','estado','monto','nombre','apellido','programa')->get();
        return view("admin.comprobante.list", [
            "listado" => $listado
        ]);
    }
 


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.comprobante.create");
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
            $semestre = $request->get('semestre');
            $nombre_area = $request->get('nombre_area');
            $fecha = $request->get('fecha');
            $dni = $request->get('dni');
            $estado = $request->get('estado');
            $monto = $request->get('monto');
            $nombre = $request->get('nombre');
            $apellido = $request->get('apellido');
            $programa = $request->get('programa');

           
            // crear un nuevo registro en la BD
            // INSERT INTO tipocurso (nombre_comprobantes, activo) VALUES ($nombre_comprobante, 1)
            $comprobante = new comprobante();
            $comprobante->nombre_rubro = $nombre_rubro;
            $comprobante->semestre = $semestre;
            $comprobante->nombre_area = $nombre_area;
            $comprobante->fecha = $fecha;
            $comprobante->dni = $dni;
            $comprobante->estado = $estado;
            $comprobante->monto = $monto;
            $comprobante->nombre = $nombre;

            $comprobante->apellido = $apellido;
            $comprobante->programa = $programa;
            
            $comprobante ->save(); // encargado de aplicar el insert into

            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = [
                'message' => 'Error al registrar el comprobante. Contactarse con el area de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cod_comprobante)
    {
        try {
            // select * from tipocurso WHERE id = $id
            $comprobante = comprobante::find($cod_comprobante);
            // $tipocurso = Tipocurso::where('id', '=', $id)->first();
            return view('admin.comprobante.edit', ["item" => $comprobante]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cod_comprobante)
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

            


            $comprobante = comprobante::find($cod_comprobante);
            $comprobante->nombre_rubro = $request->get('nombre_rubro');
            $comprobante->semestre = $request->get('semestre');
            $comprobante->nombre_area = $request->get('nombre_area');
            $comprobante->fecha = $request->get('fecha');
            $comprobante->dni = $request->get('dni');
            $comprobante->estado = $request->get('estado');
            $comprobante->monto = $request->get('monto');
            $comprobante->nombre = $request->get('nombre');
            $comprobante->apellido = $request->get('apellido');
            $comprobante->programa = $request->get('programa');
            
            $comprobante->save(); // aplicando el UPDATE tipocurso SET nombre_comprobante = $reques WHERE id = $id
            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el comprobante'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cod_comprobante)
    {
        try {
            $comprobante = comprobante::find($cod_comprobante);
            $comprobante->delete(); // DELETE FROM tipocurso WHERE id =$id
            // UPDATE tipocurso SET deleted_at = TIMESTAMP where id = $id

            $data = ['message' => 'Eliminado correctamente'];

            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = ['message' => 'Error al eliminar comprobante'];

            return response()->json($data, 500);
        }
    }
    
}
