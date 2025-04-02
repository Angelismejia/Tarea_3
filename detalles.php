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

        .header {
            background-color: rgb(0, 114, 190);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
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

        .detalles {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 20px;
        }

        .item {
            margin: 10px 0;
            font-size: 18px;
        }

        .item strong {
            font-weight: bold;
        }

        .ver-detalle-btn {
            text-decoration: none;
            background-color: rgb(255, 252, 50);
            color: black;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .ver-detalle-btn:hover {
            background-color: rgb(255, 252, 50);
        }
    </style>
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
