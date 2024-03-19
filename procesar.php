
<?php
	include 'clases.php';
	//obtener los datos por el metodo post
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];
	$carnet = $_POST['carnet'];
	$edad = $_POST['edad'];
	$curso = $_POST['curso'];
	
	$foto = $_FILES['foto'];

    // Verificar si se ha subido una foto
    if ($foto['error'] === 0) {
        // Obtener información sobre el archivo
        $nombreFoto = $foto['name'];
        $tipoFoto = $foto['type'];
        $tamanioFoto = $foto['size'];
        $rutaTemporalFoto = $foto['tmp_name'];

        // Puedes mover la foto a una ubicación permanente si es necesario
        $rutaDestino = 'fotos/'  . $nombreFoto;
        move_uploaded_file($rutaTemporalFoto, $rutaDestino);

        
    }

	// Crear una instancia de la clase Alumno
    $alumno = new Alumno($correo, $nombre, $carnet, $edad, $curso, $rutaDestino);

	// Recuperar datos existentes (si hay) desde el archivo
	$archivoAlumnos = 'archivoAlumnos';
	$alumnosExistente = file_exists($archivoAlumnos) ? unserialize(file_get_contents($archivoAlumnos)) : [];

	// Agregar el nuevo alumno al arreglo existente
	$alumnosExistente[] = $alumno;

	// Serializar y guardar en el archivo
	file_put_contents($archivoAlumnos, serialize($alumnosExistente));


	echo "<h2>Datos almacenados</h2>";
	echo "<a href='index.php'>Volver a la pagina Principal</a>";
?>