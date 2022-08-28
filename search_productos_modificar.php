<?php
require('conexion.php');

if(isset($_POST['campo1'])){
$columns2 = ['cod_interno', 'producto', 'neto_mostrador'
, 'iva', 'precio_final'];

$tabla = "productos";

$campo = $conexion_bd->real_escape_string($_POST['campo1']) ?? null;

$sql="SELECT" . " " . implode(", ", $columns2) . "
FROM $tabla WHERE 1";
foreach(explode(' ',$campo) as $termino)
    $sql.=" AND producto LIKE '%".$termino."%'";
$sql.="LIMIT 1500";
$resultado = $conexion_bd->query($sql);
$num_rows = $resultado->num_rows;

$html = '';
if($campo){
if($num_rows > 0){
    while($row = $resultado->fetch_assoc()) {
        $html .= '<tr>';   
        $html .= '<td>'.$row['cod_interno'].'</td>';        
        $html .= '<td>'.$row['producto'].'</td>';
        $html .= '<td>'.$row['neto_mostrador'].'</td>';
        $html .= '<td>'.$row['iva'].'</td>';
        $html .= '<td>'.$row['precio_final'].'</td>';              
        $html .= '</tr>';
    }
}
}else {
    $html .= '<tr>';
    $html .= '<td colspan="10">Sin Resultados</td>';
    $html .= '</tr>';
}
echo json_encode($html, JSON_UNESCAPED_UNICODE);
}
