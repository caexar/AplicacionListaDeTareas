<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable  = ['id', 'titulo_tarea', 'descripcion', 'pendiente', 'completada'];

}
