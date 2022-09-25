<?php
session_start();
include('conexion.php');
$id_venta = $_POST['id_venta'];
$id_cli = $_POST['id_cli'];
$nombre_cli = $_POST['nombre_cli'];
$tabla = $_POST['tabla'];
//echo 'id cliente' . $id_cli;
$fecha_alta = date('Y-m-d');
if (!$id_cli) {
    echo 'Enter en falta cliente';
    $_SESSION['cli'] = "CLIENTE";
    header("Location: ventas.php");
} else {
    $id_ventas = mysqli_query($conexion_bd, "SELECT id FROM clientes_ventas");
    while ($listar_datos = mysqli_fetch_array($id_ventas)) {
        $id_venta = $listar_datos['id'];
    }



    $datos_venta = mysqli_query($conexion_bd, "SELECT id, cod, producto, neto_mostrador, descto, iva, precio_final, cantidad, total 
    FROM $tabla");

    while ($listar_datos = mysqli_fetch_array($datos_venta)) {
        $id = $listar_datos['id'];
        $cod_prov = $listar_datos['cod'];
        $producto = $listar_datos['producto'];
        $neto_mostrador = $listar_datos['neto_mostrador'];
        $descto = $listar_datos['descto'];
        $iva = $listar_datos['iva'];
        $precio_final = $listar_datos['precio_final'];     
        $cantidad = $listar_datos['cantidad'];
        $total = $listar_datos['total'];             
          

            mysqli_query($conexion_bd, "INSERT INTO ventas_consulta VALUES($id_venta, $id, $cod_prov, 
    '$producto', $neto_mostrador, $descto, $iva, $precio_final, $cantidad, '$fecha_alta')");
   /*   echo $id_recepcion, $id, $id_prove, $cod_prov, 
      $producto, $costo, $iva, $descto, $descto2, $descto3, $utilidad, $cantidad, $cotizacion;
        */       
    }
    mysqli_query($conexion_bd, "INSERT INTO ventas_listado VALUES(default, $id_venta, $id_cli, '$nombre_cli', '$fecha_alta')");
   
   

    mysqli_query($conexion_bd, "DELETE FROM $tabla");
    mysqli_query($conexion_bd, "DELETE FROM clientes_ventas");
    header("Location: ventas.php");
}
