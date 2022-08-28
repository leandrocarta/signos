<?php
include('conexion.php');
session_start();

$nom = $_POST['nombre'];
$nomb = preg_replace("/'/", " ", $nom);
$nombre = strtoupper($nomb);
$cod_pro = $_POST['cod_prov'];
$cod_prov = strtoupper($cod_pro);
$proveedor = $_POST['prov'];
$cat = $_POST['cat'];
$subcat = $_POST['subcat'];
$moneda = $_POST['moneda'];
$precio = $_POST['precio'];
$iva = $_POST['iva'];

$p_f = $precio * $iva/100;
$p_final = $p_f + $precio;
echo "nombre: " . $nombre. "<br>";
echo "cod_prov: " . $cod_prov. "<br>";
echo "proveedor: " . $proveedor. "<br>";
echo "cat: " . $cat. "<br>";
echo "subcat: " . $subcat. "<br>";
echo "moneda: " . $moneda. "<br>";
echo "nombre :" . $nombre. "<br>";
echo "precio: " . $precio. "<br>";
echo "iva: " . $iva. "<br>";
echo "p_final: " . $p_final;

mysqli_query($conexion_bd, "INSERT INTO productos VALUES(default, '$cod_prov'
, $cat, $subcat, $proveedor, '$nombre', $precio, $iva, $p_final, '$moneda')");


$ok = mysqli_query($conexion_bd, "SELECT producto FROM productos WHERE producto = '$nombre'");
while ($nombre_prod = mysqli_fetch_array($ok)) {
$cargado = $nombre_prod['nombre'];

}
if($ok){
    $_SESSION['prod_carg']="DISPONIBLE!!";
}else {
    $_SESSION['error']="Ooops!!";
}
 header("Location: alta_prod.php");
?>