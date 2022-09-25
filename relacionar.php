<?php
include('conexion.php');
session_start();
$relacionarProveedor = $_POST['relacionarProveedor'];
$relacionarCategoria = $_POST['relacionarCategoria']; 
$relacionarSubCategoria = $_POST['relacionarSubCategoria']; 
/*
echo "relacionarProveedor: " . $relacionarProveedor . "<br>";
echo "relacionarCategoria: " . $relacionarCategoria . "<br>";
echo "relacionarSubCategoria: " . $relacionarSubCategoria . "<br>";
*/
$consulta = mysqli_query($conexion_bd, "SELECT id, id_proveedor, id_cat, id_subCat FROM update_precios");

while ($listar_datos = mysqli_fetch_array($consulta)) {
    $id = $listar_datos['id'];
    $id_proveedor = $listar_datos['id_proveedor'];
    $id_cat = $listar_datos['id_cat'];
    $id_subCat = $listar_datos['id_subCat'];

    if ($relacionarProveedor == 0) {
        mysqli_query($conexion_bd, "UPDATE update_precios SET id_proveedor = '$id_proveedor' WHERE id= '$id'");
        mysqli_query($conexion_bd, "UPDATE productos SET id_proveedor = '$id_proveedor' WHERE id= '$id'");
    } else {
        mysqli_query($conexion_bd, "UPDATE update_precios SET id_proveedor = '$relacionarProveedor' WHERE id= '$id'");
        mysqli_query($conexion_bd, "UPDATE productos SET id_proveedor = '$relacionarProveedor' WHERE id= '$id'");
    }
    if ($relacionarCategoria == 0) {
        mysqli_query($conexion_bd, "UPDATE update_precios SET id_cat = '$id_cat' WHERE id= '$id'");
        mysqli_query($conexion_bd, "UPDATE productos SET id_cat = '$id_cat' WHERE id= '$id'");
    } else {
        mysqli_query($conexion_bd, "UPDATE update_precios SET id_cat = '$relacionarCategoria' WHERE id= '$id'");
        mysqli_query($conexion_bd, "UPDATE productos SET id_cat = '$relacionarCategoria' WHERE id= '$id'");
    }
    if ($relacionarSubCategoria == 0) {
        mysqli_query($conexion_bd, "UPDATE update_precios SET id_subCat = '$id_subCat' WHERE id= '$id'");
        mysqli_query($conexion_bd, "UPDATE productos SET id_subCat = '$id_subCat' WHERE id= '$id'");
    } else {
        mysqli_query($conexion_bd, "UPDATE update_precios SET id_subCat = '$relacionarSubCategoria' WHERE id= '$id'");
        mysqli_query($conexion_bd, "UPDATE productos SET id_subCat = '$relacionarSubCategoria' WHERE id= '$id'");
    }
}
   /* echo "id: " . $id . "<br>"; 
    echo "id_proveedor: " . $id_proveedor . "<br>"; 
    echo "id_cat: " . $id_cat . "<br>"; 
    echo "id_subCat: " . $id_subCat . "<br>"; 

*/


$_SESSION['muestra'] = 'sip';

header("Location: cp_filtros2.php");
