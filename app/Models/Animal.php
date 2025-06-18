<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    
    protected $table = 'animals';

    protected $primaryKey = 'id_animal';

    public $timestamps = false;

    protected $fillable = [
        'nombre', 'tipo', 'edad', 'sexo', 'descripcion',
        'estado_adopcion', 'foto', 'fecha_ingreso', 'id_adoptante'
    ];

    public function adoptante()
    {
        return $this->belongsTo(Usuario::class, 'id_adoptante', 'id_usuario');
    }
}