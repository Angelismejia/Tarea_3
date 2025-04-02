<?php

include 'componentes.php';
include 'clases.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Participantes</title>
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
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-top: 50px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .botones {
            margin-top: 20px;
        }

        .boton {
            text-decoration: none;
            background-color: rgb(255, 252, 50);
            color: black;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 20px;
            transition: 0.3s;
            margin-right: 10px;
        }
       
        .boton:hover {
            background-color: rgb(255, 252, 50);
        }

        .boton.guardar {
            background-color: rgb(255, 252, 50);
        }

        .boton.guardar:hover {
            background-color: darkgreen;
        }

        .boton.atras {
            background-color:rgb(255, 81, 50);
        }

        .boton.atras:hover {
            background-color:rgb(255, 252, 50);
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Registro de Participantes</h2>
        <form method="post" action="guardar.php">
            <?php
                echo my_input("matricula", "Matrícula", "", ["required" => true]);
                echo my_input("nombre", "Nombre", "", ["required" => true]);
                echo my_input("apellido", "Apellido", "", ["required" => true]);
                echo my_input("curso", "Curso", "", ["required" => true]);
                echo my_input("motivo", "Motivo", "", ["required" => true]);
                echo my_input("fecha", "Fecha y Hora de registro", "", ["type" => "datetime-local", "required" => true]);
            ?>
            <div class="botones">
                <button type="submit"class="boton guardar">Guardar</button>
                <a href="index.php"class="boton atras">Atras</a>
            </div>
    
        </form>
    </div>
</body>

</html>
