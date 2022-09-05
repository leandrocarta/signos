<?php
include('conexion.php');
session_start();

$cod_int = $_POST['cod_int'];
$cod_prov = $_POST['cod_prov'];
$producto = $_POST['nombre_prod'];
$costo = $_POST['costo'];
$iva = $_POST['iva'];
$bonif_1 = $_POST['bonificacion_1'];
$bonif_2 = $_POST['bonificacion_2'];
$bonif_3 = $_POST['bonificacion_3'];
$utilidad = $_POST['utilidad'];
$cantidad = $_POST['cantidad'];



if ($cod_int) {
    $cotizacion = mysqli_query($conexion_bd, "SELECT cotizacion FROM productos WHERE id = $cod_int");
    while ($listar_datos = mysqli_fetch_array($cotizacion)) {
        $cotizacion = $listar_datos['cotizacion'];
    }

    mysqli_query($conexion_bd, "INSERT INTO recepcion VALUES($cod_int, '$cod_prov', 
    '$producto', $costo, $iva, $bonif_1, $bonif_2, $bonif_3, $utilidad, $cantidad, $cotizacion)");

    
    mysqli_query($conexion_bd, "DELETE FROM recepcion_pre");
}



header("Location: recepcion.php");

 /*
echo "Cod Int " . $cod_int . "<br>";
echo "cod_prov " . $cod_prov . "<br>";
echo "producto " . $producto . "<br>";
echo "costo " . $costo . "<br>";
echo "iva " . $iva . "<br>";
echo "bonif_1 " . $bonif_1 . "<br>";
echo "bonif_2 " . $bonif_2 . "<br>";
echo "bonif_3 " . $bonif_3 . "<br>";
echo "utilidad " . $utilidad . "<br>";
echo "cantidad " . $cantidad . "<br>";
 */