<?php
include 'componentes.php'; // Incluir archivo con funciones
include 'clases.php'; // Suponiendo que aquí están definidas las clases necesarias

// Verificar si se recibió la matrícula por GET
if (isset($_GET['matricula'])) {
    // Obtener la matrícula desde la URL
    $matricula = $_GET['matricula'];

    // Cargar los datos del estudiante usando la función cargar_datos
    $estudiante = cargar_datos($matricula);

    // Verificar si se encontraron datos del estudiante
    if ($estudiante) {
?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Estudiante</title>
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
  </style>
</head>
<body>
  <div class="container">
    <h1>Detalles del Estudiante</h1>
    <table>
      <tbody>
        <tr>
          <th>Nombre</th>
          <td><?= $estudiante->nombre ?></td>
        </tr>
        <tr>
          <th>Apellido</th>
          <td><?= $estudiante->apellido ?></td>
        </tr>
        <tr>
          <th>Matrícula</th>
          <td><?= $estudiante->matricula ?></td>
        </tr>
        <tr>
          <th>Curso</th>
          <td><?= $estudiante->curso ?></td>
        </tr>
        <!-- Agregar más detalles según tus necesidades -->
      </tbody>
    </table>
    <div class="botones">
      <a href="index.php">Volver a la Lista</a>
    </div>
  </div>
</body>
</html>
<?php
    } else {
        // Si no se encontraron datos del estudiante
        echo "<p>No se encontraron detalles para la matrícula proporcionada.</p>";
    }
} else {
    // Si no se proporcionó la matrícula en la URL
    echo "<p>Error: No se proporcionó la matrícula del estudiante.</p>";
}
?>
