<?php

session_start();
include('conexion.php');
$cod_prod = $_GET['id'];
echo "Eliminar " . $cod_prod;
mysqli_query($conexion_bd, "DELETE FROM recepcion WHERE id = '$cod_prod'");
$_SESSION['muestra'] = 'sip';
header("Location: recepcion.php");


?>