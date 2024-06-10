<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comprobante extends Model
{
    use HasFactory;

    protected $table = "comprobante";

   
    
}
class Registro extends Model
{
    protected $table = 'registros'; // Nombre real de tu tabla
    protected $fillable = ['monto']; // Asegúrate de incluir todas las columnas que deseas actualizar

    // Otros atributos y métodos del modelo...
}
