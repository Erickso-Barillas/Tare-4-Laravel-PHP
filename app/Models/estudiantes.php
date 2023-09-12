<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiantes extends Model
{
    use HasFactory;

    protected $table="estudiantes";
    protected $primarykey="id_estudiantes";
    public $timestamps = false;

    protected $fillable = [
        'carnet',
        'nombres',
        'apellidos',
        'dirección',
        'telefono',
        'correo_electronico',
        'id_tipo_sangre',
        'fecha_nacimiento',
    ];
}
