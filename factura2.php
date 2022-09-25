<?php
session_start();

//unset($_SESSION['no_existe']);

$id_cli = $_GET['id'];
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
    include("nav.php");
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 bg-danger p-2">
                <div class="row d-flex justify-content-around">
                    <div class="col-md-4 d-flex align-items-center justify-content-center" style="margin-top: 15px;">
                        <button class="btn btn-light radio" id="foco" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-search mx-2"></i>CLIENTES
                        </button>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center" style="margin-top: 15px;">
                        <form action="factura.php" method="GET" class=" d-flex">
                            <div class="d-flex">
                                <div class="col-auto me-2">
                                    <input type="number" class="form-control" name="id" placeholder="N° Cliente" required>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <form action="index.php">
                            <button class="btn"> <i class="fas fa-window-close"></i></button>
                        </form>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="container bg-secondary" style="border-radius: 5px;">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-12 py-4">
                                            <form action="" method="POST">
                                                <label style="color: white;" for="update_cliente">BUSCADOR CLIENTE</label>
                                                <input class="form-control" type="text" name="update_cliente" id="update_cliente">
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-md-12 bg-light">
                                        <div class="table-wrapper-factura">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">CLIENTE</th>
                                                        <th scope="col">DIRECCIÓN </th>
                                                        <th scope="col">ENVIAR </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="content">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container border">
                    <div class="row">
                        <?php
                        if ($id_cli) {
                            include('conexion.php');
                            $datos_cli = mysqli_query($conexion_bd, "SELECT id, nombre, direccion, whatsapp FROM clientes
                where id = $id_cli");
                            while ($listar_cli = mysqli_fetch_array($datos_cli)) {
                                $id = $listar_cli['id'];
                                $nombre = $listar_cli['nombre'];
                                $direccion = $listar_cli['direccion'];
                                $whatsapp = $listar_cli['whatsapp'];
                            }
                            if (!$id) {
                                $_SESSION['no_existe'] = "El Cliente no Existe!!";
                            }
                        }

                        ?>
                        <form action="" method="POST" class="row g-3">
                            <div id="emailHelp" class="form-text" style="color: white;">Información del cliente</div>
                            <div class="col-auto">
                                <input type="text" value="<?php echo $nombre ?>" class="form-control" name="cliente" placeholder="Cliente" disabled>
                            </div>
                            <div class="col-auto">
                                <input type="text" value="<?php echo $direccion ?>" class="form-control" name="direccion" placeholder="Dirección" disabled>
                            </div>
                            <div class="col-auto">
                                <input type="text" value="<?php echo $whatsapp ?>" class="form-control" name="telefono" placeholder="Teléfono" disabled>
                            </div>
                            <div class="col-auto">
                                <div class="form-check" style="margin-top: 7px;">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Contado
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-check" style="margin-top: 7px;">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cta. Cte.
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        getData()
        document.getElementById("update_cliente").addEventListener("keyup", getData)

        function getData() {
            let input = document.getElementById("update_cliente").value
            let content = document.getElementById("content")
            let url = "seleccionar_cliente.php";

            let formaData = new FormData;
            formaData.append('update_cliente', input);
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
            document.getElementById("focoComprobantes").blur();
            document.getElementById("foco").focus();
        }
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if (isset($_SESSION['no_existe'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['no_existe']; ?>',
                text: " Corrobórelo y vuelva a intentarlo. ",
                icon: "error",
                button: "Vuelva a intentarlo!!",
            });
        </script>
    <?php
        unset($_SESSION['no_existe']);
    }
    ?>
</body>

</html>