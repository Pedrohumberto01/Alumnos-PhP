
<?php
    function formularioAlumnos()
    {
    	echo "<h3>Alumnos</h3>";
    	echo "<p>Llene el formulario con los datos del estudiante.</p>";

    	echo "
    		<form ACTION='procesar.php' METHOD='post' class='formulario' enctype='multipart/form-data'> 
    			correo electrónico
    			<input name='correo' type=email placeholder='Ingrese su correo electrónico' required>

    			Nombre Completo
    			<input name='nombre' type=text placeholder='Ingrese su Nombre Completo' required>

    			Numero de carnet
    			<input name='carnet' type=text placeholder='Ingrese su carnet' required>

    			Edad
    			<input name='edad' type=number placeholder='Ingrese su edad' required>

    			Curso Actual
    			<input name='curso' type=number placeholder='Curso actual' required>

    			Foto
    			<INPUT name='foto' TYPE='file' SIZE='44' NAME='imagen' required>

    			<input class='Enviar' type=submit text='Enviar Datos'>

    		</form>
    	";
    }
?>