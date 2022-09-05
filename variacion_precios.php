<?php
include('conexion.php');
session_start();
$inc = $_POST['incremento'];
$dec = $_POST['decremento'];


if ($inc) {
    
    $consulta = mysqli_query($conexion_bd, "SELECT id, costo, dscto, dscto2, dscto3, utilidad, 
    cotizacion, neto_mostrador, iva, precio_final FROM update_precios");
    if ($consulta) {
        while ($listar_datos = mysqli_fetch_array($consulta)) {

            $cod = $listar_datos['id'];
            $neto_mostrador = $listar_datos['neto_mostrador'];
            $iva = $listar_datos['iva'];
            $p_final = $listar_datos['precio_final'];
            $costo = $listar_datos['costo'];
            $dscto = $listar_datos['dscto'];
            $dscto2 = $listar_datos['dscto2'];
            $dscto3 = $listar_datos['dscto3'];
            $utilidad = $listar_datos['utilidad'];
            $cotizacion = $listar_datos['cotizacion'];

            if($cotizacion < 1){
                $cotizacion = 1;
            }

            $cal_inc = $costo * $inc / 100;
            $costo_inc = $costo + $cal_inc;
            echo "Costo inicial " . $costo . "<br>".
            "Costo con incremento del 10% " . $costo_inc . "<br>";

            $primer_descto = $costo_inc * $dscto / 100;
            echo "Primer descto 10% de 334.4 : " . $primer_descto . "<br>";
            $nuevo_costo3 = $costo_inc - $primer_descto;
            echo "Costo con descto : " . $nuevo_costo3 . "<br>";

            $segundo_descto = $nuevo_costo3 * $dscto2 / 100;
            echo "2 descto 0% de 300.96 : " . $segundo_descto . "<br>";
            $nuevo_costo2 = $nuevo_costo3 - $segundo_descto;
            echo "Costo con 2 descto : " . $nuevo_costo2 . "<br>";

            $tercer_descto = $nuevo_costo2 * $dscto3 / 100;
            echo "3 descto 0% de 300.96 : " . $tercer_descto . "<br>";
            $nuevo_cost = $nuevo_costo2 - $tercer_descto;
            echo "Costo con 3 descto : " . $nuevo_cost . "<br>";
            $nuevo_costo = $nuevo_cost * $cotizacion;
            echo "La cotizacion del dolar es : " . $cotizacion . "<br>";
            echo "Costo * cotizacion dolar : " . $nuevo_costo . "<br>";

            $suma_utilidad = $nuevo_costo * $utilidad / 100;
            $nuevo_neto = $nuevo_costo + $suma_utilidad;

            $cal_iva = $nuevo_neto * $iva / 100;
            $nuevo_final = $nuevo_neto + $cal_iva;

            mysqli_query($conexion_bd, "UPDATE update_precios SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final', cotizacion = '$cotizacion', costo = '$costo_inc' 
            WHERE id= '$cod'");

            mysqli_query($conexion_bd, "UPDATE productos SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final', cotizacion = '$cotizacion', costo = '$costo_inc' 
            WHERE id= '$cod'");

           
        }
        $_SESSION['muestra'] = 'sip';
    }
}
if ($dec) {

    $consulta = mysqli_query($conexion_bd, "SELECT id, costo, dscto, dscto2, dscto3, utilidad, 
    cotizacion, neto_mostrador, iva, precio_final FROM update_precios");
    if ($consulta) {

        while ($listar_datos = mysqli_fetch_array($consulta)) {
            $cod = $listar_datos['id'];
            $neto_mostrador = $listar_datos['neto_mostrador'];
            $iva = $listar_datos['iva'];
            $p_final = $listar_datos['precio_final'];
            $costo = $listar_datos['costo'];
            $dscto = $listar_datos['dscto'];
            $dscto2 = $listar_datos['dscto2'];
            $dscto3 = $listar_datos['dscto3'];
            $utilidad = $listar_datos['utilidad'];
            $cotizacion = $listar_datos['cotizacion'];

            if($cotizacion < 1){
                $cotizacion = 1;
            }

            $cal_dec = $costo * $dec / 100;
            $costo_dec = $costo - $cal_dec;
            echo "Costo inicial " . $costo . "<br>".
            "Costo con decremento del 10% " . $costo_dec . "<br>";

            $primer_descto = $costo_dec * $dscto / 100;
            echo "Primer descto 10%  : " . $primer_descto . "<br>";
            $nuevo_costo3 = $costo_dec - $primer_descto;
            echo "Costo con descto : " . $nuevo_costo3 . "<br>";

            $segundo_descto = $nuevo_costo3 * $dscto2 / 100;
            echo "2 descto 0% de 300.96 : " . $segundo_descto . "<br>";
            $nuevo_costo2 = $nuevo_costo3 - $segundo_descto;
            echo "Costo con 2 descto : " . $nuevo_costo2 . "<br>";

            $tercer_descto = $nuevo_costo2 * $dscto3 / 100;
            echo "3 descto 0% de 300.96 : " . $tercer_descto . "<br>";
            $nuevo_cost = $nuevo_costo2 - $tercer_descto;
            echo "Costo con 3 descto : " . $nuevo_cost . "<br>";
            $nuevo_costo = $nuevo_cost * $cotizacion;
            echo "La cotizacion del dolar es : " . $cotizacion . "<br>";
            echo "Costo * cotizacion dolar : " . $nuevo_costo . "<br>";

            $suma_utilidad = $nuevo_costo * $utilidad / 100;
            $nuevo_neto = $nuevo_costo + $suma_utilidad;

            $cal_iva = $nuevo_neto * $iva / 100;
            $nuevo_final = $nuevo_neto + $cal_iva;

            mysqli_query($conexion_bd, "UPDATE productos SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final', cotizacion = '$cotizacion', costo = '$costo_dec' 
            WHERE id= '$cod'");

            mysqli_query($conexion_bd, "UPDATE update_precios SET neto_mostrador = '$nuevo_neto',
            precio_final = '$nuevo_final', cotizacion = '$cotizacion', costo = '$costo_dec' 
            WHERE id= '$cod'");
        }
        $_SESSION['muestra'] = 'sip';
    }
}

 header("Location: cp_filtros.php");
