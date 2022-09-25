<?php
include('conexion.php');
session_start();

$id = $_GET['id'];
$borra = $_GET['borra'];
$borra2 = $_GET['borra2'];
if ($borra) {
    mysqli_query($conexion_bd, "DELETE FROM ventas_pre");
}
if ($borra2) {
    mysqli_query($conexion_bd, "DELETE FROM puesto1");
}

$ok = mysqli_query($conexion_bd, "SELECT id, cod_proveedor, producto, neto_mostrador, iva, precio_final,
cantidad FROM productos WHERE id = $id");
while ($nombre_prod = mysqli_fetch_array($ok)) {
    $cod_int = $nombre_prod['id'];
    $cod_prov = $nombre_prod['cod_proveedor'];
    $producto = $nombre_prod['producto'];
    $neto_mostrador = $nombre_prod['neto_mostrador'];
    $iva = $nombre_prod['iva'];
    $precio_final = $nombre_prod['precio_final'];   
    $cantidad = $nombre_prod['cantidad'];
}

//if ($nombre_prod) {
mysqli_query($conexion_bd, "DELETE FROM ventas_pre");
mysqli_query($conexion_bd, "INSERT INTO ventas_pre VALUES($cod_int, '$cod_prov', 
'$producto', $neto_mostrador, $iva, $precio_final, $cantidad)");
   
 /*  
echo "ID ". $id . "<br>";
   echo "cod_prov ". $cod_prov . "<br>";
    echo "cod_int: " . $cod_int. "<br>";
echo "producto: " . $producto. "<br>";
echo "neto_mostrador: " . $neto_mostrador. "<br>";
echo "precio_final: " . $precio_final. "<br>";
echo "cantidad :" . $cantidad. "<br>";
echo "iva: " . $iva. "<br>";
*/

//}

header("Location: ventas.php");
?>