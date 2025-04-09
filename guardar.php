<?php
include 'componentes.php'; 
include 'clases.php'; 

function cleanInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

if (isset($_POST['matricula'], $_POST['nombre'], $_POST['apellido'], $_POST['curso'], $_POST['motivo'], $_POST['fecha'])) {

    if (!class_exists('Estudiante')) {
        class Estudiante {
            public $matricula;
            public $nombre;
            public $apellido;
            public $curso;
            public $motivo;
            public $fecha;
        }
    }

    $estudiante = new Estudiante();
    $estudiante->matricula = cleanInput($_POST['matricula']);
    $estudiante->nombre = cleanInput($_POST['nombre']);
    $estudiante->apellido = cleanInput($_POST['apellido']);
    $estudiante->curso = cleanInput($_POST['curso']);
    $estudiante->motivo = cleanInput($_POST['motivo']);
    $estudiante->fecha = cleanInput($_POST['fecha']);

    guardar_datos($estudiante->matricula, $estudiante); 

    if (cargar_datos($estudiante->matricula) !== false) {
        echo "<div class='container'>";
        echo "<h2>Datos Guardados</h2>";
        echo "<p>Los datos del estudiante han sido guardados correctamente.</p>";
        echo "<div class='boton-container'><a href='index.php' class='boton'>Volver al listado</a></div>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "<h2>Error</h2>";
        echo "<p>No se pudieron guardar los datos del estudiante. Por favor, intente nuevamente.</p>";
        echo "<div class='boton-container'><a href='index.php' class='boton'>Volver al listado</a></div>";
        echo "</div>";
    }
} else {
    echo "<div class='container'>";
    echo "<h2>Error</h2>";
    echo "<p>Faltan campos obligatorios. Por favor, completa todos los campos.</p>";
    echo "<div class='boton-container'><a href='index.php' class='boton'>Volver al listado</a></div>";
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blue;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 70%;
            max-width: 500px;
        }

        .boton-container {
            margin-top: 20px;
        }

        .boton {
            text-decoration: none;
            background-color: #FFD700;
            color: black;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 18px;
            transition: 0.3s;
        }

        .boton:hover {
            background-color: #FF6347;
        }
    </style>
</head>
<body>
</body>
</html>

---
detalles.php


<?php
include 'componentes.php';
include 'clases.php';

$matricula = $_GET['matricula'];
$Estudiante = cargar_datos($matricula);

if ($Estudiante === false) {
    echo "Estudiante no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Estudiante</title>

</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detalles del Estudiante: <?= $Estudiante->nombre ?> <?= $Estudiante->apellido ?></h1>
        </div>
        <div class="detalles">
            <div class="item">
                <strong>Nombre:</strong> <?= $Estudiante->nombre ?> <?= $Estudiante->apellido ?>
            </div>
            <div class="item">
                <strong>Matrícula:</strong> <?= $Estudiante->matricula ?>
            </div>
            <div class="item">
                <strong>Curso:</strong> <?= $Estudiante->curso ?>
            </div>
            <div class="item">
                <strong>Motivo:</strong> <?= $Estudiante->motivo ?>
            </div>
            <div class="item">
                <strong>Fecha de Inscripción:</strong> <?= $Estudiante->fecha ?>
            </div>
        </div>
    <div class="botones">
        <a href="index.php">Volver al Inicio</a>
    </div>
       
    <?php
    //Candy mejia - 2023-1665
    ?>
    </div>
</body>
</html>
