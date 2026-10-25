@extends('layouts.app')

@section('title', 'Nuevo Registro - Cinema3D')

@section('content')
    <div class="card shadow-sm"
        <div class="cardcard-header">
            <h1 class="h4 mb-0">Registrar Informació</h1>
        </div>
    <div class="card-body">
        @include('registros_form')    
    </div>

@endsection
    
