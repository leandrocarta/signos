<?php
session_start();


$cat = $_POST['categoria'];
$categoria = strtoupper($cat);

echo "Categoria ". $categoria;

include('conexion.php');

$existe = mysqli_query($conexion_bd, "SELECT nombre FROM categorias WHERE nombre= '$categoria'");

while ($dato = mysqli_fetch_array($existe)) {
$disponible = $dato['nombre'];
}
if($disponible){        
    $_SESSION['no_disponible']= $categoria;
    header("Location: alta_categorias.php");    
}else {  
mysqli_query($conexion_bd, "INSERT INTO categorias VALUES(default, '$categoria')");
$_SESSION['categoria'] = "En buena hora !!!";
header("Location: alta_categorias.php");
}
