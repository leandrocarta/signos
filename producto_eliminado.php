<?php
session_start();
$id = $_GET['id'];


include('conexion.php');
mysqli_query($conexion_bd, "DELETE FROM productos WHERE id = $id");

 $_SESSION['producto_eliminado']="ELIMINADO";

header("Location: producto_baja.php");

?>