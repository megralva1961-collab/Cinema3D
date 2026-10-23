<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroPersonal extends Model
{
    protected $table = 'registro_personals';
    protected $fillable = [
    'nombres',
    'apellidos',
    'fecha_nacimiento',
    'ninos',
    'madre_cabeza',
    'estudio',
    'generos',
];
    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
            'ninos' => 'integer',
            'madre_cabeza' => 'boolean',
            'estudio' => 'boolean',
            'generos' => 'array',
        ];       
    }


}
