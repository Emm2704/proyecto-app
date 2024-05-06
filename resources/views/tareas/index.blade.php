<x-app-layout>
    <!-- Encabezado de la página -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Tareas') }}
        </h2>
    </x-slot>
    
    <div class="container mt-5">
        @if (Auth::user()->name != '')
            <div style="background-color: #f0f0f0; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
                <h1 style="color: #333; font-size: 24px; text-align: center;">¡Hola {{ Auth::user()->name }}, estas son las tareas!</h1>
            </div>
        @endif

        @if (Auth::user()->role == 'admin')
        <a href="{{ route('tareas.create') }}" class="btn btn-dark" style="margin-bottom: 1%">Nueva Tarea</a>
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
                        <th scope="col">Tarea</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Proyecto</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Archivo</th>
                        @if (Auth::user()->role == 'admin')
                        <th scope="col">Acciones</th>
                        @endif
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    @foreach ($tareas as $tarea)
                    <tr class="
                        @if ($tarea->estado == 'Detenido') detenido 
                        @elseif ($tarea->estado == 'En progreso') en-progreso 
                        @elseif ($tarea->estado == 'Completado') completado 
                        @endif">
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->titulo}}</td>
                        <td>{{ $tarea->descripcion}}</td>
                        <td>{{ $tarea->nombre_user }}</td>
                        <td>{{ $tarea->nombre_proyecto }}</td>
                        <td>{{ $tarea->tipo }}</td>
                        <td>{{ $tarea->estado }}</td>
                        <td>
                            <a href="{{ url('storage/' . $tarea->pdf_path) }}" download="{{ basename($tarea->pdf_path) }}">
                                <img src="https://cdn.icon-icons.com/icons2/272/PNG/512/Downloads_29996.png" alt="Icono de descarga" style="width: 30px;">
                            </a>
                        </td>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <a href="{{ route('tareas.edit', ['tarea'=>$tarea->id]) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_proyecto" value="{{ $tarea->id_proyecto }}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
                            </form>
                        </td>
                        @endif
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
