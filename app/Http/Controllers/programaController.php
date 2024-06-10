<?php
namespace App\Http\Controllers;
use App\Models\programa;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Log;
 use Illuminate\Support\Facades\Validator;
 //uso de la librería dompdf
 use Barryvdh\DomPDF\Facade\Pdf;
 class programaController extends Controller
        {
            /**
             * Display a listing of the resource.
             */
            public function index()
            {
                return view("admin.programa.index");
            }
        
            //crear el método PDF
            public function pdf(){
                $programas=Programa::all();
                $pdf = Pdf::loadView('admin.programa.pdf', compact('programas'));
                return $pdf->stream();
            }
        
            public function search(Request $request)
            {
                $busqueda = $request->get('busqueda', '');
                $listado = programa::where('programa', 'LIKE', '%' . $busqueda . '%')
                ->orwhere('nombre_programa', 'LIKE', '%' . $busqueda . '%')
                ->select('id','programa', 'nombre_programa')->get();
                return view("admin.programa.list", [
                    "listado" => $listado
                ]);
            }
        
            /**
             * Show the form for creating a new resource.
             */
            public function create()
            {
                return view("admin.programa.create");
            }
        
            /**
             * Store a newly created resource in storage.
             */
            public function store(Request $request)
            {
                $validator = Validator::make($request->all(), [
                    
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
                    $programa = new Programa();
                   
                    $programa->programa = $request->get('programa');
                    $programa->nombre_programa = $request->get('nombre_programa');
                    $programa->save();
                    $data = [
                        'message' => 'Registrado correctamente'
                    ];
                    return response()->json($data, 201);
                } catch (\Throwable $error) {
                    Log::error($error->getMessage());
                    $data = [
                        'message' => 'Error al registrar el programa. Contactarse con el area de soporte'
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
                    $programa = Programa::find($id);
                    return view('admin.programa.edit', ["item" => $programa]);
                } catch (\Throwable $error) {
                    Log::error($error->getMessage());
                    $data = [
                        'message' => 'Error al registrar el programa. Contactarse con el area de soporte'
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
                    'programa' => 'required|string',
                    'nombre_programa' => 'required|string',
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
                    $programa = Programa::find($id);
                    $programa->programa = $request->get('programa');
                    $programa->nombre_programa = $request->get('nombre_programa');
                    $programa->save();
                    $data = ['message' => 'Actualizado correctamente'];
                    return response()->json($data, 200);
                } catch (\Throwable $error) {
                    Log::error($error->getMessage());
                    $data = [
                        'message' => 'Error al actualizar el programa'
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
            $programa = Programa::find($id);
             $programa->delete();
             $data = ['message' => 'Eliminado correctamente'];
             return response()->json($data, 200);} catch (\Throwable $error) {
                Log::error($error->getMessage());
                $data = ['message' => 'Error al eliminar programa'];
                return response()->json($data, 500);
                }
            }
        }
    