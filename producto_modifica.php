<?php
session_start();
/*if ((!$_SESSION['administrador']) || (!$_SESSION['mostrador'])) {
    header("Location: login.php");
}*/

?>

<!doctype html>
<html lang="es">

<head>
    <title>Ferretería Signos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5cd6077bf2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sass/estilos.css">
    <script src="js/js.js"></script>
</head>

<body>
    <?php
    include("conexion.php");
    include("nav.php");
    $id = $_GET['id'];

    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 contenedor_gral bg-secondary">
                <div class="row">
                    <div class="col-md-11 py-4">
                        <h5 style="color: white;">MODIFICAR PRODUCTOS</h5>
                    </div>
                    <div class="col-md-1">
                        <form action="index.php">
                            <button class="btn"> <i class="fas fa-window-close"></i></button>
                        </form>
                    </div>
                </div>

                <form action="guarda_prod_update.php" method="POST" class="row g-3">
                    <?php
                    $update_prod = mysqli_query($conexion_bd, "SELECT * FROM productos WHERE id = '$id'");
                    while ($listar_prod = mysqli_fetch_array($update_prod)) {
                        $id_proveedor = $listar_prod['id_proveedor'];
                        $id_cat = $listar_prod['id_cat'];
                        $id_subCat = $listar_prod['id_subCat'];

                    ?>
                        <input type="hidden" name="id" value="<?php echo $listar_prod['id']; ?>">
                        <div class="col-md-6">
                            <label for="nombre_prod">PRODUCTO</label>
                            <input type="text" class="form-control" name="nombre_prod" value="<?php echo $listar_prod['producto']; ?>" style="text-transform:uppercase;" placeholder="NOMBRE PRODUCTO" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cod_prov">COD.PROVEEDOR</label>
                            <input type="text" class="form-control" name="cod_prov" value="<?php echo $listar_prod['cod_proveedor']; ?>" style="text-transform:uppercase;" placeholder="Código proveedor">
                        </div>
                        <div class="col-md-4">
                            <label for="nombre_prov">NOMBRE PROVEEDOR</label>
                            <select class="form-select" name="nombre_prov">
                                <?php
                                $proveedor = mysqli_query($conexion_bd, "SELECT id, nombre FROM proveedores WHERE id = '$id_proveedor'");
                                while ($listarProv = mysqli_fetch_array($proveedor)) {
                                    $id_prov = $listarProv['id'];
                                    $nombre_prov = $listarProv['nombre'];
                                ?>
                                    <option value="<?php echo $id_prov ?>"><?php echo $nombre_prov ?></option>
                                <?php
                                }
                                $proveedor2 = mysqli_query($conexion_bd, "SELECT id, nombre FROM proveedores");
                                while ($listarCat = mysqli_fetch_array($proveedor2)) {
                                    $id_prov2 = $listarCat['id'];
                                    $nombre_prov2 = $listarCat['nombre'];
                                ?>
                                    <option value="<?php echo $id_prov2 ?>"><?php echo $nombre_prov2 ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="cat">NOMBRE CATEGORIA</label>
                            <select class="form-select" name="cat">
                                <?php
                                $categoria = mysqli_query($conexion_bd, "SELECT id_categoria, nombre FROM categorias WHERE id_categoria = '$id_cat'");
                                while ($listarCat = mysqli_fetch_array($categoria)) {
                                    $id_cate = $listarCat['id_categoria'];
                                    $nombre_cat = $listarCat['nombre'];
                                ?>
                                    <option value="<?php echo $id_cate ?>"><?php echo $nombre_cat ?></option>
                                <?php
                                }
                                $categoria2 = mysqli_query($conexion_bd, "SELECT id_categoria, nombre FROM categorias");
                                while ($listarCat = mysqli_fetch_array($categoria2)) {
                                    $id_cate2 = $listarCat['id_categoria'];
                                    $nombre_cat2 = $listarCat['nombre'];
                                ?>
                                    <option value="<?php echo $id_cate2 ?>"><?php echo $nombre_cat2 ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subcat">NOMBRE SUB CATEGORIA</label>
                            <select class="form-select" name="subcat">
                                <?php
                                $subcategoria = mysqli_query($conexion_bd, "SELECT id, nombre FROM sub_categorias WHERE id = '$id_subCat'");
                                while ($listarCat = mysqli_fetch_array($subcategoria)) {
                                    $id_subcate = $listarCat['id'];
                                    $nombre_subcat = $listarCat['nombre'];
                                ?>
                                    <option value="<?php echo $id_subcate ?>"><?php echo $nombre_subcat ?></option>
                                <?php
                                }
                                $subcategoria2 = mysqli_query($conexion_bd, "SELECT id, nombre FROM sub_categorias");
                                while ($listarCat = mysqli_fetch_array($subcategoria2)) {
                                    $id_subcate2 = $listarCat['id'];
                                    $nombre_subcat2 = $listarCat['nombre'];
                                ?>
                                    <option value="<?php echo $id_subcate2 ?>"><?php echo $nombre_subcat2 ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="moneda">MONEDA</label>
                            <select class="form-select" name="moneda">
                                <option value="<?php echo $listar_prod['moneda']; ?>"><?php echo $listar_prod['moneda']; ?></option>
                                <option value="u$s">u$s</option>
                                <option value="€">€</option>
                                <option value="$">$</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="precio">PRECIO NETO</label>
                            <input type="number" step=".001" name="precio" class="form-control" value="<?php echo $listar_prod['neto_mostrador']; ?>" s placeholder="Precio Neto" required>                             
                        </div>
                        <div class="col-md-4">
                            <label for="iva">IVA</label>
                            <select class="form-select" name="iva">
                                <option value="<?php echo $listar_prod['iva']; ?>"><?php echo $listar_prod['iva']; ?></option>
                                <option value="10.5">10.5</option>
                                <option value="21">21.00</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <button type="submit" style="padding: 5px;" class=" form-control btn btn-success">GUARDAR CAMBIOS</button>
                        </div>
                        <div class="col-md-6">
                            <a href="producto_baja.php" style="padding: 5px;" type="submit" class="form-control btn btn-danger">CANCELAR</a>
                        </div>
                    <?php
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    if (isset($_SESSION['cliente_reg'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['cliente_reg']; ?>',
                text: "El registro se creo correctamente.",
                icon: "success",
                button: "Continue aquí!!",

            });
        </script>

    <?php
        unset($_SESSION['cliente_reg']);
    }

    ?>

</body>

</html>