<?php
require('conexion.php');
mysqli_query($conexion_bd, "DELETE FROM update_precios");
if (isset($_POST['campo1'])) {
    
    $columns = [
        'cod_interno', 'producto', 'neto_mostrador', 'iva', 'precio_final'
    ];
    $tabla = "productos";
    $campo = $conexion_bd->real_escape_string($_POST['campo1']) ?? null;

    //$campo = strtoupper($camp);

    

    $sql = "SELECT" . " " . implode(", ", $columns) . "
    FROM $tabla WHERE 1";
foreach (explode(' ', $campo) as $termino )
    $sql .= " AND producto LIKE '%" . $termino . "%'";

    $resultado = $conexion_bd->query($sql);
    $num_rows = $resultado->num_rows;
    
    if ($num_rows > 0) {
      //  
        while ($row = $resultado->fetch_assoc()) {

            $cod_interno =  $row['cod_interno'];
            $producto =   $row['producto'];
            $neto_mostrador = $row['neto_mostrador'];
            $iva = $row['iva'];
            $precio_final = $row['precio_final'];
            
            mysqli_query($conexion_bd, "INSERT INTO update_precios VALUES('$cod_interno', 
            '$producto', '$neto_mostrador', '$iva', '$precio_final')");
        }
    } 



    //

    /*
$resultado = $conexion_bd->query($sql);
    while ($dato = mysqli_fetch_array($resultado)) {
        $cod_interno = $dato['cod_interno'];
        $producto = $dato['producto'];
        $neto_mostrador = $dato['neto_mostrador'];
        $iva = $dato['iva'];
        $precio_final = $dato['precio_final'];

        mysqli_query($conexion_bd, "INSERT INTO update_precios VALUES('$cod_interno', 
        '$producto', ' $neto_mostrador', '$iva', '$precio_final')");
        }

*/
}
