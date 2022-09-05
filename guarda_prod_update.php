<?php

session_start();

$nombre_pro = $_POST['nombre_prod'];
$nomb = preg_replace("/'/", " ", $nombre_pro);
$nombre_prod = strtoupper($nomb);
$cod_pro = $_POST['cod_prov'];
$cod_prov = strtoupper($cod_pro);
$nombre_prov = $_POST['nombre_prov'];
$cat = $_POST['cat'];
$subcat = $_POST['subcat'];
$moneda = $_POST['moneda'];
$precio = $_POST['precio'];
$iva = $_POST['iva'];
$id = $_POST['id'];

/*
echo "nombre_prod " . $nombre_prod . "<br>"
  . " cod_prov " . $cod_prov . "<br>" .
  " nombre_prov " . $nombre_prov . "<br>" .
  "cat " . $cat . "<br>" .
  " subcat " . $subcat . "<br>" .
  " moneda " . $moneda . "<br>" .
  "precio " . $precio . "<br>" .
  " iva " . $iva . "<br>" .
  " id " . $id;*/

$p_f = $precio * $iva / 100;
$p_final = $p_f + $precio;


include('conexion.php');
mysqli_query($conexion_bd, "UPDATE productos SET producto  = '$nombre_prod', cod_proveedor = '$cod_prov',
    id_cat = '$cat', id_subCat = '$subcat', id_proveedor = '$nombre_prov', neto_mostrador = '$precio', 
    iva = '$iva', precio_final = '$p_final', moneda = '$moneda' WHERE id= '$id'");

$_SESSION['producto_modificado'] = "MODIFICADO!!!";
header("Location: producto_baja.php");
