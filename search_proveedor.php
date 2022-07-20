<?php
require('conexion.php');


$columns = ['id', 'nombre', 'nombre_contacto', 'cuit', 'direccion'
, 'localidad', 'tel_fijo', 'whatsapp', 'email', 'fecha_alta'];

$tabla = "proveedores";

$campo = $conexion_bd->real_escape_string($_POST['campo']) ?? null;

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
        $html .= '<td>'.$row['nombre_contacto'].'</td>';
        $html .= '<td>'.$row['cuit'].'</td>';
        $html .= '<td>'.$row['direccion'].'</td>';
        $html .= '<td>'.$row['localidad'].'</td>';
        $html .= '<td>'.$row['tel_fijo'].'</td>';
        $html .= '<td>'.$row['whatsapp'].'</td>';
        $html .= '<td>'.$row['email'].'</td>';
        $html .= '<td>'.$row['fecha_alta'].'</td>';
        $html .= '</tr>';

    }

}else {
    $html .= '<tr>';
    $html .= '<td colspan="10">Sin Resultados</td>';
    $html .= '</tr>';
}
echo json_encode($html, JSON_UNESCAPED_UNICODE);



?>