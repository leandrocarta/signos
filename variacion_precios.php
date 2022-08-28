<?php
include('conexion.php');
session_start();
$inc = $_POST['incremento'];
$dec = $_POST['decremento'];
echo $inc;
if ($inc) {

    $consulta = mysqli_query($conexion_bd, "SELECT cod_interno, neto_mostrador, iva, precio_final
FROM update_precios");
    if ($consulta) {

        while ($listar_datos = mysqli_fetch_array($consulta)) {

            $cod = $listar_datos['cod_interno'];
            $neto = $listar_datos['neto_mostrador'];
            $iva = $listar_datos['iva'];
            $p_final = $listar_datos['precio_final'];

            $incremento = $neto * $inc / 100;
            $nuevo_neto = $neto + $incremento;

            $cal_iva = $nuevo_neto * $iva / 100;
            $nuevo_final = $nuevo_neto + $cal_iva;

            mysqli_query($conexion_bd, "UPDATE productos2 SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final' WHERE id= '$cod'");

            mysqli_query($conexion_bd, "UPDATE update_precios SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final' WHERE cod_interno= '$cod'");
        }
        $_SESSION['muestra'] = 'sip';
    }
}
if ($dec) {

    $consulta = mysqli_query($conexion_bd, "SELECT cod_interno, neto_mostrador, iva, precio_final
FROM update_precios");
    if ($consulta) {

        while ($listar_datos = mysqli_fetch_array($consulta)) {

            $cod = $listar_datos['cod_interno'];
            $neto = $listar_datos['neto_mostrador'];
            $iva = $listar_datos['iva'];
            $p_final = $listar_datos['precio_final'];

            $decremento = $neto * $dec / 100;
            $nuevo_neto = $neto - $decremento;

            $cal_iva = $nuevo_neto * $iva / 100;
            $nuevo_final = $nuevo_neto + $cal_iva;

            mysqli_query($conexion_bd, "UPDATE productos2 SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final' WHERE id= '$cod'");

            mysqli_query($conexion_bd, "UPDATE update_precios SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final' WHERE cod_interno= '$cod'");
        }
        $_SESSION['muestra'] = 'sip';
    }
}

header("Location: cp_filtros.php");
