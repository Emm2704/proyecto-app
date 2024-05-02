<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap Linki -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Nueva Proyecto</title>
</head>
<body>
  <div class="p-5 mb-4 text-bg-dark container-fluid">
    <div class="container">
      <h1 class="display-5 fw-bold">Agregar Proyecto</h1>
    </div>
  </div>
    <div class="container">
      <div class="card">
          <div class="card-header">
              <span>Datos del proyecto</span>
          </div>
          <div class="card-body">
            <form method="POST" class="form-horizontal" action="{{ route('proyectos.store') }}">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre del Proyecto:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre de proyecto:">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="lider_id">Seleccione el Líder:</label>
                    <div class="col-sm-10">
                      <select class="form-select" id="lider_id" name="lider_id" required>
                          <option selected disabled value="">Seleccione lider...</option>
                          @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="presupuesto">Presupuesto:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="presupuesto" name="presupuesto" placeholder="Ejemplo: 75000">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="presupuesto_usado">Presupuesto usado:</label>
                    <div class="col-sm-10">
                        <input  disabled type="text" value="0" class="form-control" id="presupuesto_usado" name="presupuesto_usado" placeholder="Ingrese presupuesto_usado">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="estado">Seleccione el Estado:</label>
                    <div class="col-sm-10">
                      <select class="form-select" id="estado" name="estado" required>
                          <option selected disabled value="">Seleccione estado</option>
                              <option value="En progreso">En progreso</option>
                              <option value="Detenido">Detenido</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="porcentaje_avance">Porcentaje de avance:</label>
                    <div class="col-sm-10">
                        <input  disabled type="text" value="0" class="form-control" id="porcentaje_avance" name="porcentaje_avance" placeholder="Ingrese nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="fecha_inicio">Fecha de inicio:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Ingrese la fecha ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="fecha_final">Fecha de Final:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="fecha_final" name="fecha_final" placeholder="Ingrese la fecha ">
                    </div>
                </div>
                  <div class="form-group mt-3">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                          
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</x-app-layout>