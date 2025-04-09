<?php
// Incluir las funciones
include 'componentes.php';
include 'clases.php';

// Función para eliminar un estudiante
function eliminar_estudiante($codigo) {
    $ruta = __DIR__ . "/datos/" . $codigo . ".dat"; // Ruta absoluta del archivo del estudiante
    
    // Verificar si el archivo existe y luego eliminarlo
    if (file_exists($ruta)) {
        if (unlink($ruta)) {
            return "Estudiante con matrícula $codigo ha sido eliminado correctamente.";
        } else {
            return "Hubo un error al intentar eliminar el archivo del estudiante con matrícula $codigo.";
        }
    } else {
        return "No se encontró el archivo del estudiante con matrícula $codigo.";
    }
}

// Verificar si el código del estudiante ha sido enviado
if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {
    $codigo = htmlspecialchars($_GET['codigo']); // Obtener el código de estudiante desde la URL y sanitizarlo
    
    // Llamar a la función para eliminar al estudiante
    $mensaje = eliminar_estudiante($codigo); 
    
    // Redirigir al index después de eliminar
    header("Location: index.php?mensaje=" . urlencode($mensaje));
    exit(); // Asegurarse de que no se ejecute el código siguiente después de la redirección
} else {
    $mensaje = "No se proporcionó un código de estudiante válido.";
}

?>
