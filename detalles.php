<?php
include 'componentes.php';
include 'clases.php';

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];
    $estudiante = cargar_datos($matricula);

    if ($estudiante) {
        echo "=== Detalles del Estudiante ===\n";
        echo "Nombre: " . $estudiante->nombre . "\n";
        echo "Apellido: " . $estudiante->apellido . "\n";
        echo "Matrícula: " . $estudiante->matricula . "\n";
        echo "Curso: " . $estudiante->curso . "\n";
        // Aquí puedes agregar más campos si existen en tu objeto
    } else {
        echo "No se encontraron datos para la matrícula: $matricula\n";
    }
} else {
    echo "No se proporcionó ninguna matrícula.\n";
}
?>
