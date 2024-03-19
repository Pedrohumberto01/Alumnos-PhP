
<?php

    include 'clases.php';
    $alumno_serializado = $_GET['datos'];
    $alumno = unserialize(base64_decode($alumno_serializado));

	echo "<h3>Editar los datos del estudiante</h3>";

	echo "
		<head>
             <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
            <link rel='stylesheet' href='css/styles.css'>
        </head>

        <body>
            <form ACTION='actualizar.php' METHOD='post' class='formulario' enctype='multipart/form-data'> 
                correo electrónico
                <input name='correo' type=email required value='{$alumno->correo}'>

                Nombre Completo
                <input name='nombre' type=text required value='{$alumno->nombre}'>

                Numero de carnet
                <input name='carnet' type=text required value='{$alumno->carnet}'>

                Edad
                <input name='edad' type=number required value='{$alumno->edad}'>

                Curso Actual
                <input name='curso' type=number required value='{$alumno->curso}'>

                Foto
                <INPUT name='foto' TYPE='file' SIZE='44' NAME='imagen' >
                <input type='hidden' name='ruta' value='{$alumno->foto}'>

                <div>
                    <button class='btn btn-success' type='submit'>Actualizar</button>
                    <a class='btn btn-danger' href='index.php'>Cancelar</a>
                </div>
            </form>
        </body>
	";
    
?>