<?php

session_start();
include('conexion.php');
$cod_prod = $_GET['id'];
$bd = $_GET['bd'];

mysqli_query($conexion_bd, "DELETE FROM $bd WHERE id = '$cod_prod'");
$_SESSION['muestra'] = 'sip';
header("Location: ventas.php");


?>