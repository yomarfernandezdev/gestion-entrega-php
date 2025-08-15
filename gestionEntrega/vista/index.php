<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos</title>
    <link rel="stylesheet" href="../librerias/bootstrap/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_clientes.js"></script>

</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Completa tus datos</h2>
        <p class="form-description">¡Ya casi terminas! Llena estos campos para finalizar tu compra de forma segura.</p>
        <form enctype="multipart/form-data" class="form">
            
            <div class="form-group">
                <label for="nombre_y_apellido">Nombre y Apellido</label>
                <input type="text" id="nombre"name="nombre_y_apellido" required>
            </div>

            <div class="form-group">
                <label for="numero_de_cedula">Número de Cédula</label>
                <input type="number"  id="dni" name="numero_de_cedula" required>
            </div>

            <div class="form-group">
                <label for="numero_de_telefono">Número de Teléfono</label>
                <input type="number" id="telefono_1" name="numero_de_telefono" required>
            </div>

            <div class="form-group">
                <label for="numero_de_segundo_telefono">Número de segundo Teléfono (Opcional)</label>
                <input type="number" id="telefono_2" name="numero_de_segundo_telefono">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion_entrega" name="direccion" required>
            </div>

            <div class="form-group">
                <label for="direccion_de_correo_electronico">Dirección de Correo Electrónico</label>
                <input type="email" id="email" name="direccion_de_correo_electronico" required>
            </div>

            <button type="button" class="btn-submit" id="guardarnuevo">
			    Agregar
			</button>
        </form>
    </div>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#guardarnuevo').click(function () {
		    id_cliente = $('#id_cliente').val();
		    nombre = $('#nombre').val();
		    telefono_1 = $('#telefono_1').val();
		    telefono_2 = $('#telefono_2').val();
		    direccion_entrega = $('#direccion_entrega').val();
		    email = $('#email').val();
		    dni = $('#dni').val();
		    agregardatos(id_cliente, nombre, telefono_1, telefono_2, direccion_entrega, email, dni);
		});
		$('#actualizadatos').click(function () {
		    modificarCliente();
		});
	    });
	</script>
</body>
</html>