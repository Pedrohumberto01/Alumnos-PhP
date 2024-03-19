
<?php

// Incluye la clase Alumno
include 'clases.php';

// Recuperar datos existentes desde el archivo
$archivoAlumnos = 'archivoAlumnos';
$alumnosExistente = file_exists($archivoAlumnos) ? unserialize(file_get_contents($archivoAlumnos)) : [];

// Mostrar los datos de los alumnos
echo "<h2>Listado de Alumnos</h2>";

if (!empty($alumnosExistente)) {
    foreach ($alumnosExistente as $alumno) {

    	//serializar para mandar al formulario editar
    	$alumno_serializado = base64_encode(serialize($alumno));
    	
    	echo "
    		<div class='carta'>
				<div class='contenido-carta'>
					<div class='imagen-carta'><img width='160px' src='{$alumno->foto}' alt='Foto'></div>
						<div>
						<p><strong>Correo:</strong> {$alumno->correo}</p>
						<p><strong>Nombre:</strong> {$alumno->nombre}</p>
						<p><strong>Carnet:</strong> {$alumno->carnet}</p>
						<p><strong>Edad:</strong> {$alumno->edad}</p>
						<p><strong>Curso:</strong> {$alumno->curso}</p>
					</div>
				</div>

				<div>
					<a class='btn btn-success' href='editar.php?datos={$alumno_serializado}'>Editar</a> 
					<a class='btn btn-danger' href='eliminar.php?correo={$alumno->correo}&foto={$alumno->foto}'>Eliminar</a>
				</div>
			</div>
			<hr>
    	";
    }
} else {
    echo "<p>No hay alumnos registrados.</p>";
}

?>
