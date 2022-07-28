<?php

include('conexion.php');
$usuario = $_POST['usuario'];
$password = $_POST['password'];

include('conexion.php');

$consulta_usuario = mysqli_query($conexion_bd, "SELECT user, pass, nivel FROM user WHERE user = '$usuario'");
while ($listar_datos = mysqli_fetch_array($consulta_usuario)) {
    $user = $listar_datos['user'];
    $pass = $listar_datos['pass'];
    /* $pass = $listar_datos['pass'];*/
    $nivel_rango = $listar_datos['nivel'];
}
if ($usuario === $user) {

    if ($password === $pass) {
        if ($nivel_rango === 'administrador') {
            $_SESSION['administrador'] = $usuario;
            header("Location: index.php");
          // echo $_SESSION['administrador'];
        }
        if ($nivel_rango === 'mostrador') {
            $_SESSION['mostrador'] = $usuario;
            header("Location: index.php");
          // echo 'Rango mostrador' . $_SESSION['mostrador'] ;
        }
    } else {
        $_SESSION['pass_incorrecto'] = 'Password Incorrecto';
        header("Location: login.php");
        //echo 'Fuera de pass';
    }
} else {
    $_SESSION['no_existe_usuario'] = 'Oops...!!!';

    header("Location: login.php");
}
?>