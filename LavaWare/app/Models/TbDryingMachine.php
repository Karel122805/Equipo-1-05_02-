<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbDryingMachine extends Model
{
    use HasFactory;

    // Si el nombre de la tabla en la base de datos no sigue la convención, 
    // puedes especificar el nombre de la tabla aquí.
    protected $table = 'tb_drying_machine';

    // Los campos que pueden ser asignados masivamente
    protected $fillable = [
        'price', // Asumiendo que 'price' es el único campo editable
    ];

    // Si estás usando timestamps (created_at y updated_at) en tu base de datos,
    // no es necesario que añadas nada, ya que Laravel lo manejará automáticamente.
    // Si no estás utilizando timestamps, agrega la siguiente línea:
    // public $timestamps = false;
}
