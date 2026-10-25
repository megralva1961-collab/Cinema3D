@extends('layouts.app')
@section('title', 'Detalle del registro - cinema3D')
@section ('content')
    <div class="card shadow-sm"
        <div class="card-header d-flex justify-content-between align-item-center"
        <h1 Detalle del registro #{{ $registro->id }}</h1>

        <a href="{{ route('registros.edit', $registro) }}"
            class="btn btn-primary btn-sm">
            Editar
        </a>

    </div>

    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4>Nombres</dt>
            <dd class="col-sm-8>{{ $registro->nombres }}</dd>

            <dt class="col-sm-4>Apellidos</dt>
            <dd class="col-sm-8>{{ $registro->apellidos }}</dd>
            <dt class="col-sm-4>Fecha de nacimiento</dt>
                        <dd class="col-sm-8>{{ $registro->fecha_nacimiento }}</dd>
            <dt class="col-sm-4>Número de niños a cargo</dt>
                        <dd class="col-sm-8>{{ $registro->ninos }}</dd>
            <dt class="col-sm-4>Madre cabeza de familia</dt>
                        <dd class="col-sm-8>{{ $registro->madre_cabeza ? 'Sí' : 'No' }}</dd>
            <dt class="col-sm-4>Estudia técnico o tecnólogo</dt>
                        <dd class="col-sm-8>{{ $registro->estudio ? 'Sí': 'No' }}</dd>
            <dt class="col-sm-4>Géneros preferidos</dt>
                        <dd class="col-sm-8>{{ implode(', ', $registro->generos ?? []) ?: 'Ninguno' }}</dd>
            <dt class="col-sm-4>Fecha de creación</dt>
                        <dd class="col-sm-8>{{ $registro->created_at?format('d/m/Y h:1' ) }}</dd>
            <dt class="col-sm-4>Última actualización</dt>
                        <dd class="col-sm-8>{{ $registro->updated_at?format('d/m/Y h:1' ) }}</dd>
        </d1>

    </div>

@endsection

