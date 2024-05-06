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
                <h1 style="color: #333; font-size: 24px; text-align: center;">¡Hola {{ Auth::user()->name }}, estas son los grupos!</h1>
            </div>
        @endif

        <a href="{{ route('grupos.create') }}" class="btn btn-dark" style="margin-bottom: 1%">Nuevo Grupo</a>  

        <!-- Tabla de proyectos -->
        <div class="table-responsive mt-1 mx-auto"> <!-- Agregamos la clase mx-auto para centrar horizontalmente -->
            <table id="tabla-proyectos" class="table table-striped">
                <!-- Encabezados de la tabla -->
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    @foreach ($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->id }}</td>
                        <td>{{ $grupo->nombre}}</td>
                        <td>
                            <a href="{{ route('grupos.edit', ['grupo'=>$grupo->id]) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</x-app-layout>
