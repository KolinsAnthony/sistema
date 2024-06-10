<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get("/admin", [\App\Http\Controllers\AdminController::class, "index"]);

    // va a crear 6 rutas
    Route::get("/admin/programa/buscar", [\App\Http\Controllers\programaController::class, "search"])
        ->name("programa.search");
    Route::resource("/admin/programa", \App\Http\Controllers\programaController::class)
        ->except("show");
    Route::get("/admin/programa/pdf", [\App\Http\Controllers\programaController::class, "pdf"])
        ->name("programa.pdf");
    // rutas para curso
    

    // rutas para usuario
    Route::get('/admin/usuario/search', [\App\Http\Controllers\UsuarioController::class, 'search'])->name('usuario.search');
    Route::resource('/admin/usuario', \App\Http\Controllers\UsuarioController::class)->except('show');
    Route::get("/admin/usuario/pdf", [\App\Http\Controllers\UsuarioController::class, "pdf"])->name("usuario.pdf");

    // rutas para rubro
    

    Route::get('/admin/rubro/search', [\App\Http\Controllers\rubroController::class, 'search'])->name('rubro.search');
    Route::get('/admin/rubros/pdf', [\App\Http\Controllers\rubroController::class, 'pdf'])->name('rubro.pdf');
    Route::resource('/admin/rubro', \App\Http\Controllers\rubroController::class)->except('show');

   

    Route::get('/admin/area/search', [\App\Http\Controllers\areaController::class, 'search'])->name('area.search');
    Route::get('/admin/areas/pdf', [\App\Http\Controllers\areaController::class, 'pdf'])->name('area.pdf');
    Route::resource('/admin/area', \App\Http\Controllers\areaController::class)->except('show');

    Route::get('/admin/comprobante/search', [\App\Http\Controllers\comprobanteController::class, 'search'])->name('comprobante.search');
    Route::get('/admin/comprobantes/pdf', [\App\Http\Controllers\comprobanteController::class, 'pdf'])->name('comprobante.pdf');
    Route::get('/admin/comprobantes/pdf2/{id}', [\App\Http\Controllers\comprobanteController::class, 'pdf2'])->name('comprobante.pdf2');
    Route::resource('/admin/comprobante', \App\Http\Controllers\comprobanteController::class)->except('show');


    Route::get('/admin/estudiante/search', [\App\Http\Controllers\estudianteController::class, 'search'])->name('estudiante.search');
    Route::get('/admin/estudiantes/pdf', [\App\Http\Controllers\estudianteController::class, 'pdf'])->name('estudiante.pdf');
    Route::resource('/admin/estudiante', \App\Http\Controllers\estudianteController::class)->except('show');

    Route::get('/admin/programa/search', [\App\Http\Controllers\programaController::class, 'search'])->name('programa.search');
    Route::get('/admin/programa/pdf', [\App\Http\Controllers\programaController::class, 'pdf'])->name('programa.pdf');
    Route::resource('/admin/programa', \App\Http\Controllers\programaController::class)->except('show');
});
