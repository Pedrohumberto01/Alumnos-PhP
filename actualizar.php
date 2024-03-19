
<?php
include 'clases.php';

// Obtener datos del formulario
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$carnet = $_POST['carnet'];
$edad = $_POST['edad'];
$curso = $_POST['curso'];
$rutaSinfoto = $_POST['ruta'];

$foto = $_FILES['foto'];

// Verificar si se ha subido una foto
$rutaDestino = '';
if ($foto['error'] === 0) {
    // Obtener información sobre el archivo
    $nombreFoto = $foto['name'];
    $tipoFoto = $foto['type'];
    $tamanioFoto = $foto['size'];
    $rutaTemporalFoto = $foto['tmp_name'];

    // Puedes mover la foto a una ubicación permanente si es necesario
    $rutaDestino = 'fotos/'  . $nombreFoto;
    move_uploaded_file($rutaTemporalFoto, $rutaDestino);
}else
{
	$rutaDestino = $rutaSinfoto;
}

// Crear una instancia de la clase Alumno
$alumno = new Alumno($correo, $nombre, $carnet, $edad, $curso, $rutaDestino);

// Recuperar datos existentes (si hay) desde el archivo
$archivoAlumnos = 'archivoAlumnos';
$alumnosExistente = file_exists($archivoAlumnos) ? unserialize(file_get_contents($archivoAlumnos)) : [];

// Buscar el alumno existente por su correo (o cualquier otro identificador único)
$indice = -1;
foreach ($alumnosExistente as $key => $alumnoExistente) {
    if ($alumnoExistente->correo === $correo) {
        $indice = $key;
        break;
    }
}

// Actualizar el objeto si se encontró
if ($indice !== -1) {
    $alumnosExistente[$indice] = $alumno;

    // Serializar y guardar en el archivo
    file_put_contents($archivoAlumnos, serialize($alumnosExistente));

    echo "<h2>Datos actualizados</h2>";
} else {
    echo "<h2>No se encontró el alumno para actualizar</h2>";
}

echo "<a href='index.php'>Volver a la pagina Principal</a>";

?>
