<x-app-layout>
    <!-- Encabezado de la página -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Proyectos') }}
        </h2>
    </x-slot>
    
    <div class="container mt-5">
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
                        <td>${{ $proyecto->presupuesto_usado }}</td>
                        <td>{{ $proyecto->estado }}</td>
                        <td>{{ $proyecto->porcentaje_avance }}%</td>
                        <td>
                            <a href="#" class="btn btn-primary">Ver Detalles</a>
                            <a href="#" class="btn btn-warning">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
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
