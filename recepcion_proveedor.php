<?php
session_start();


include('conexion.php');

$id = $_POST['id_p'];


$existe = mysqli_query($conexion_bd, "SELECT id, nombre FROM proveedores WHERE id= '$id'");
while ($dato = mysqli_fetch_array($existe)) {
    $nombre = $dato['nombre'];
    $id = $dato['id'];
    }



if ($existe) {
    mysqli_query($conexion_bd, "DELETE FROM recepcion_proveedor");

    mysqli_query($conexion_bd, "INSERT INTO recepcion_proveedor VALUES(DEFAULT, $id, '$nombre')");

    header("Location: recepcion.php");
}
