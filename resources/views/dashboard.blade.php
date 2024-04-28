<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')
  <div class="container mt-5">
    <h1>Panel de Control</h1>

    <!-- Tabla de Proyectos -->
    <div class="table-responsive mt-4">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nombre del Proyecto</th>
            <th scope="col">Líder</th>
            <th scope="col">Presupuesto</th>
            <th scope="col">Presupuesto Usado</th>
            <th scope="col">Porcentaje de Avance</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Proyecto A</td>
            <td>Juan Pérez</td>
            <td>$10,000</td>
            <td>$7,500</td>
            <td>75%</td>
          </tr>
          <tr>
            <td>Proyecto B</td>
            <td>Maria González</td>
            <td>$15,000</td>
            <td>$10,000</td>
            <td>66.67%</td>
          </tr>
          <!-- Puedes agregar más filas para más proyectos -->
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
