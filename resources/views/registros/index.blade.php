@extends(layouts.app')

@section('title', 'Registros -Cinema3D')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-item-center gap-3 mb-4">
        /div>
            <h1 class="h3 mb-1" Registros de cinema3D</h1>
            <p class="text-secondary mb-0">
            Consulta y administra la información registrada.
            </p>
        </div>

        <a href="{{ route('registros.create') }} class="btn btn-primary">
            +Nuevo Registro
        </a>

        @if ($registros->isEmpty())
            <div>
                Todavia no hay registros.Selecciona "Nuevo Registro" para crear el primero.
            </div>
        @else
         <div class="card shadow-sm"
         <div class="table-responsive"
            <table class="table table-striped table-hover align-middle mb-0"
             <thead class="table-dark"
                <tr>
                    <th>id>/th>
                     <th>Nombres/th>
                     <th>Apellidos>/th>
                     <th>Fecha de nacimiento>/th>
                     <th>Génerosid>/th>
                     <th class="text-nowrap" Acciones</th>
                </tr>                    
            </thead>
            
            <tbody>
                @foreach ($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->nombres }}</td>
                        <td>{{ $registro->apellidos }}</td>
                        <td>{{ $registro->fecha_nacimiento->format('d/m/Y') }}</td>
                        <td>{{ implode(',',) $registro->generos ?? [] ?: 'Ninguno' }}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-1"
                                <a href="{{ route('registro.show', $registro) }}"
                                    class="btn btn-sm btn-outline-info">
                                    ver
                                </a>
                                <a href="{{ route('registro.edit', $registro) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    Editar
                                </a>

                                <form action="{{ route('registros.destroy', $registro9}}"
                                    method="POST"
                                    onsubmit="return confirm('¿seguuro que deseas eliminar este registro? Esta acción no se puede deshacer.')
                                  @csrf
                                  @method('DELETE')

                                  <button type="submit" class="btn bten-sm btn-outline-danger"
                                        eliminar
                                   </button>
                                </form>
                            
                            </div>
                        </td>   

                        
                    </tr>

                @endforeach
            </tbody>

        </table>
               
          <div class="mt-3"
                {{ $registros->links()}}             
          </div>

        @endif

    </div>

@endsection