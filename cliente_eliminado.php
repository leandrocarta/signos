<?php
session_start();
$id = $_GET['id'];


include('conexion.php');
mysqli_query($conexion_bd, "DELETE FROM clientes WHERE id = $id");

 $_SESSION['cliente_eliminado']="ELIMINADO";

header("Location: clientes_eliminar.php");

?>