<?php
include('conexion.php');
session_start();

$id = $_GET['id'];
$borra = $_GET['borra'];
$borra2 = $_GET['borra2'];
if ($borra) {
    mysqli_query($conexion_bd, "DELETE FROM recepcion_pre");
}
if ($borra2) {
    mysqli_query($conexion_bd, "DELETE FROM recepcion");
}

$ok = mysqli_query($conexion_bd, "SELECT id, cod_proveedor, producto, iva, costo, dscto,
dscto2, dscto3, utilidad, cantidad FROM productos WHERE id = $id");
while ($nombre_prod = mysqli_fetch_array($ok)) {
    $cod_int = $nombre_prod['id'];
    $cod_prov = $nombre_prod['cod_proveedor'];
    $producto = $nombre_prod['producto'];
    $iva = $nombre_prod['iva'];
    $costo = $nombre_prod['costo'];
    $bonif_1 = $nombre_prod['dscto'];
    $bonif_2 = $nombre_prod['dscto2'];
    $bonif_3 = $nombre_prod['dscto3'];
    $utilidad = $nombre_prod['utilidad'];
    $cantidad = $nombre_prod['cantidad'];
}

//if ($nombre_prod) {
mysqli_query($conexion_bd, "DELETE FROM recepcion_pre");
mysqli_query($conexion_bd, "INSERT INTO recepcion_pre VALUES($cod_int, '$cod_prov', 
    '$producto', $costo, $iva, $bonif_1, $bonif_2, $bonif_3, $utilidad, $cantidad)");

/*   echo "cod_prov ". $cod_prov . "<br>";
    echo "cod_int: " . $cod_int. "<br>";
echo "bonif_1: " . $bonif_1. "<br>";
echo "bonif_2: " . $bonif_2. "<br>";
echo "bonif_3: " . $bonif_3. "<br>";
echo "utilidad :" . $utilidad. "<br>";
echo "cod_prov: " . $cod_prov. "<br>";
echo "iva: " . $iva. "<br>";
echo "producto: " . $producto;*/
//}

header("Location: recepcion.php");
