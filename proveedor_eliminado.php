<?php
session_start();
$id = $_GET['id'];


include('conexion.php');
mysqli_query($conexion_bd, "DELETE FROM proveedores WHERE id = $id");

 $_SESSION['proveedor_eliminado']="ELIMINADO";

header("Location: proveedores_eliminar.php");

?>