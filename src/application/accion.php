<?php
include_once "../infrastructure/agregarContenido.php";
$archivo = '../../data/datosFormulario.json';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre_y_apellido = $_POST['nombre_y_apellido'] ?? '';
    $numero_de_cedula = $_POST['numero_de_cedula'] ?? '';
    $numero_de_telefono = $_POST['numero_de_telefono'] ?? '';
    $numero_de_segundo_telefono = $_POST['numero_de_segundo_telefono'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $direccion_de_correo_electronico = $_POST['direccion_de_correo_electronico'] ?? '';

    // Si el formulario incluye estos campos
    $categoria_str = $_POST['categoria'] ?? '';
    $hash_str = $_POST['hash'] ?? '';
    $categoria = array_map('trim', explode(',', $categoria_str));
    $hash = array_map('trim', explode(',', $hash_str));

    // Si hay archivo subido
    if (!empty($_FILES['archivo']['name'])) {
        $nombre_temporal = $_FILES['archivo']['tmp_name'];
        $ruta_destino = '../../uploads/' . basename($_FILES['archivo']['name']);

        if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
            $nuevoObjeto = [
                "nombre_y_apellido" => $nombre_y_apellido,
                "numero_de_cedula" => $numero_de_cedula,
                "numero_de_telefono" => $numero_de_telefono,
                "numero_de_segundo_telefono" => $numero_de_segundo_telefono,
                "direccion" => $direccion,
                "direccion_de_correo_electronico" => $direccion_de_correo_electronico,
            ];
            agregarContenido($archivo, $nuevoObjeto);
            echo "¡Contenido agregado exitosamente!";
        } else {
            echo "Error: No se pudo mover el archivo subido.";
        }

    } else {
        // Guardar sin archivo
        $nuevoObjeto = [
            "nombre_y_apellido" => $nombre_y_apellido,
            "numero_de_cedula" => $numero_de_cedula,
            "numero_de_telefono" => $numero_de_telefono,
            "numero_de_segundo_telefono" => $numero_de_segundo_telefono,
            "direccion" => $direccion,
            "direccion_de_correo_electronico" => $direccion_de_correo_electronico

        ];
        agregarContenido($archivo, $nuevoObjeto);
        echo "¡Contenido agregado sin archivo!";
    }

} else {
    echo "Acceso denegado. El script solo acepta peticiones POST.";
}
