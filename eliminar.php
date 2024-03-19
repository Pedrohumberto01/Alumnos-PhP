<?php
    include 'clases.php';

    // Obtener el correo del alumno a eliminar
    $correoEliminar = $_GET['correo']; // Suponiendo que pasas el correo como parámetro en la URL
    $fotoEliminar = $_GET['foto'];

    // Recuperar datos existentes desde el archivo
    $archivoAlumnos = 'archivoAlumnos';
    $alumnosExistente = file_exists($archivoAlumnos) ? unserialize(file_get_contents($archivoAlumnos)) : [];

    // Buscar el índice del alumno a eliminar
    $indiceEliminar = -1;
    foreach ($alumnosExistente as $key => $alumnoExistente) {
        if ($alumnoExistente->correo === $correoEliminar) {
            $indiceEliminar = $key;
            break;
        }
    }

    // Eliminar el alumno si se encontró
    if ($indiceEliminar !== -1) {
        unset($alumnosExistente[$indiceEliminar]);

        // Reindexar el arreglo después de la eliminación
        $alumnosExistente = array_values($alumnosExistente);

        // Serializar y guardar en el archivo
        file_put_contents($archivoAlumnos, serialize($alumnosExistente));

        unlink($fotoEliminar); //eliminar foto del directorio
        echo "<h2>Alumno eliminado exitosamente</h2>";
    } else {
        echo "<h2>No se encontró el alumno para eliminar</h2>";
    }

    echo "<a href='index.php'>Volver a la pagina Principal</a>";
?>
