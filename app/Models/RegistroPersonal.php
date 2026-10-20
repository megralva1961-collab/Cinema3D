<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroPersonal extends Model
{
    protected $table = 'registros_personales?';
    protected $fillable = [
    'nombres',
    'apellidos',
    'fecha_nacimiento',
    'ninos',
    'madre_cabeza',
    'estudios',
    'generos',
];
    protected funcion casts(): array
    {
        return [
            'fecha_nacimiento' -> 'date',
            'ninos'-> 'integer',
            'madre_cabeza'-> 'boolean',
            'estudios'-> 'boolean',
            'generos'-> 'array',
        ];       
    }


}
