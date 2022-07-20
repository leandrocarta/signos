<?php
session_start();


$cat = $_POST['categoria'];
$categoria = strtoupper($cat);

include('conexion.php');
mysqli_query($conexion_bd, "INSERT INTO categorias VALUES(default, '$categoria')");

$_SESSION['categoria'] = "En buena hora !!!";
header("Location: alta_categorias.php"); 




?>
