<?php
session_start();


$cat = $_POST['sub_categoria'];
$select_cat = $_POST['select_cat'];
$categoria = strtoupper($cat);

include('conexion.php');

$existe = mysqli_query($conexion_bd, "SELECT nombre FROM sub_categorias WHERE nombre= '$categoria'");

while ($dato = mysqli_fetch_array($existe)) {
$disponible = $dato['nombre'];
}
if($disponible){        
    $_SESSION['no_disponible']= $cat;
    header("Location: alta_sub_categoria.php");    
}else {  
mysqli_query($conexion_bd, "INSERT INTO sub_categorias VALUES(default, '$categoria', '$select_cat')");
$_SESSION['sub_categoria'] = "En buena hora !!!";
header("Location: alta_sub_categoria.php");
}



?>