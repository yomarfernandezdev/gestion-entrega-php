<?php
function conexion($config){
    $host = $config["host"];
    $user = $config["user"];
    $password = $config["password"];
    $database = $config["database"];
    $conn = mysqli_connect($host, $user, $password, $database);
    return $conn;
}
?>
