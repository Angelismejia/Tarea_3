<?php

// Guardar datos en un archivo
function guardar_datos($codigo, $datos) {
    $directorio = __DIR__ . "/datos"; // Ruta de la carpeta 'datos'
    $ruta = $directorio . "/" . $codigo . ".dat"; // Ruta absoluta del archivo

    // Verificar si la carpeta 'datos' existe, si no, crearla
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true); // Crea la carpeta con permisos adecuados
    }

    $contenido = serialize($datos);
    file_put_contents($ruta, $contenido);
}

// Cargar datos desde un archivo
function cargar_datos($codigo) {
    $ruta = __DIR__ . "/datos/" . $codigo . ".dat"; // Ruta absoluta
    
    if (!file_exists($ruta)) {
        return false;
    }
    
    $datos = file_get_contents($ruta);
    return unserialize($datos);
}

// Listar registros en el directorio 'datos'
function listar_registros() {
    $registros = [];
    $directorio = __DIR__ . "/datos";  // Ruta completa al directorio 'datos'
    
    if (!is_dir($directorio)) {
        return $registros; // Si el directorio no existe, retorna un arreglo vacío
    }

    $archivos = scandir($directorio);  // Leer los archivos en el directorio
    
    foreach ($archivos as $archivo) {
        // Ignorar '.' y '..' y asegurar que solo sean archivos con extensión .dat
        if ($archivo == '.' || $archivo == '..' || !is_file($directorio . "/" . $archivo)) {
            continue;
        }
        
        // Asegurar que el archivo tenga la extensión .dat
        if (pathinfo($archivo, PATHINFO_EXTENSION) == 'dat') {
            $datos = cargar_datos(str_replace(".dat", "", $archivo)); // Cargar datos desde el archivo
            if ($datos) {
                $registros[] = $datos; // Añadir los datos a la lista de registros
            }
        }
    }

    return $registros;
}

function my_input($nombre, $label, $valor = "", $opciones = []) {
    $tipo = isset($opciones["type"]) ? $opciones["type"] : "text"; // Tipo de campo por defecto es texto
    $required = isset($opciones["required"]) && $opciones["required"] ? "required" : ""; // Condición para 'required'
    ?>
    <div class="form-group">
        <label for="<?= htmlspecialchars($nombre) ?>"><?= htmlspecialchars($label) ?>:</label>
        <input type="<?= $tipo ?>" value="<?= htmlspecialchars($valor) ?>" name="<?= htmlspecialchars($nombre) ?>" id="<?= htmlspecialchars($nombre) ?>" <?= $required ?>>
    </div>
    <?php
}



?>
