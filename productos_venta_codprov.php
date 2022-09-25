<?php
require('conexion.php');

$columns2 = [
    'id', 'cod_proveedor', 'producto', 'neto_mostrador', 'iva', 'precio_final'
];

$tabla = "productos";

$campo = $conexion_bd->real_escape_string($_POST['cod_prov']) ?? null;

$sql = "SELECT" . " " . implode(", ", $columns2) . "
FROM $tabla WHERE 1";
foreach (explode(' ', $campo) as $termino)
    $sql .= " AND cod_proveedor LIKE '" . $termino . "%'";
$sql .= "LIMIT 1500";
$resultado = $conexion_bd->query($sql);
$num_rows = $resultado->num_rows;
$html = '';
if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $row['cod_proveedor'] . '</td>';
        $html .= '<td>' . $row['producto'] . '</td>';
        $html .= '<td><a href="ventas_modifica.php?id='. $row['id'].'" style="color:white;" class="btn btn-success" >ENVIAR</a></td>';        
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="10">Sin Resultados</td>';
    $html .= '</tr>';
}
echo json_encode($html, JSON_UNESCAPED_UNICODE);
