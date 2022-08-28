    <?php
require('conexion.php');

$columns2 = [
    'id', 'cod_proveedor', 'producto', 'neto_mostrador', 'iva', 'precio_final'
];

$tabla = "productos";

$campo = $conexion_bd->real_escape_string($_POST['campo']) ?? null;

$sql = "SELECT" . " " . implode(", ", $columns2) . "
FROM $tabla WHERE 1";
foreach (explode(' ', $campo) as $termino)
    $sql .= " AND producto LIKE '%" . $termino . "%'";
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
        $html .= '<td>' . $row['neto_mostrador'] . '</td>';
        $html .= '<td>' . $row['iva'] . '</td>';
        $html .= '<td>' . $row['precio_final'] . '</td>'; 
        $html .= '<td><a href="producto_modifica.php?id='. $row['id'].'" style="color:white;" class="btn btn-warning" >EDITA</a></td>';
        $html .= '<td><a href="producto_eliminado.php?id='. $row['id'].'" style="color:white;" class="btn btn-danger" >ELIMINA</a></td>';      
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="10">Sin Resultados</td>';
    $html .= '</tr>';
}
echo json_encode($html, JSON_UNESCAPED_UNICODE);
