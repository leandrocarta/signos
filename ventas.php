<?php
session_start();
if (!isset ($_SESSION['gral'])) {  
    header("Location: login.php");
   } 
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
</head>

<body>
    <?php
    include('nav.php');
    include('conexion.php');
    ?>
    <header>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-4 pe-3">
                    <div class="row mb-2">
                        <div class="col-lg-12 bg-success">
                            <form action="venta_cliente_prov.php" method="POST" class="d-flex">
                                <div class="col-md-8" style="padding: 5px;">
                                    <?php
                                    $proveedor = mysqli_query($conexion_bd, "SELECT id, nombre 
                                        FROM clientes order by nombre");
                                    ?>
                                    <select class="form-select" name="id_cli" id="prove">
                                        <option>Seleccione un Cliente</option>
                                        <?php
                                        while ($listar_proveedor = mysqli_fetch_array($proveedor)) {
                                            $id_cli = $listar_proveedor['id'];
                                            $nombre = $listar_proveedor['nombre']; ?>
                                            <option value="<?php
                                                            echo $id_cli
                                                            ?>"><?php
                                                                echo $nombre
                                                                ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 py-2 px-2">
                                    <button type="submit" style="padding: 5px;" class=" form-control btn btn-primary">AGREGAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row bg-success">
                        <div class="col-md-12 pt-4">
                            <form method="POST">
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="campo" id="campo" style="text-transform:uppercase;" placeholder="NOMBRE PRODUCTO">
                                </div>
                                <div class="d-flex">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="cod_int" id="cod_int" style="text-transform:uppercase;" placeholder="CÓDIGO INTERNO">
                                    </div>
                                    <div class="mb-3 ms-2">
                                        <input type="text" class="form-control" name="cod_prov" id="cod_prov" style="text-transform:uppercase;" placeholder="CÓDIGO PROV">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 bg-light">
                            <div class="table-wrapper-recpcion size_table">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">COD</th>
                                            <th scope="col">COD</th>
                                            <th scope="col">PRODUCTO</th>
                                            <th scope="col">ENVIAR</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 ps-3">
                    <div class="row bg-secondary">
                        <div class="col-lg-12 py-2">
                            <form action="ventas_precarga.php" method="POST" class="row g-3">
                                <?php
                                $update_prod = mysqli_query($conexion_bd, "SELECT * FROM ventas_pre");
                                while ($listar_prod = mysqli_fetch_array($update_prod)) {
                                    $id = $listar_prod['id'];
                                    $cod_prov = $listar_prod['cod_prov'];
                                    $producto = $listar_prod['producto'];
                                    $neto_mostrador = $listar_prod['neto_mostrador'];
                                    $iva = $listar_prod['iva'];
                                    $precio_final = $listar_prod['precio_final'];
                                    $cantidad = $listar_prod['cantidad'];
                                }

                                ?>

                                <div class="col-md-4">
                                    <label for="nombre_prod">NOMBRE PRODUCTO</label>
                                    <input type="text" class="form-control" value="<?php echo $producto ?>" style="text-transform:uppercase;">
                                    <input type="hidden" class="form-control" name="nombre_prod" value="<?php echo $producto ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="cod_int">CÓD. INTERNO</label>
                                    <input type="text" class="form-control" value="<?php echo $id ?>" style="text-transform:uppercase;" disabled>
                                    <input type="hidden" class="form-control" name="cod_int" value="<?php echo $id ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="cantidad">PRECIO</label>
                                    <input type="number" step=".001" name="precio" class="form-control" value="<?php echo $precio_final ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="cantidad">CANTIDAD</label>
                                    <input id="foco_fact" type="number" step=".001" name="cantidad" class="form-control" value="1" >
                                </div>
                                <?php
                                if ($id) { ?>
                                    <script>
                                        foco();

                                        function foco() {
                                            document.getElementById("foco_fact").focus();
                                        }
                                    </script>
                                <?php  }
                                ?>

                                <div class="col-md-2">
                                    <label for="cod_prov">DESCTO</label>
                                    <input type="number" name="descto_prod" value="0.00" class="form-control" style="text-transform:uppercase;">

                                </div>

                                <div class="col-md-6">
                                    <button type="submit" style="padding: 5px;" class=" form-control btn btn-primary">AGREGAR</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="ventas_modifica.php?borra='borra'" style="padding: 5px;" type="submit" class="form-control btn btn-danger">CANCELAR</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row bg-secondary mt-2">
                        <div class="col-lg-12 py-2">
                            <div class="table-wrapper-recepcion size_table">
                                <table class="table table-striped">
                                    <thead class="white">
                                        <tr>
                                            <th scope="col">CODIDO</th>
                                            <th scope="col">PRODUCTO</th>
                                            <th scope="col">P.NETO</th>
                                            <th scope="col">DESCTO.</th>
                                            <th scope="col">IVA</th>
                                            <th scope="col">P.FINAL</th>
                                            <th scope="col">CANTIDAD</th>
                                            <th scope="col">ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if($_SESSION['puesto1']){                                        
                                        $consulta = mysqli_query($conexion_bd, "SELECT id, cod, producto, neto_mostrador, descto, iva,
                                        precio_final, cantidad, total FROM puesto1");
                                        $tabla = 'puesto1';
                                    } else  if($_SESSION['puesto2']){                                        
                                        $consulta = mysqli_query($conexion_bd, "SELECT id, cod, producto, neto_mostrador, descto, iva,
                                        precio_final, cantidad, total FROM puesto2");
                                         $tabla = 'puesto2';
                                    } else  if($_SESSION['puesto3']){                                        
                                        $consulta = mysqli_query($conexion_bd, "SELECT id, cod, producto, neto_mostrador, descto, iva,
                                        precio_final, cantidad, total FROM puesto3");
                                         $tabla = 'puesto3';
                                    } else  if($_SESSION['puesto4']){                                        
                                        $consulta = mysqli_query($conexion_bd, "SELECT id, cod, producto, neto_mostrador, descto, iva,
                                        precio_final, cantidad, total FROM puesto4");
                                         $tabla = 'puesto4';
                                    } else  if($_SESSION['puesto5']){                                        
                                        $consulta = mysqli_query($conexion_bd, "SELECT id, cod, producto, neto_mostrador, descto, iva,
                                        precio_final, cantidad, total FROM puesto5");
                                         $tabla = 'puesto5';
                                    } else  if($_SESSION['puesto6']){                                        
                                        $consulta = mysqli_query($conexion_bd, "SELECT id, cod, producto, neto_mostrador, descto, iva,
                                        precio_final, cantidad, total FROM puesto6");
                                         $tabla = 'puesto6';
                                    } else  if($_SESSION['puesto7']){                                        
                                        $consulta = mysqli_query($conexion_bd, "SELECT id, cod, producto, neto_mostrador, descto, iva,
                                        precio_final, cantidad, total FROM puesto7");
                                         $tabla = 'puesto7';
                                    }

                                   
                                    if ($consulta) {
                                        while ($listar_datos = mysqli_fetch_array($consulta)) {
                                            $cod_interno = $listar_datos['id'];
                                            $cod = $listar_datos['cod'];
                                            $producto = $listar_datos['producto'];
                                            $neto_mostrador = $listar_datos['neto_mostrador'];
                                            $descto = $listar_datos['descto'];
                                            $iva = $listar_datos['iva'];
                                            $precio_final = $listar_datos['precio_final'];
                                            $cantidad = $listar_datos['cantidad'];
                                            $total = $listar_datos['total']; ?>
                                            <tbody id="content" class="white">
                                                <tr>
                                                    <td><?php echo $cod; ?></td>
                                                    <td><?php echo $producto; ?></td>
                                                    <td><?php echo $neto_mostrador; ?></td>
                                                    <td><?php echo $descto; ?></td>
                                                    <td><?php echo $iva; ?></td>
                                                    <td><?php echo $precio_final; ?></td>
                                                    <td><?php echo $cantidad; ?></td>
                                                    <td><?php echo $total; ?></td>
                                                    <td><a href="elimina_prod_venta.php?id=<?php echo $cod_interno?> && bd=<?php echo $tabla ?>" style="color:white;" class="btn btn-danger">X</a></td>
                                                </tr>
                                            </tbody>
                                    <?php
                                        }
                                    }
                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 bg-secondary">
                            <form action="ventas_guarda.php" method="POST" class="d-flex">
                                <div class="col-md-4" style="padding: 5px;">
                                    <input type="hidden" name="uno" value="1">
                                    <?php
                                    $cliente_venta = mysqli_query($conexion_bd, "SELECT id, id_cli, nombre 
                                    FROM clientes_ventas");

                                    ?>
                                    <?php
                                    while ($listar_proveedor = mysqli_fetch_array($cliente_venta)) {
                                        $id_venta = $listar_proveedor['id'];
                                        $id_cli = $listar_proveedor['id_cli'];
                                        $name = $listar_proveedor['nombre']; ?>
                                    <?php
                                    }
                                    if ($cliente_venta) { ?>
                                        <input name="id_venta" type="hidden" value="<?php echo $id ?>">
                                        <input name="nombre_cli" type="hidden" value="<?php echo $name ?>">
                                        <input name="id_cli" type="hidden" value="<?php echo $id_cli ?>">
                                        <input name="tabla" type="hidden" value="<?php echo $tabla ?>">
                                        <input class="form-control" type="text" value="<?php echo $name ?>" disabled>
                                    <?php } ?>
                                </div>
                                <div class="col-md-4 py-2 px-2">
                                    <button type="submit" style="padding: 5px;" class=" form-control btn btn-primary">GUARDAR FACTURA</button>
                                </div>
                                <div class="col-md-4 py-2">
                                    <a href="ventas_modifica.php?borra2='borra'" style="padding: 5px;" type="submit" class="form-control btn btn-danger">CANCELAR</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <script>
        getData()
        document.getElementById("campo").addEventListener("keyup", getData)

        function getData() {
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "productos_venta_nombre.php";

            let formaData = new FormData;
            formaData.append('campo', input);
            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>

    <?php
    if (!$id) { ?>
        <script>
            foco();

            function foco() {
                document.getElementById("prove").focus();
            }
        </script>
    <?php  }
    ?>
    </script>
    <script>
        getDataCodInt()
        document.getElementById("cod_int").addEventListener("keyup", getDataCodInt)

        function getDataCodInt() {
            let input = document.getElementById("cod_int").value
            let content = document.getElementById("content")
            let url = "productos_venta_codint.php";

            let formaData = new FormData;
            formaData.append('cod_int', input);
            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>
    <script>
        getDataCodProv()
        document.getElementById("cod_prov").addEventListener("keyup", getDataCodProv)

        function getDataCodProv() {
            let input = document.getElementById("cod_prov").value
            let content = document.getElementById("content")
            let url = "productos_venta_codprov.php";

            let formaData = new FormData;
            formaData.append('cod_prov', input);
            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if (isset($_SESSION['correcto'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['correcto']; ?>',
                text: "La recepción fue exitosa, ya se han actualizado los registros.!!!",
                icon: "success",
                button: "Continue aquí!!",
            });
        </script>
    <?php
        unset($_SESSION['correcto']);
    }
    ?>

    <?php
    if (isset($_SESSION['prove'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['prove']; ?>',
                text: "Seleccione un proveedor para poder realizar la recepción!!!",
                icon: "error",
                button: "Continue aquí!!",
            });
        </script>
    <?php
        unset($_SESSION['prove']);
    }
    ?>
    <?php
    if (isset($_SESSION['cargar'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['cargar']; ?>',
                text: "No ha ingresado ningún producto!!!",
                icon: "error",
                button: "Continue aquí!!",
            });
        </script>
    <?php
        unset($_SESSION['cargar']);
    }
    ?>
    <?php
    if (isset($_SESSION['cantidad'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['cantidad']; ?>',
                text: "No ha ingresado la cantidad a Facturar!!!",
                icon: "error",
                button: "Continue aquí!!",
            });
        </script>
    <?php
        unset($_SESSION['cantidad']);
    }
    ?>
    <?php
    if ($id) { ?>
        <script>
            foco();

            function foco() {
                document.getElementById("foco_fact").focus();
            }
        </script>
    <?php  }
    ?>
    <?php
    if (isset($_SESSION['cli'])) { ?>  
        <script>
            swal({
                title: '<?php echo $_SESSION['cli']; ?>',
                text: "Seleccione un Cliente para poder realizar la Venta!!!",
                icon: "error",
                button: "Continue aquí!!",
            });
        </script>
    <?php
        unset($_SESSION['cli']);
    }
    ?>

</body>

</html>