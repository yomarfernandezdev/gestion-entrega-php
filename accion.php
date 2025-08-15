<?php

// Incluye la función para agregar contenido al JSON (asumiendo que está en el mismo directorio o ruta correcta)
include_once "./agregarContenido.php";

// Define la ruta del archivo JSON
$archivo = './data/trabajo.json';

// Define el directorio donde se guardarán las imágenes subidas
$directorio_subidas = './img/';

// Comprobamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Recoger los datos de texto del formulario
    $categoria_str = $_POST['categoria'] ?? '';
    $hash_str = $_POST['hash'] ?? '';
    $nombre_original = $_POST['nombre_original'] ?? '';
    $palabras_clave = $_POST['palabras_clave'] ?? '';
    $link = $_POST['link'] ?? '';

    // 2. Procesar las cadenas de texto a arrays, eliminando espacios
    $categoria = array_map('trim', explode(',', $categoria_str));
    $hash = array_map('trim', explode(',', $hash_str));

    // 3. Procesar el archivo de imagen subido
    if (isset($_FILES['imagen_file']) && $_FILES['imagen_file']['error'] == UPLOAD_ERR_OK) {
        $nombre_temporal = $_FILES['imagen_file']['tmp_name'];
        $nombre_archivo = basename($_FILES['imagen_file']['name']);
        $ruta_destino = $directorio_subidas . $nombre_archivo;

        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
            
            // 4. Crear el array del nuevo objeto con los datos procesados
            $nuevoObjeto = [
                "categoria" => $categoria,
                "imagen" => $nombre_archivo,
                "nombre_original" => $nombre_original,
                "palabras_clave" => $palabras_clave,
                "Hash" => $hash,
                "link" => $link,
            ];

            // 5. Llamar a la función para agregar el objeto al archivo JSON
            agregarContenido($archivo, $nuevoObjeto);

            // Mensaje de éxito
            echo "¡Contenido agregado exitosamente!";

        } else {
            echo "Error: No se pudo mover el archivo subido.";
        }
    } else {
        echo "Error: No se subió ningún archivo o hubo un error en la subida.";
    }

} else {
    // Si no es un método POST, muestra un mensaje
    echo "Acceso denegado. El script solo acepta peticiones POST.";
}
