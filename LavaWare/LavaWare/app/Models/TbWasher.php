<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbWasher extends Model
{
    use HasFactory;

    // Si el nombre de la tabla en la base de datos no sigue la convención,
    // puedes especificar el nombre de la tabla aquí
    protected $table = 'tb_washers'; // Ajusta el nombre de la tabla si es diferente

    // Define qué columnas pueden ser asignadas masivamente
    protected $fillable = ['type', 'price'];
}
