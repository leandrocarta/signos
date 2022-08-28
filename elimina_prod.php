<?php

session_start();
include('conexion.php');
$cod_prod = $_GET['id'];
echo "Eliminar " . $cod_prod;
mysqli_query($conexion_bd, "DELETE FROM update_precios WHERE cod_interno = '$cod_prod'");
$_SESSION['muestra'] = 'sip';
header("Location: cp_filtros.php");


?>