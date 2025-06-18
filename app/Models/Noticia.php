<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    
    protected $table = 'noticias';

    protected $primaryKey = 'id_noticia';

    public $timestamps = false;

    protected $fillable = [
        'fecha', 'lugar', 'titular', 'asunto',
        'contenido_resumido', 'contenido_completo', 'imagen'
    ];
}
