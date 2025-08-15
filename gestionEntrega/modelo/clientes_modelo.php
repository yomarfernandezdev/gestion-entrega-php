<?php
include_once "../../config.php";
include 'conexion.php';
$conn = conexion($config);

$accion = $_GET['accion'];

if($accion == "insertar"){

    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $telefono_1 = $_POST['telefono_1'];
    $telefono_2 = $_POST['telefono_2'];
    $direccion_entrega = $_POST['direccion_entrega'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];

    $sql="INSERT INTO clientes(
          id_cliente, nombre, telefono_1, telefono_2, direccion_entrega, email, dni
          )VALUE(
          '$id_cliente', '$nombre', '$telefono_1', '$telefono_2', '$direccion_entrega', '$email', '$dni')";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "modificar"){

    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $telefono_1 = $_POST['telefono_1'];
    $telefono_2 = $_POST['telefono_2'];
    $direccion_entrega = $_POST['direccion_entrega'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];

    $sql="UPDATE clientes SET
          nombre = '$nombre', 
          telefono_1 = '$telefono_1', 
          telefono_2 = '$telefono_2', 
          direccion_entrega = '$direccion_entrega', 
          email = '$email', 
          dni = '$dni'
          WHERE id_cliente = '$id_cliente'";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "borrar"){

    $id_cliente = $_POST['id_cliente'];

    $sql = "DELETE FROM clientes
            WHERE id_cliente = '$id_cliente'";

    echo $consulta = mysqli_query($conn, $sql);
}


?>