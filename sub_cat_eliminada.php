<?php
session_start();
$id = $_GET['id'];


include('conexion.php');

mysqli_query($conexion_bd, "UPDATE sub_categorias SET id_categoria = '0' WHERE id_subCategoria  = $id");
mysqli_query($conexion_bd, "DELETE FROM sub_categorias WHERE id = $id");

 $_SESSION['sub_cat_eliminada']="ELIMINADA";

header("Location: alta_sub_categoria.php");

?>