<?php
session_start();
//session_destroy($_SESSION['ya_existe']);
include('conexion.php');
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nuevo_usuario = $_POST['nuevo_usuario'];
$nuevo_password = $_POST['nuevo_password'];
$confir_pass = $_POST['confirmar_password'];
$nombre = $_POST['nombre'];
$mail = $_POST['email'];
$confir_mail = $_POST['confirmar_email'];
$ciudad = $_POST['ciudad'];
$provincia = $_POST['provincia'];
$cod_area = $_POST['codigo_area'];
$movil = $_POST['movil'];

$rango = 'invitado';
$avatar_name = $_FILES['avatar']['name'];
$avatar_type = $_FILES['avatar']['type'];
$avatar_tmp = $_FILES['avatar']['tmp_name'];

move_uploaded_file($avatar_tmp, 'img_login/' . $avatar_name);


if($nuevo_password == $confir_pass ){


include('conexion.php');
if ($usuario) {

    $consulta_usuario = mysqli_query($conexion_bd, "SELECT user, pass FROM user WHERE user = '$usuario'");
    while ($listar_datos = mysqli_fetch_array($consulta_usuario)) {
        $existe = $listar_datos['usuario'];
        $rango = $listar_datos['rango'];
    }
    if ($existe) { // El usuario existe
        if ($rango == 'administrador') {
            $_SESSION['administrador'] = $usuario;
            
          header("Location: admin.php");
           
        } else {           
            $_SESSION['mostrador'] = $usuario;
            header("Location: index.php");
          
        }
    } else {
        $_SESSION['no_existe_usuario']= $usuario;
       
          header("Location: login_entrar.php");

    }
}
if ($nuevo_usuario) {
    $alta_usuario = mysqli_query($conexion_bd, "SELECT usuario, rango FROM log_in WHERE usuario = '$nuevo_usuario'");
    while ($listar_datos = mysqli_fetch_array($alta_usuario)) {
        $existe = $listar_datos['usuario'];
        $rango = $listar_datos['rango'];
    }
    if ($existe) { // El usuario ya existe
        $_SESSION['ya_existe'] = $nuevo_usuario;
       header("Location: login_entrar.php");
      
    } else {
        
        $_SESSION['reg_exitoso'] = $nuevo_usuario;
        mysqli_query($conexion_bd, "INSERT INTO log_in VALUES (DEFAULT, '$nuevo_usuario', '$nuevo_password', '$nombre',
        '$mail', '$ciudad', '$provincia', '$cod_area', '$movil', '$avatar_name', '$rango')");
        echo " se registro el nuevo usuario";
       header("Location: index.php");
        
    }
}
}else{
    $pass_inc = "Password Incorrecto";
    $_SESSION['pass_incorrecto'] = $pass_inc;
    header("Location: login_registro.php");
}
?>