<?php
require('conexion.php');


$columns = ['id', 'nombre', 'cuit', 'direccion'];

$tabla = "proveedores";

$campo = $conexion_bd->real_escape_string($_POST['update_proveedor']) ?? null;

$where = '';
if($campo != null){
$where = "WHERE (";

$cont = count($columns);

for($i = 0; $i < $cont; $i++){
    $where .= $columns[$i] . " LIKE'%" . $campo . "%' OR ";
}
$where = substr_replace($where, "", -3);
$where .= ")";
}

$sql = "SELECT" . " " . implode(", ", $columns) . "
FROM $tabla
$where ";

$resultado = $conexion_bd->query($sql);
$num_rows = $resultado->num_rows;

$html = '';
if($num_rows > 0){
    while($row = $resultado->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>'.$row['id'].'</td>';
        $html .= '<td>'.$row['nombre'].'</td>';        
        $html .= '<td>'.$row['cuit'].'</td>';
        $html .= '<td>'.$row['direccion'].'</td>';        
        $html .= '<td><a href="proveedor_update_process.php?id='. $row['id'].'" class="btn btn-success" >MODIFICAR</a></td>';
        $html .= '</tr>';

    }

}else {
    $html .= '<tr>';
    $html .= '<td colspan="5">Sin Resultados</td>';
    $html .= '</tr>';
}
echo json_encode($html, JSON_UNESCAPED_UNICODE);



?>