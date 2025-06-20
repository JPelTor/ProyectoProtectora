<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    
    protected $table = 'eventos';

    protected $primaryKey = 'id_evento';

    public $timestamps = false;

    protected $fillable = [
        'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'lugar', 'imagen'
    ];
}