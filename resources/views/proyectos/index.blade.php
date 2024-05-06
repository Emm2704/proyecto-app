<x-app-layout>
    <!-- Encabezado de la página -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Proyectos') }}
        </h2>
    </x-slot>
    
    <div class="container mt-5">

        @if (Auth::user()->name != '')
    <div style="background-color: #f0f0f0; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
        <h1 style="color: #333; font-size: 24px; text-align: center;">¡Hola {{ Auth::user()->name }}, estos son los proyectos!</h1>
    </div>
@endif

@if (Auth::user()->role == 'admin')
        <a href="{{ route('proyectos.create') }}" class="btn btn-dark" style="margin-bottom: 1%">Nuevo Proyecto</a>
        @endif  

        <!-- Controles de filtro -->
        <div class="mb-3">
            <label for="filtro-estado" class="form-label">Filtrar por estado:</label>
            <select id="filtro-estado" class="form-select">
                <option value="todos">Todos</option>
                <option value="detenido">Detenido</option>
                <option value="en-progreso">En progreso</option>
                <option value="completado">Completado</option>
            </select>
        </div>
        
        <!-- Tabla de proyectos -->
        <div class="table-responsive mt-4">
            <table id="tabla-proyectos" class="table table-striped">
                <!-- Encabezados de la tabla -->
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Presupuesto</th>
                        <th scope="col">Presupuesto Usado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Porcentaje de Avance</th>
                        <th scope="col">Inicio</th>
                        <th scope="col">Final</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    @foreach ($proyectos as $proyecto)
                    <tr class="
                        @if ($proyecto->estado == 'Detenido') detenido 
                        @elseif ($proyecto->estado == 'En progreso') en-progreso 
                        @elseif ($proyecto->estado == 'Completado') completado 
                        @endif">
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->nombre}}</td>
                        <td>{{ $proyecto->nombre_user}}</td>
                        <td>${{ $proyecto->presupuesto }}</td>
                        
                        @if($proyecto->presupuesto_usado == 0)
                            <td>$0</td>
                        @else
                            <td>${{ $proyecto->presupuesto_usado }}</td>
                        @endif

                        <td>{{ $proyecto->estado }}</td>
                        
                        @if($proyecto->porcentaje_avance == 0)
                            <td>0%</td>
                            @else
                            <td>${{ $proyecto->porcentaje_avance }}%</td>
                        @endif

                        <td>{{ $proyecto->fecha_inicio }}</td>
                        <td>{{ $proyecto->fecha_final }}</td>
                        <td>
                            <a href="{{ route('tareas.index', ['proyecto_id' => $proyecto->id]) }}" class="btn btn-primary">Ver Tareas</a>

                            @if (Auth::user()->role == 'admin')
                                <a href="{{ route('proyectos.edit', ['proyecto'=>$proyecto->id]) }}" class="btn btn-secondary">Editar</a>
                                <form action="{{ route('proyectos.destroy', ['proyecto' => $proyecto->id]) }}" method='POST' style="display:inline-block">
                                    @method('delete')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                </form>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para filtrar las filas de la tabla según el estado seleccionado
            $('#filtro-estado').change(function() {
                var estado = $(this).val();
                if (estado === 'todos') {
                    $('#tabla-proyectos tbody tr').show();
                } else {
                    $('#tabla-proyectos tbody tr').hide();
                    $('#tabla-proyectos tbody tr.' + estado).show();
                }
            });
        });
    </script>

    <!-- Estilos CSS -->
    <style>
        /* Estilos para las filas de la tabla según el estado */
        .detenido {
            background-color: #ffcccc; /* Rojo claro */
        }
        .en-progreso {
            background-color: #ffffcc; /* Amarillo claro */
        }
        .completado {
            background-color: #ccffcc; /* Verde claro */
        }
    </style>
</x-app-layout>
