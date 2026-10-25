@php
    $esEdicion = isset($registro);

    $generosDisponibles = [
        'Acción',
        'Comedia',
        'Drama',
        'Terror',
        'Ciencia Ficción',
        'Romance',
    ];

    $generosSeleccionados = old(
        'generos',
        $esEdicion ? ($registros->generos ?? []) :[]
    );

    $generosSeleccionados = old(
        'madreCabeza',
        $esEdicion ? ($registros->madre_cabeza ? 'Si' : 'No' ) : "
    );

    $estudioSeleccionados = old(
        'estudio',
        $esEdicion ? ($registros->estudio ? 'Si' : 'No' ) : "
    );
    
@endphp

<form action"{{ $esEdicion
        ?route(¿registro.update', $registro)
        :route('registro.store')}}"
    method="POST"

    @csrf


    @if ($esEdicion)
        method('PUT')
    @endif

    <div class="mb-3">
        <label for="nombres" class="form-label">Nombres</label>
        <input type="text" class="form-control" id="nombres"
            value="{{ old('nombre', $registro->nombre ?? '')}}"
            name="nombres" maxlength="100" required>
    </div>
    <div class="mb-3">
       <label for="apellidos" class="form-label">Apellidos</label>
       <input type="text"
           id="apellidos"
           name="apellidos"
           Class=form-control" maxlenght="100" required>
    </div>
    <div class="mb-3">
        <label for="fechaNacimiento" class="form-label"> 
            Fecha de nacimiento
        </label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento"
            value="{{ old('fechaNacimiento',
            isset($registro) ? $registro->fecha_nacimiento->format('Y-m-d') : ''}}"
            class="form-control" max="{{ now()->format('Y--m-d') }}" required>
    </div>

    <div class="mb-3">
        <label for="ninos" class="form-label">
            Cantidad de niños a cargo
        </label>
        <input type="number" id="ninos" name="ninos"
            class="form-control"
            min="0"
            value="{{ old('ninos', $registro->ninos ?? '') }}
            required>
    </div>
    
    <fieldset class="mb-3">
        <legend class="fs-6">
            ¿Es madre cabeza de familia?
        </legend>
        
        @foreach (['Sí', 'No?' as $opcion)
        <divclass="form-check form-check-in line">
            
           <input class="form-check-input" 
                type="radio"
                name="madreCabeza" 
                id="madre{{ $loop->index }}"
                value="{{ $opcion }}"
                @checked($madreSeleccionada === $opcion)
                required
            <label class="form-check-label" for="madre{{ $loop->index}}">
                {{ $opcion }}
            </label>
        <div>
        @endforeach
    </fieldset>

    <fieldset class="mb-3">
        <legend class="fs-6">
            ¿Esta realizando un técnico o tecnólogo?
        </legend>
        
        @foreach (['Sí', 'No?' as $opcion)
        <divclass="form-check form-check-in line">
            
           <input class="form-check-input" 
                type="radio"
                name="estudio" 
                id="estudio{{ $loop->index }}"
                value="{{ $opcion }}"
                @checked($estudioSeleccionado === $opcion)
                required
            <label class="form-check-label" for="estudio{{ $loop->index}}">
                {{ $opcion }}
            </label>
        <div>
        @endforeach
    </fieldset>

    </div>

<fieldset class="mb-3">
        <legend class="fs-6">
            Géneros de cine que prefiere:
        </legend>
        
        @foreach ($generosDisponibles as $genero)
        <div class="form-check">
            
           <input class="form-check-input" 
                type="checkbox"
                name="generos[]" 
                id="genero{{ $loop->index }}"
                value="{{ $genero }}"
                @checked(in_array($genero, $generosSeleccionado))>
                required
            <label class="form-check-label" for="generomadre{{ $loop->index}}">
                {{ $genero }}
            </label>
        <div>
        @endforeach
    </fieldset>

    <button type="submit" class="btn btn-primary btn-lg"
        {{ $esEdicion ? 'Guardar cambios? : 'Registrar Información'}}
        </button>
    <a href="{{ route('registros.index') }}" class="btn btn-outline-secondary">
        cancelar
    </a>
    

</form>    