<?php

namespace App\Http\Controllers;
use App\Models\RegistroPersonal;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;

class RegistroPersonalController extends Controller
{
    public function store(Request $request)     
    {
        $datos = $request ->validate([
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'fechaNacimiento'=> ['required', 'date', 'before_or_equal:today'],
            'ninos' => ['required', 'integer', 'min:0'],
            'madreCabeza'=> ['required', Rule::in(['Sí', 'No'])],
            'estudios' => ['required', Rule::in(['Sí', 'No'])],
            'generos' => ['nullable', 'array'],
            'generos.*' => ['string', Rule::in(['Acción', 'Comedia', 'Drama', 'Terror', 'Ciencia Ficción', 'Romance'])],

        ]);

        $registro= RegistroPersonal::create([
            'nombres' => $datos['nombres'],
            'apellidos' => $datos['apellidos'],
            'fecha_nacimiento' => $datos ['fechanacimiento'],
            'ninos' => $datos['ninos'],
            'madre_cabeza' =>$datos['madreCabeza'] === 'Sí',
            'estudio' => $datos['estudio'] === 'Sí',
            'generos' => $datos['generos'] ?? [],
            
        ]);

        return response() ->json([
            'message' => 'Registro guardado correctamente.',
            'registro' => [
                'id' => $registro ->id,
                'nombre' => $registro->nombres,
                'apellidos' => $registro->apellidos,
                'fechaNacimiento' => $registro->fecha_nacimiento->format('Y-m-d'),
                'ninos'=> $registro->ninos,
                'madreCabeza' => $registro->madre_cabeza ? 'Sí' : 'No',
                'estudio' => $registro->madre_cabeza ? 'Sí' : 'No',
                'generos' => $registr0 ->generos ?? [],
            ],
        ], 201);





    }
//
}
