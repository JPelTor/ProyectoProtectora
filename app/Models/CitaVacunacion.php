<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaVacunacion extends Model
{
    use HasFactory;

    protected $table = 'cita_vacunacions';

    protected $primaryKey = 'id_cita';

    public $timestamps = false;

    protected $fillable = [
        'id_animal', 'fecha_cita', 'tipo_vacuna', 'observaciones'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id_animal', 'id_animal');
    }
}