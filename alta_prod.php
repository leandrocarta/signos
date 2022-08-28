<?php
include('conexion.php');
session_start();
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
    include("nav.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 contenedor_gral bg-secondary">
                <div class="row">
                    <div class="col-md-11 py-4">
                        <h5 style="color: white;">ALTA PRODUCTO NUEVO</h5>
                    </div>
                    <div class="col-md-1">
                        <form action="index.php">
                            <button class="btn"> <i class="fas fa-window-close"></i></button>
                        </form>
                    </div>
                </div>
                <form action="alta_prod_guarda.php" method="POST" class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="text-transform:uppercase;" name="nombre" placeholder="NOMBRE PRODUCTO" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="text-transform:uppercase;" name="cod_prov" placeholder="Código proveedor">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="prov">
                            <option value="0">Asociar proveedor</option>
                            <?php
                            $proveedor = mysqli_query($conexion_bd, "SELECT id, nombre FROM proveedores ORDER BY nombre");
                            while ($listarProv = mysqli_fetch_array($proveedor)) {
                                $id_prov = $listarProv['id'];
                                $nombre_prov = $listarProv['nombre'];
                            ?>
                                <option value="<?php echo $id_prov ?>"><?php echo $nombre_prov ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="cat">
                            <option value="0">Asociar categoría</option>
                            <?php
                            $categoria = mysqli_query($conexion_bd, "SELECT id_categoria , nombre FROM categorias ORDER BY nombre");
                            while ($listarCat = mysqli_fetch_array($categoria)) {
                                $id_cat = $listarCat['id_categoria'];
                                $nombre_cat = $listarCat['nombre'];
                            ?>
                                <option value="<?php echo $id_cat ?>"><?php echo $nombre_cat ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="subcat">
                            <option value="0">Asociar sub categoría</option>
                            <?php
                            $categoria = mysqli_query($conexion_bd, "SELECT id, nombre FROM sub_categorias ORDER BY nombre");
                            while ($listarCat = mysqli_fetch_array($categoria)) {
                                $id_subcat = $listarCat['id'];
                                $nombre_subcat = $listarCat['nombre'];
                            ?>
                                <option value="<?php echo $id_subcat ?>"><?php echo $nombre_subcat ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="moneda">
                            <option value="peso">$</option>
                            <option value="dolar">u$s</option>
                            <option value="euro">€</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" step=".01" name="precio" placeholder="Precio Venta" required>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="iva">
                            <option value="21">21.00</option>
                            <option value="10.5">10.5</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" style="padding: 5px;" class="form-control btn btn-success">GUARDAR</button>
                    </div>
                    <div class="col-md-6">
                        <a href="" type="submit" style="padding: 5px;" class="form-control btn btn-danger">CANCELAR - LIMPIAR</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    if (isset($_SESSION['prod_carg'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['prod_carg']; ?>',
                text: "El producto se registró correctamente!!!",
                icon: "success",
                button: "Continue aquí!!",
            });
        </script>
    <?php
        unset($_SESSION['prod_carg']);
    }
    ?>
    <?php
    if (isset($_SESSION['error'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['error']; ?>',
                text: "El producto no se ha registrado!!!",
                icon: "error",
                button: "Continue aquí!!",
            });
        </script>
    <?php
        unset($_SESSION['error']);
    }
    ?>
</body>

</html>