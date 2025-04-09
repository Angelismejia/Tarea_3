<?php
// Incluir las funciones necesarias
include 'componentes.php';
include 'clases.php';

// Función para guardar los datos modificados del estudiante
function guardar_estudiante($codigo, $datos) {
    $ruta = __DIR__ . "/datos/" . $codigo . ".dat";
    if (file_exists($ruta)) {
        file_put_contents($ruta, serialize($datos));
        return true;
    }
    return false;
}

// Verificar si el código del estudiante ha sido proporcionado
if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $estudiante = cargar_datos($codigo);

    if (!$estudiante) {
        header("Location: index.php?mensaje=Estudiante no encontrado");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $curso = $_POST['curso'];

        $estudiante->nombre = $nombre;
        $estudiante->apellido = $apellido;
        $estudiante->curso = $curso;

        if (guardar_estudiante($codigo, $estudiante)) {
            header("Location: index.php?mensaje=Estudiante actualizado correctamente");
            exit();
        } else {
            $mensaje = "Hubo un error al guardar los cambios.";
        }
    }
} else {
    header("Location: index.php?mensaje=No se proporcionó un código de estudiante válido");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Estudiante</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: rgb(0, 114, 190);
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
    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ddd;
    }

    .guardar-btn {
      background-color: #FFEB3B;
      color: black;
      padding: 16px 28px;
      font-size: 22px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
      margin-top: 20px;
    }

    .guardar-btn:hover {
      background-color: #FDD835;
    }

    .botones {
      margin-top: 20px;
    }

    .cancelar-btn {
      text-decoration: none;
      background-color: #f44336;
      color: white;
      padding: 12px 20px;
      border-radius: 5px;
      font-size: 18px;
      display: inline-block;
      transition: 0.3s;
    }

    .cancelar-btn:hover {
      background-color: #f44336;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Editar Estudiante</h1>
    <form action="editar.php?codigo=<?= htmlspecialchars($codigo) ?>" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($estudiante->nombre) ?>" required>
      </div>
      <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?= htmlspecialchars($estudiante->apellido) ?>" required>
      </div>
      <div class="form-group">
        <label for="curso">Curso:</label>
        <input type="text" name="curso" id="curso" value="<?= htmlspecialchars($estudiante->curso) ?>" required>
      </div>
      <button type="submit" class="guardar-btn">Guardar Cambios</button>
    </form>

    <div class="botones">
      <a href="index.php" class="cancelar-btn">Regresar al listado de estudiantes</a>
    </div>

    <?php if (isset($mensaje)): ?>
      <p><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
  </div>
</body>
</html>
