<?php

session_start();
    if($_POST){
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
    $id = $_POST['id'];

    
/*
echo "nombre ". $nombre . " venta " . $cond_venta . " contacto " . $contacto . "\n".
"cuit ". $cuit . " cond_fiscal " . $cond_fiscal . " direccion " . $direccion . "\n". 
"localidad ". $localidad . " provincia " . $provincia . " email " . $email . "\n" . 
" telefono " . $telefono . " movil " . $movil;*/

 include('conexion.php');
    mysqli_query($conexion_bd, "UPDATE clientes SET condicion_venta = '$cond_venta', nombre = '$nombre',
    nombre_contacto = '$contacto', cuit = '$cuit', cond_fiscal = '$cond_fiscal', direccion = '$direccion', 
    localidad = '$localidad', provincia = '$provincia', email = '$email', tel_fijo = '$telefono',
    whatsapp = '$movil' WHERE id= '$id'");

 $_SESSION['cliente_modificado']="MODIFICADO!!!";
    header("Location: clientes_modifica.php");
    }
