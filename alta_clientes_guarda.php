<?php
session_start();

$cond_venta = $_POST['cond_venta'];
$nombre = $_POST['nombre'];
$contacto = $_POST['contacto'];
$cuit = $_POST['cuit'];
$cond_fiscal = $_POST['cond_fiscal'];
$direccion = $_POST['direccion'];
$localidad = $_POST['localidad'];
$provincia = $_POST['provincia'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$movil = $_POST['movil'];
$fecha_alta = date('Y-m-d');

include('conexion.php');
mysqli_query($conexion_bd, "INSERT INTO clientes VALUES(default, '$cond_venta', '$nombre', '$contacto', '$cuit', '$cond_fiscal', '$direccion', '$localidad',
    '$provincia', '$email', '$telefono', '$movil', '$fecha_alta')");

$_SESSION['cliente_reg'] = "En buena hora !!!";
header("Location: alta_cliente.php"); 




?>
