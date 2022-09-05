<?php
session_start();
$admin = $_SESSION['admin'];
$mostrador = $_SESSION['mostrador'];
if (!$admin || !$mostrador) {
    header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Ferretería Signos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5cd6077bf2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sass/estilos.css">
</head>

<body>
    <?php
    include("nav.php");
    include('conexion.php');
    ?>
    <div class="container-fluid  bg-success">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-11 pt-3 text-center">
                        <h5 class="border rounded-2 p-2" style="color: white;">MODIFICACIONES DE PRECIOS</h5>
                    </div>
                    <div class="col-md-1">
                        <form action="index.php">
                            <button class="btn"> <i class="fas fa-window-close"></i></button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h5 class="text-center" style="color: white;">FILTROS DE BUSQUEDA</h5>
                    <div class="col-lg-6 ">
                        <div class="border">
                            <form class=" p-3" method="POST">
                                <div style="color: white;" id="emailHelp" class="form-text">BÚSQUEDA POR PALABRAS</div>
                                <div class="">
                                    <input type="text" name="busqueda_estricta" class="form-control me-2 mb-2" placeholder="Palabra estricta">
                                    <button type="submit" class="btn btn-primary form-control p-2">BUSCAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 border">
                        <div class="my-2">
                            <form method="POST">
                                <input type="text" name="codigo_inicial" class="form-control mb-2" placeholder="Desde Código">
                                <input type="text" name="codigo_final" class="form-control mb-2" placeholder="Hasta el Código">
                                <button type="submit" class="btn btn-primary form-control p-2">BUSCAR</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 my-3 pe-4">
                        <form class="border p-3" style="margin-right: -11px;" method="POST">
                            <div style="color: white;" class="form-text">BÚSQ. POR PROVEEDOR Y CATEGORÍAS</div>
                            <div class="mb-3">
                                <?php
                                $proveedor = mysqli_query($conexion_bd, "SELECT id, nombre 
                                FROM proveedores");
                                ?>
                                <select class="form-select" name="proveedor">
                                    <option>Seleccione un proveedor</option>
                                    <?php
                                    while ($listar_proveedor = mysqli_fetch_array($proveedor)) {
                                        $id_prov = $listar_proveedor['id'];
                                        $nombre = $listar_proveedor['nombre']; ?>
                                        <option value="<?php
                                                        echo $id_prov
                                                        ?>"><?php
                                                            echo $nombre
                                                            ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <?php
                                $categoria = mysqli_query($conexion_bd, "SELECT id_categoria , nombre 
                                FROM categorias");
                                ?>
                                <select class="form-select" name="categoria">
                                    <option>Seleccione una categoría</option>
                                    <?php
                                    while ($listar_datos = mysqli_fetch_array($categoria)) {
                                        $id_cat = $listar_datos['id_categoria'];
                                        $nombre = $listar_datos['nombre']; ?>
                                        <option value="<?php
                                                        echo $id_cat
                                                        ?>"><?php
                                                            echo $nombre
                                                            ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <?php
                                $sub_categoria = mysqli_query($conexion_bd, "SELECT id, nombre 
                                FROM sub_categorias");
                                ?>
                                <select class="form-select" name="sub_categoria">
                                    <option>Seleccione una sub categoría</option>
                                    <?php
                                    while ($listar_datos = mysqli_fetch_array($sub_categoria)) {
                                        $id = $listar_datos['id'];
                                        $nombre = $listar_datos['nombre']; ?>
                                        <option value="<?php
                                                        echo $id
                                                        ?>"><?php
                                                            echo $nombre
                                                            ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary form-control p-2">BUSCAR</button>
                        </form>
                    </div>
                    <div class="col-lg-6 my-3 pe-4 border py-3">
                        <h6 class="text-center" style="color: white;">APLICAR CAMBIOS DE PRECIOS</h6>
                        <form action="variacion_precios.php" method="POST">
                            <div class="my-2">
                                <input class="form-control me-3 mb-2" type="number" name="incremento" step="0.01">
                                <button type="submit" class="btn btn-warning form-control p-2">INCREMENTO (%)</button>
                            </div>
                        </form>
                        <form action="variacion_precios.php" method="POST" class="mt-3">
                            <div class="my-2">
                                <input class="form-control me-3 mb-2" type="number" name="decremento" step="0.01">
                                <button type="submit" class="btn btn-danger form-control p-2">DECREMENTO (%)</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ps-4 pt-2">
                <div class="row">
                    <div class="col-lg-12 border">
                        <div class="table-wrapper-cp">
                            <table class="table table-striped">
                                <thead class="white">
                                    <tr>
                                        <th scope="col">CODIDO</th>
                                        <th scope="col">PRODUCTO</th>
                                        <th scope="col">NETO</th>
                                        <th scope="col">IVA</th>
                                        <th scope="col">FINAL</th>
                                        <th scope="col">ELIMINAR</th>
                                    </tr>
                                </thead>
                                <?php
                              
                                    $consulta = mysqli_query($conexion_bd, "SELECT id, producto, neto_mostrador, iva, precio_final
                         FROM productos WHERE producto LIKE '%" . $termino  . "%' LIMIT 2000");
                                    if ($consulta) {
                                        while ($listar_datos = mysqli_fetch_array($consulta)) {
                                            $cod_interno = $listar_datos['id'];
                                            $producto = $listar_datos['producto'];
                                            $neto_mostrador = $listar_datos['neto_mostrador'];
                                            $iva = $listar_datos['iva'];
                                            $precio_final = $listar_datos['precio_final'];

                                            mysqli_query($conexion_bd, "INSERT INTO update_precios VALUES('$cod_interno',
                                '$producto', '$neto_mostrador', '$iva', '$precio_final')");
                                        }
                                    }
                                    ?>
                                   
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 border mt-4 p-2">
                        <div style="color: white;" class="form-text">Cotización moneda por proveedor</div>
                        <form class="row g-3">
                            <div class="col-auto">
                                <?php
                                $proveedor = mysqli_query($conexion_bd, "SELECT id, nombre 
                                FROM proveedores");
                                ?>
                                <select class="form-select" name="">
                                    <option>Seleccione un proveedor</option>
                                    <?php
                                    while ($listar_proveedor = mysqli_fetch_array($proveedor)) {
                                        $id_prov = $listar_proveedor['id'];
                                        $nombre = $listar_proveedor['nombre']; ?>
                                        <option value="<?php
                                                        echo $id_prov
                                                        ?>"><?php
                                                            echo $nombre
                                                            ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                           
                            <div class="col-auto">
                                <input type="number" class="form-control w-75" step=".01" name="" placeholder="Cotización" required>
                            </div>
                            <div class="col-auto">
                                <select class="form-select" name="">
                                    <option value="u$s">u$s</option>
                                    <option value="€">€</option>
                                </select>                               
                            </div>
                            <div class="col-auto">                                
                                <button type="submit" class="btn btn-primary mb-3 p-2">Cambiar cotización</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</body>

</html>