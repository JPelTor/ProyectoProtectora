<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    
    protected $table = 'calificaciones';

    protected $primaryKey = 'id_calificacion';

    public $timestamps = false;

    protected $fillable = [
        'id_usuario', 'id_animal', 'id_evento', 'puntuacion', 'comentario', 'fecha_calificacion'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id_animal', 'id_animal');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento', 'id_evento');
    }
}
