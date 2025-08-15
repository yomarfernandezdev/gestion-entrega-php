<?php
function agregarContenido($archivo, $nuevoObjeto)
{
    // 1. Leer el contenido del archivo
    $contenidoActual = file_get_contents($archivo);
    // 2. Decodificar el JSON a un array de PHP
    $datos = json_decode($contenidoActual, true);
    // 3. Agregar el nuevo objeto al array
    $datos[] = $nuevoObjeto;
    // 4. Codificar el array de vuelta a formato JSON con formato legible
    $nuevoContenido = json_encode($datos, JSON_PRETTY_PRINT);
    // 5. Escribir el nuevo contenido en el archivo, sobrescribiendo el anterior
    file_put_contents($archivo, $nuevoContenido);
    echo "¡Objeto agregado exitosamente!";
}
