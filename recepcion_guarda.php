<?php
session_start();
include('conexion.php');
$idRecep = $_POST['id_recepcion'];
$id_prove = $_POST['id_prove'];
$nombre_prove = $_POST['nombre_prove'];
$fecha_alta = date('Y-m-d');
if (!$id_prove) {
    $_SESSION['prove'] = "PROVEEDOR ?";
    header("Location: recepcion.php");
} else {
    $id_recep = mysqli_query($conexion_bd, "SELECT id FROM recepcion_proveedor");
    while ($listar_datos = mysqli_fetch_array($id_recep)) {
        $id_recepcion = $listar_datos['id'];
    }



    $datos_recep = mysqli_query($conexion_bd, "SELECT id, cod_prov, producto, costo, iva, descto, descto2, descto3, utilidad, 
cantidad, cotizacion FROM recepcion");

    while ($listar_datos = mysqli_fetch_array($datos_recep)) {
        $id = $listar_datos['id'];
        $cod_prov = $listar_datos['cod_prov'];
        $producto = $listar_datos['producto'];
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

            mysqli_query($conexion_bd, "INSERT INTO recepcion_consulta VALUES($id_recepcion, $id, $id_prove, '$nombre_prove', '$cod_prov', 
    '$producto', $costo, $iva, $descto, $descto2, $descto3, $utilidad, $cantidad, $cotizacion, '$fecha_alta')");
   /*   echo $id_recepcion, $id, $id_prove, $cod_prov, 
      $producto, $costo, $iva, $descto, $descto2, $descto3, $utilidad, $cantidad, $cotizacion;
        */ }        
    }
    mysqli_query($conexion_bd, "INSERT INTO recepcion_lista VALUES(default, $id_recepcion, $id_prove, '$nombre_prove', '$fecha_alta')");
   
    if (!$nuevo_final) {
        $_SESSION['cargar'] = 'FALTAN DATOS';
        header("Location: recepcion.php");
    }

    mysqli_query($conexion_bd, "DELETE FROM recepcion");
    mysqli_query($conexion_bd, "DELETE FROM recepcion_proveedor");
    header("Location: recepcion.php");
}
