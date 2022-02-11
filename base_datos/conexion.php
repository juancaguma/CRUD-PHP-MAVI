<?php
    $servidor = "localhost";
    $bd = "crud_node";
    $usuario = "root";
    $contrasena = "";

    try {
        $conexion = new PDO ('mysql:host='.$servidor.';dbname='.$bd,$usuario, $contrasena);
        return $conexion;
    } catch (PDOException $e) {
        echo "Error". $e->getMessage();
}
?>
