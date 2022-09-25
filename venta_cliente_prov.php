<?php
session_start();


include('conexion.php');

$id = $_POST['id_cli'];


$existe = mysqli_query($conexion_bd, "SELECT id, nombre FROM clientes WHERE id= '$id'");
while ($dato = mysqli_fetch_array($existe)) {
    $nombre = $dato['nombre'];
    $id = $dato['id'];
    }



if ($existe) {
    mysqli_query($conexion_bd, "DELETE FROM clientes_ventas");

    mysqli_query($conexion_bd, "INSERT INTO clientes_ventas VALUES(DEFAULT, $id, '$nombre')");

    header("Location: ventas.php");
}
