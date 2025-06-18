<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios'; // nombre exacto de la tabla en BD

    protected $primaryKey = 'id_usuario';

    public $timestamps = false; // si no tienes columnas created_at y updated_at

    protected $fillable = [
        'nombre', 'correo_electronico', 'contrasena', 'tipo_usuario',
        'telefono', 'direccion', 'fecha_registro', 'api_token'
    ];

    protected $hidden = [
        'contrasena', 'api_token'
    ];

    // Para que Laravel use el campo 'contrasena' en vez de 'password'
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
