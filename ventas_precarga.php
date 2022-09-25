<?php
include('conexion.php');
session_start();

$cod_int = $_POST['cod_int'];
echo "Llega cod int. " . $cod_int . "<br>";
if ($cod_int) {
   // echo "Dentro del IF Llega cod int. " . $cod_int . "<br>";
    $puesto1 = mysqli_query($conexion_bd, "SELECT * FROM puesto1");
    while ($datosPuesto1 = mysqli_fetch_array($puesto1)) {
        $dato1 = $datosPuesto1['id']; 
    }
    $puesto2 = mysqli_query($conexion_bd, "SELECT * FROM puesto2");
    while ($datosPuesto2 = mysqli_fetch_array($puesto2)) {
        $dato2 = $datosPuesto2['id']; 
    }
    $puesto3 = mysqli_query($conexion_bd, "SELECT * FROM puesto3");
    while ($datosPuesto3 = mysqli_fetch_array($puesto3)) {
        $dato3 = $datosPuesto3['id']; 
    }
    $puesto4 = mysqli_query($conexion_bd, "SELECT * FROM puesto4");
    while ($datosPuesto4 = mysqli_fetch_array($puesto4)) {
        $dato4 = $datosPuesto4['id']; 
    }
    $puesto5 = mysqli_query($conexion_bd, "SELECT * FROM puesto5");
    while ($datosPuesto5 = mysqli_fetch_array($puesto5)) {
        $dato5 = $datosPuesto5['id']; 
    }
    $puesto6 = mysqli_query($conexion_bd, "SELECT * FROM puesto6");
    while ($datosPuesto6 = mysqli_fetch_array($puesto6)) {
        $dato6 = $datosPuesto6['id']; 
    }
    $puesto7 = mysqli_query($conexion_bd, "SELECT * FROM puesto7");
    while ($datosPuesto7 = mysqli_fetch_array($puesto7)) {
        $dato7 = $datosPuesto7['id']; 
    }
   // $puesto3 = mysqli_query($conexion_bd, "SELECT * FROM puesto3");
   // $puesto4 = mysqli_query($conexion_bd, "SELECT * FROM puesto4");
   // $puesto5 = mysqli_query($conexion_bd, "SELECT * FROM puesto5");
   // echo "La variable de BD puesto 1 tiene: " . $puesto1. "<br>";
    if ((!$dato1) || ($_SESSION['puesto1'])) {
       // echo "Estoy en el IF del puesto 1 <br> ";        
        $tabla = 'puesto1';
        $_SESSION['puesto1']='puesto1';
        echo "En en el IF del puesto 1 la variable tabla se llama:" . $tabla. "<br> ";
        
    } else if ((!$dato2) || ($_SESSION['puesto2'])) {
      //  echo "Estoy en el IF del puesto 2 <br> ";
        $tabla = 'puesto2';
        $_SESSION['puesto2']='puesto2';
       // echo "En en el IF del puesto 2 la variable tabla se llama:" . $tabla. "<br> ";
    } else if ((!$dato3) || ($_SESSION['puesto3'])) {
      //  echo "Estoy en el IF del puesto 2 <br> ";
        $tabla = 'puesto3';
        $_SESSION['puesto3']='puesto3';
      //  echo "En en el IF del puesto 2 la variable tabla se llama:" . $tabla. "<br> ";
    } else if ((!$dato4) || ($_SESSION['puesto4'])) {
      //  echo "Estoy en el IF del puesto 2 <br> ";
        $tabla = 'puesto4';
        $_SESSION['puesto4']='puesto4';
      //  echo "En en el IF del puesto 2 la variable tabla se llama:" . $tabla. "<br> ";
    } else if ((!$dato5) || ($_SESSION['puesto5'])) {
     //   echo "Estoy en el IF del puesto 2 <br> ";
        $tabla = 'puesto5';
        $_SESSION['puesto5']='puesto5';
      //  echo "En en el IF del puesto 2 la variable tabla se llama:" . $tabla. "<br> ";
    } else if ((!$dato6) || ($_SESSION['puesto6'])) {
      //  echo "Estoy en el IF del puesto 2 <br> ";
        $tabla = 'puesto6';
        $_SESSION['puesto6']='puesto6';
       // echo "En en el IF del puesto 2 la variable tabla se llama:" . $tabla. "<br> ";
    } else if ((!$dato7) || ($_SESSION['puesto7'])) {
       // echo "Estoy en el IF del puesto 2 <br> ";
        $tabla = 'puesto7';
        $_SESSION['puesto7']='puesto7';
      //  echo "En en el IF del puesto 2 la variable tabla se llama:" . $tabla. "<br> ";
    }
}


$cod_int = $_POST['cod_int'];
$cantidad = $_POST['cantidad'];
$descto_prod = $_POST['descto_prod'];

if (($cantidad) < 1 || (!$cod_int)) {
    $_SESSION['cantidad'] = 'INGRESE UNA CANTIDAD';
    $_SESSION['foco'] = 'foco';
    header("Location: ventas.php");
} else {
    if ($cod_int) {
        $producto = mysqli_query($conexion_bd, "SELECT id, producto, neto_mostrador, iva,
    precio_final FROM productos WHERE id = $cod_int");
        while ($listar_datos = mysqli_fetch_array($producto)) {
            $cod = $listar_datos['id'];
            $producto = $listar_datos['producto'];
            $neto_mostrador = $listar_datos['neto_mostrador'];
            $iva = $listar_datos['iva'];
            $precio_final = $listar_datos['precio_final'];
        }
        if ($descto_prod > 0) {
            echo "Entre en Descuento";
            $p1 = $neto_mostrador * $descto_prod / 100;
            $neto = $neto_mostrador - $p1;
            $p2 = $neto * $iva / 100;
            $final = $neto + $p2;
            $total = $final * $cantidad;
            mysqli_query($conexion_bd, "INSERT INTO $tabla VALUES(default, $cod, '$producto', $neto_mostrador,
 $descto_prod, $iva, $final, $cantidad, $total)");
        } else {
            echo "Sin    Descuento";
            $total = $final * $cantidad;
            mysqli_query($conexion_bd, "INSERT INTO $tabla VALUES(default, $cod, '$producto', $neto_mostrador, 
$descto_prod, $iva, $precio_final, $cantidad, $total)");
        }
        /*  echo "cod ". $cod . "<br>";
    echo "ID ". $cod_int . "<br>";
    echo "producto ". $producto . "<br>";
     echo "descto_prod: " . $descto_prod. "<br>";
     echo "neto con descto: " . $neto. "<br>";
     echo "neto sin descto: " . $neto_mostrador. "<br>";
     echo "iva: " . $iva. "<br>";
     echo "cantidad: " . $cantidad. "<br>";
     echo "precio_final sin descto: " . $precio_final. "<br>";
     
 echo "precio_final con descto: " . $final. "<br>";*/



        mysqli_query($conexion_bd, "DELETE FROM ventas_pre");
    }
}


//header("Location: ventas.php");

/*
echo "Cod Int " . $cod_int . "<br>";
echo "cod_prov " . $cod_prov . "<br>";
echo "producto " . $producto . "<br>";
echo "costo " . $costo . "<br>";
echo "iva " . $iva . "<br>";
echo "bonif_1 " . $bonif_1 . "<br>";
echo "bonif_2 " . $bonif_2 . "<br>";
echo "bonif_3 " . $bonif_3 . "<br>";
echo "utilidad " . $utilidad . "<br>";
echo "cantidad " . $cantidad . "<br>";
 */

header("Location: ventas.php");
