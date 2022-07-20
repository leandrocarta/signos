<?php
session_start();
$id = $_GET['id'];


include('conexion.php');
mysqli_query($conexion_bd, "DELETE FROM categorias WHERE id = $id");

 $_SESSION['cat_eliminada']="ELIMINADA";

header("Location: alta_categorias.php");

?>