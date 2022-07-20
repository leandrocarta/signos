<?php
session_start();


$cat = $_POST['sub_categoria'];
$categoria = strtoupper($cat);

include('conexion.php');
mysqli_query($conexion_bd, "INSERT INTO sub_categorias VALUES(default, '$categoria')");

$_SESSION['sub_categoria'] = "En buena hora !!!";
header("Location: alta_sub_categoria.php"); 




?>