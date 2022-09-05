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
                    <div class="row bg-secondary">
                        <div class="col-md-10 pt-4">
                            <h5 style="color: white;">BUSCAR PRODUCTOS</h5>
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
                        <div class="col-md-2">
                            <form action="index.php">
                                <button class="btn"> <i class="fas fa-window-close"></i></button>
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
                            <form action="recepcion_precarga.php" method="POST" class="row g-3">
                                <?php
                                $update_prod = mysqli_query($conexion_bd, "SELECT * FROM recepcion_pre");
                                while ($listar_prod = mysqli_fetch_array($update_prod)) {
                                    $id = $listar_prod['id'];
                                    $cod_prov = $listar_prod['cod_prov'];
                                    $producto = $listar_prod['producto'];
                                    $costo = $listar_prod['costo'];
                                    $iva = $listar_prod['iva'];
                                    $descto = $listar_prod['descto'];
                                    $descto2 = $listar_prod['descto2'];
                                    $descto3 = $listar_prod['descto3'];
                                    $utilidad = $listar_prod['utilidad'];
                                    $cantidad = $listar_prod['cantidad'];
                                }
                                ?>

                                <div class="col-md-5">
                                    <label for="nombre_prod">NOMBRE PRODUCTO</label>
                                    <input type="text" class="form-control" name="nombre_prod" value="<?php echo $producto ?>" style="text-transform:uppercase;">
                                </div>
                                <div class="col-md-2">
                                    <label for="cod_int">CÓD. INTERNO</label>
                                    <input type="text" class="form-control" name="cod_int" value="<?php echo $id ?>" style="text-transform:uppercase;">
                                </div>
                                <div class="col-md-3">
                                    <label for="cod_prov">CÓDIGO PROVEEDOR</label>
                                    <input type="text" class="form-control" name="cod_prov" value="<?php echo $cod_prov ?>" style="text-transform:uppercase;">
                                </div>
                                <div class="col-md-2">
                                    <label for="cantidad">CANTIDAD</label>
                                    <input type="number" step=".001" name="cantidad" class="form-control" value="<?php echo $cantidad ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="costo">COSTO</label>
                                    <input type="number" step=".01" name="costo" class="form-control" value="<?php echo $costo ?>" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="bonificacion_1">BONIF. 1</label>
                                    <input type="number" step=".001" name="bonificacion_1" class="form-control" value="<?php echo $descto ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="bonificacion_2">BONIF. 2</label>
                                    <input type="number" step=".001" name="bonificacion_2" class="form-control" value="<?php echo $descto2 ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="bonificacion_3">BONIF. 3</label>
                                    <input type="number" step=".001" name="bonificacion_3" class="form-control" value="<?php echo $descto3 ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="utilidad">UTILIDAD</label>
                                    <input type="text" class="form-control" name="utilidad" value="<?php echo $utilidad ?>" style="text-transform:uppercase;">
                                </div>
                                <div class="col-md-2">
                                    <label for="iva">IVA</label>
                                    <select class="form-select" name="iva">
                                        <option value="<?php echo $iva ?>"><?php echo $iva ?></option>
                                        <option value="10.5">10.5</option>
                                        <option value="21">21.00</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" style="padding: 5px;" class=" form-control btn btn-success">AGREGAR</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="recepcion_modifica.php?borra='borra'" style="padding: 5px;" type="submit" class="form-control btn btn-danger">CANCELAR</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row bg-secondary my-2">
                        <div class="col-lg-12 py-2">
                            <div class="table-wrapper-recepcion size_table">
                                <table class="table table-striped">
                                    <thead class="white">
                                        <tr>
                                            <th scope="col">CODIDO</th>
                                            <th scope="col">PRODUCTO</th>
                                            <th scope="col">COSTO</th>
                                            <th scope="col">BONIF</th>
                                            <th scope="col">BONIF</th>
                                            <th scope="col">BONIF</th>
                                            <th scope="col">UTIL.</th>
                                            <th scope="col">IVA</th>
                                            <th scope="col">CANT.</th>
                                            <th scope="col">ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    $consulta = mysqli_query($conexion_bd, "SELECT id, cod_prov, producto, costo, iva, descto, 
                                descto2, descto3, utilidad, cantidad  FROM recepcion");
                                    if ($consulta) {
                                        while ($listar_datos = mysqli_fetch_array($consulta)) {
                                            $cod_interno = $listar_datos['id'];
                                            $producto = $listar_datos['producto'];
                                            $costo = $listar_datos['costo'];
                                            $iva = $listar_datos['iva'];
                                            $descto = $listar_datos['descto'];
                                            $descto2 = $listar_datos['descto2'];
                                            $descto3 = $listar_datos['descto3'];
                                            $utilidad = $listar_datos['utilidad'];
                                            $cantidad = $listar_datos['cantidad']; ?>
                                            <tbody id="content" class="white">
                                                <tr>
                                                    <td><?php echo $cod_interno; ?></td>
                                                    <td><?php echo $producto; ?></td>
                                                    <td><?php echo $costo; ?></td>
                                                    <td><?php echo $descto; ?></td>
                                                    <td><?php echo $descto2; ?></td>
                                                    <td><?php echo $descto3; ?></td>
                                                    <td><?php echo $utilidad; ?></td>
                                                    <td><?php echo $iva; ?></td>
                                                    <td><?php echo $cantidad; ?></td>
                                                    <td><a href="elimina_prod_recepcion.php?id=<?php echo $cod_interno ?>" style="color:white;" class="btn btn-danger">X</a></td>
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
                            <form action="recepcion_guarda.php" method="POST" class="d-flex">
                                <div class="col-md-4" style="padding: 5px;">
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
                                <div class="col-md-4 py-2 px-2">
                                    <button type="submit" style="padding: 5px;" class=" form-control btn btn-primary">RECEPCIONAR</button>
                                </div>
                                <div class="col-md-4 py-2">
                                    <a href="recepcion_modifica.php?borra='borra'" style="padding: 5px;" type="submit" class="form-control btn btn-danger">CANCELAR</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        getData()
        document.getElementById("campo").addEventListener("keyup", getData)

        function getData() {
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "search_nombre_recepcion.php";

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
    <script>
        foco();

        function foco() {

            document.getElementById("campo").focus();
        }
    </script>
    <script>
        getDataCodInt()
        document.getElementById("cod_int").addEventListener("keyup", getDataCodInt)

        function getDataCodInt() {
            let input = document.getElementById("cod_int").value
            let content = document.getElementById("content")
            let url = "search_cod_int_recepcion.php";

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
            let url = "search_cod_prov_recepcion.php";

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>