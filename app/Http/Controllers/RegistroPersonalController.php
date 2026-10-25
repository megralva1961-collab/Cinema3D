<?php

namespace App\Http\Controllers;

use App\Models\RegistroPersonal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistroPersonalController extends Controller
{
    private function reglas(): array
    {
        return [
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'fechaNacimiento'=> ['required', 'date', 'before_or_equal:today'],
            'ninos' => ['required', 'integer', 'min:0'],
            'madreCabeza'=> ['required', Rule::in(['Sí', 'No'])],
            'estudio' => ['required', Rule::in(['Sí', 'No'])],
            'generos' => ['nullable', 'array'],
            'generos.*' => ['string', Rule::in(['Acción', 'Comedia', 'Drama', 'Terror', 'Ciencia Ficción', 'Romance'])],
        ];
    }

    private function prepararDatos(array $datos):array
    {
        return[
            'nombres' => $datos['nombres'],
            'apellidos' => $datos['apellidos'],
            'fecha_nacimiento' => $datos ['fechaNacimiento'],
            'ninos' => $datos['ninos'],
            'madre_cabeza' =>$datos['madreCabeza'] === 'Sí',
            'estudio' => $datos['estudio'] === 'Sí',
            'generos' => $datos['generos'] ?? [],
        ];
    }

    public function index()
    {
        $registros = RegistroPersonal::latest('id')->paginate(10);

        return view('registros.index', compact('registros'));
    }

    public function create()
    {
        return view('registros.create');
    }

    public function store(Request $request)
    {
       $datos = $request->validate($this->reglas());

       $registro = RegistroPersonal::create(
          $this->prepararDatos($datos)
       );
       
       return redirect()
            ->route('registros.index')
            ->with('success',"Registro #{$registro->id}creado correctamente.");
    }
    
    public function show(RegistroPersonal $registro)
    {
        return view('registros.show', compact('registro'));
    }

    public function edit(registropersonal $registro)
    {
        return view('registros.edit', compact('registro'));
    }

    public function update(Request $request, RegistroPersonal $registro)    
    {
               $datos = $request->validate($this->reglas());

       $registro ->update($this->prepararDatos($datos));
       
       return redirect()
            ->route('registros.index')
            ->with('success',"Registro #{$registro->id}actualizado correctamente.");
    }

    public function destroy(RegistroPersonal $registro)
    {
        $id = $registro->id;

       $registro ->delete();
       
       return redirect()
            ->route('registros.index')
            ->with('success',"Registro #{$id} eliminado correctamente.");
    }
}
