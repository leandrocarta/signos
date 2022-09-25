<?php
session_start();

include('conexion.php');
$usuario = $_POST['usuario'];
$password = $_POST['password'];



$consulta_usuario = mysqli_query($conexion_bd, "SELECT user, pass, nivel FROM user WHERE user = '$usuario'");
while ($listar_datos = mysqli_fetch_array($consulta_usuario)) {
    $user = $listar_datos['user'];
    $pass = $listar_datos['pass'];
    $nivel_rango = $listar_datos['nivel'];
}
if ($usuario === $user) {
    if ($password === $pass) {
        if($nivel_rango === 'administrador'){
          //  echo "Entre en administrador soy:" . $usuario;
            $_SESSION['administrador'] = $usuario;
            $_SESSION['gral'] = $usuario;
            header("Location: index.php");
        }else{
          //  echo "Entre en mostradorsoy: " . $usuario;
            $_SESSION['mostrador'] = $usuario;
            $_SESSION['gral'] = $usuario;
            header("Location: index.php");
        }      
        
    } else {   
       // echo "Entre en Pass incorrecto";     
        $_SESSION['pass_incorrecto'] = $password;
        header("Location: login.php");
    }
} else {
  //  echo "Entre en Login";
    $_SESSION['no_existe_usuario'] = $usuario;
   header("Location: login.php");
}


?>