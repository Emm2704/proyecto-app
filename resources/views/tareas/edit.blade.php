<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <!-- Bootstrap Linki -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <title>Editar Tarea</title>
    </head>
    <body>
      <div class="p-5 mb-4 text-bg-dark container-fluid">
        <div class="container">
          <h1 class="display-5 fw-bold">Editar Tarea</h1>
        </div>
      </div>
        <div class="container">
          <div class="card">
              <div class="card-header">
                  <span>Datos de la tarea</span>
              </div>
              <div class="card-body">
                <form method="POST" class="form-horizontal" action="{{ route('tareas.update', ['tarea' => $tarea ->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="titulo">Titulo de la tarea:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $tarea->titulo }}" placeholder="Ingrese titulo de tarea">
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lider_id">Seleccione el Encargado:</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="lider_id" name="lider_id" required>
                              <option selected disabled value="">Seleccione encargado...</option>
                              @foreach ($users as $user)
                                  <option value="{{ $user->id }}" {{ $user->id == $tarea->id_encargado ? 'selected' : '' }}>{{ $user->name }}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_proyecto">Seleccione el Proyecto:</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="id_proyecto" name="id_proyecto" required>
                              <option selected disabled value="">Seleccione proyecto...</option>
                              @foreach ($proyectos as $proyecto)
                                  <option value="{{ $proyecto->id }}" {{ $proyecto->id == $tarea->id_proyecto ? 'selected' : '' }}>{{ $proyecto->nombre }}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="descripcion">Descripcion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $tarea->descripcion }}" placeholder="Descripción">
                        </div>
                    </div>
    
                    
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="estado">Seleccione el Estado:</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="estado" name="estado" required>
                              <option selected disabled value="">Seleccione estado</option>
                                  <option value="En progreso" {{ $tarea->estado == 'En progreso' ? 'selected' : '' }}>En progreso</option>
                                  <option value="Detenido" {{ $tarea->estado == 'Detenido' ? 'selected' : '' }}>Detenido</option>
                          </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tipo">Seleccione el tipo:</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="tipo" name="tipo" required>
                              <option selected disabled value="">Seleccione estado</option>
                                  <option value="Basica" {{ $tarea->tipo == 'Basica' ? 'selected' : '' }}>Basica</option>
                                  <option value="Importante" {{ $tarea->tipo == 'Importante' ? 'selected' : '' }}>Importante</option>
                                  <option value="Urgente" {{ $tarea->tipo == 'Urgente' ? 'selected' : '' }}>Urgente</option>
                          </select>
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <label for="archivo" class="fcontrol-label col-sm-2">Archivo:</label>
                        <input type="file" name="archivo" id="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" />
                      </div>
                    
                    
                      <div class="form-group mt-3">
                          <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </body>
</x-app-layout>
