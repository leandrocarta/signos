<?php
session_start();
include('conexion.php');

$id_prove = $_POST['id_prove'];
if (!$id_prove) {
    $_SESSION['prove'] = "PROVEEDOR ?";
    header("Location: recepcion.php");
} else {

    $datos_recep = mysqli_query($conexion_bd, "SELECT id, costo, iva, descto, descto2, descto3, utilidad, 
cantidad, cotizacion FROM recepcion");

    while ($listar_datos = mysqli_fetch_array($datos_recep)) {
        $id = $listar_datos['id'];
        $costo = $listar_datos['costo'];
        $iva = $listar_datos['iva'];
        $descto = $listar_datos['descto'];
        $descto2 = $listar_datos['descto2'];
        $descto3 = $listar_datos['descto3'];
        $utilidad = $listar_datos['utilidad'];
        $cantidad = $listar_datos['cantidad'];
        $cotizacion = $listar_datos['cotizacion'];

        $primer_descto = $costo * $descto / 100;
        $costo1 = $costo - $primer_descto;

        $segundo_descto = $costo1 * $descto2 / 100;
        $costo2 = $costo1 - $segundo_descto;

        $tercer_descto = $costo2 * $descto3 / 100;
        $costo3 = $costo2 - $tercer_descto;

        $nuevo_costo = $costo3 * $cotizacion;

        $suma_utilidad = $nuevo_costo * $utilidad / 100;
        $nuevo_neto = $nuevo_costo + $suma_utilidad;

        $cal_iva = $nuevo_neto * $iva / 100;
        $nuevo_final = $nuevo_neto + $cal_iva;

        if ($nuevo_final) {
            mysqli_query($conexion_bd, "UPDATE productos SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final', cotizacion = '$cotizacion', costo = '$costo', 
            dscto = '$descto', dscto2 = '$descto2', dscto3 = '$descto3', iva = '$iva',
            utilidad = '$utilidad' WHERE id= '$id'");
            $_SESSION['correcto'] = 'CORRECTO';
        }        
    }
    if (!$nuevo_final) {
        $_SESSION['cargar'] = 'FALTAN DATOS';
        header("Location: recepcion.php");
    }

    mysqli_query($conexion_bd, "DELETE FROM recepcion");
    mysqli_query($conexion_bd, "DELETE FROM recepcion_proveedor");
    header("Location: recepcion.php");
}
