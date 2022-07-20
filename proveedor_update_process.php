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
            <div class="col-lg-12 contenedor_gral bg-light">
                <div class="row">
                    <div class="col-md-11 py-4">
                        <h5>MODIFICAR INFORMACION DEL PROVEEDOR</h5>
                    </div>
                    <div class="col-md-1">
                        <form action="index.php">
                            <button class="btn"> <i class="fas fa-window-close"></i></button>
                        </form>
                    </div>
                </div>

                <form action="guarda_proveedor_update.php" method="POST" class="row g-3">
                    <?php
                    $update_cliente = mysqli_query($conexion_bd, "SELECT * FROM proveedores WHERE id = '$id'");
                    while ($listar_datos = mysqli_fetch_array($update_cliente)) {


                    ?>
                        <input type="hidden" name="id" value="<?php echo $listar_datos['id']; ?>">
                        <div class="col-md-6">
                            <label for="nombre">Nombre o Razón Social</label>
                            <input type="text" class="form-control" id="inputCity" name="nombre" value="<?php echo $listar_datos['nombre']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="contacto">Nombre Contacto</label>
                            <input type="text" class="form-control" id="inputAddress" name="contacto" value="<?php echo $listar_datos['nombre_contacto']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="cuit">Cuit o dni (Solamente números)</label>
                            <input type="number" class="form-control" id="inputCity" name="cuit" value="<?php echo $listar_datos['cuit']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="cond_fiscal">Condición Fiscal </label>
                            <select id="inputState" class="form-select" name="cond_fiscal">
                                <option value="<?php echo $listar_datos['cond_fiscal']; ?>"><?php echo $listar_datos['cond_fiscal']; ?></option>
                                <option>Consumidor final</option>
                                <option>Responsable inscripto</option>
                                <option>Monotributo</option>
                                <option>Otro...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="cond_venta">Condición Venta </label>
                            <select id="inputState" class="form-select" name="cond_venta">
                                <option value="<?php echo $listar_datos['condicion_venta']; ?>"><?php echo $listar_datos['condicion_venta']; ?></option>
                                <option>Contado</option>
                                <option>Cta. Cte.</option>
                                <option>Canje</option>
                                <option>Otra...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="inputAddress" name="direccion" value="<?php echo $listar_datos['direccion']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="localidad">Localidad</label>
                            <input type="text" class="form-control" id="inputAddress" name="localidad" value="<?php echo $listar_datos['localidad']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="provincia">Provincia</label>
                            <input type="text" class="form-control" id="inputAddress" name="provincia" value="<?php echo $listar_datos['provincia']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $listar_datos['email']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="telefono">Tel. Fijo</label>
                            <input type="text" class="form-control" id="inputAddress" name="telefono" value="<?php echo $listar_datos['tel_fijo']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="movil">Tel. Móvil</label>
                            <input type="text" class="form-control" id="inputAddress" name="movil" value="<?php echo $listar_datos['whatsapp']; ?>">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class=" form-control btn btn-success">GUARDAR CAMBIOS</button>
                        </div>
                        <div class="col-md-6">
                            <a href="proveedores_modifica.php" type="submit" class="form-control btn btn-danger">CANCELAR</a>
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