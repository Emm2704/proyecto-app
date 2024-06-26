<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    // agrego archivos
    protected $fillable = [
        'titulo', 'descripcion', 'pdf_path', // otros campos
    ];
}
