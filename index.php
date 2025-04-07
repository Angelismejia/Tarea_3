<?php
include 'componentes.php';
include 'clases.php';
include 'eliminar.php';
include 'editar.php';

?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Estudiantes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: blue;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      background-color: rgba(0, 0, 0, 0.8);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      text-align: center;
    }
    .botones a {
      text-decoration: none;
      background-color: rgb(255, 252, 50);
      color: black;
      padding: 12px 20px;
      border-radius: 5px;
      font-size: 20px;
      transition: 0.3s;
    }
    .botones a:hover {
      background-color: rgb(255, 252, 50);
    }
    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
      color: white;
      text-align: center;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: rgb(0, 114, 190);
    }
    tr:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }
    .botones {
      margin-top: 10px;
    }
    .botones a {
      background-color: #f44336;
    }
    .editar-btn {
      background-color: #4CAF50;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Lista de Estudiantes que han llegado Tarde</h1>
    <div class="botones">
      <a href="registrar.php">Registrar Tardanza de Estudiante</a>
    </div>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Matrícula</th>
          <th>Curso</th>
          <th>Ver Detalles</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Se asegura de que la función listar_registros devuelve un array de objetos Estudiante

          if (!empty($datos)) {
              foreach ($datos as $Estudiante) {
                  echo "<tr>
                          <td>{$Estudiante->nombre} {$Estudiante->apellido}</td>
                          <td>{$Estudiante->matricula}</td>
                          <td>{$Estudiante->curso}</td>
                          <td><a href='detalles.php?matricula={$Estudiante->matricula}' class='ver-detalle-btn'>Ver detalles</a></td>
                          <td><a href='editar.php?codigo={$Estudiante->matricula}' class='botones editar-btn'>Editar</a></td>
                          <td><a href='eliminar.php?codigo={$Estudiante->matricula}' class='botones'>Eliminar</a></td>
                        </tr>";
              }
          } else {
              echo "<tr><td colspan='6'>No hay registros de estudiantes.</td></tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
