<?php
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
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="container bg-secondary">
        <div class="row d-flex justify-content-around">
            <div class="col-md-3 d-flex align-items-center justify-content-center" style="margin-top: 18px;">
                <button class="btn btn-light mx-2 radio pe-4" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-search mx-2"></i>CLIENTES
                </button>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center" style="margin-top: 18px;">
                <h2 class="text-center" style="color: white;">COMPROBANTES</h2>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <form action="index.php">
                    <button class="btn"> <i class="fas fa-window-close"></i></button>
                </form>
            </div>
        </div>
        <div class="row my-2">
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="container bg-secondary ">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12 py-4">
                                    <form action="" method="POST">
                                        <label style="color: white;" for="update_cliente">BUSCAR CLIENTE</label>
                                        <input class="form-control" type="text" name="update_cliente" id="update_cliente">
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-12 bg-light">
                                <div class="table-wrapper">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">CLIENTE</th>
                                                <th scope="col">CUIT</th>
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
        <div class="container">
            <div class="row">
                <form class="row g-3">                    
                    <div class="col-auto">                        
                        <input type="text" class="form-control" placeholder="Cliente">
                    </div>
                    <div class="col-auto">                        
                        <input type="text" class="form-control" placeholder="Dirección">
                    </div>
                </form>
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

            document.getElementById("update_cliente").focus();
        }
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>