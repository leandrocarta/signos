<?php
session_start();
$id = $_GET['id'];
$nombre_cat = $_GET['nombre'];
include('conexion.php');


$chek = mysqli_query($conexion_bd, "SELECT id, nombre FROM sub_categorias 
where id_categoria = $id ");
while ($chek_subCat = mysqli_fetch_array($chek)) { 
     $id_subCat = $chek_subCat['id'];
     $nombre = $chek_subCat['nombre'];
}
if($id_subCat){
    echo "Aca en el if";
    $_SESSION['not']=$nombre_cat;
   header("Location: alta_categorias.php");
}else{
    echo "Aca en el else";
mysqli_query($conexion_bd, "DELETE FROM categorias WHERE id_categoria  = $id");

 $_SESSION['cat_eliminada']="ELIMINADA";

header("Location: alta_categorias.php");
}
