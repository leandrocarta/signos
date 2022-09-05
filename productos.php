<!doctype html>
<html lang="es">

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
    ?>
    <div class="container-fluid bg-secondary ">
        <div class="row">
            <div class="row">
                <div class="col-md-11 py-4">
                    <h5 style="color: white;">CONSULTA DE PRODUCTOS</h5>
                    <form action="search.php" method="POST" class="d-flex ">
                        <div class="col-md-4 mx-2">
                            <label style="color: white;" for="campo">NOMBRE PRODUCTO</label>
                            <input class="form-control" type="text" name="campo" id="campo" style="text-transform:uppercase;">
                        </div>
                        <div class="col-md-4">
                            <label style="color: white;" for="cod_int">CÓDIGO INTERNO </label>
                            <input type="text" class="form-control" name="cod_int" id="cod_int" style="text-transform:uppercase;">
                        </div>
                        <div class="col-md-4 mx-2">
                            <label style="color: white;" for="cod_prov">CÓDIGO PROV.</label>
                            <input type="text" class="form-control" name="cod_prov" id="cod_prov" style="text-transform:uppercase;">
                        </div>
                    </form>
                </div>
                <div class="col-md-1">
                    <form action="index.php">
                        <button class="btn"> <i class="fas fa-window-close"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-12 bg-light">
                <div class="table-wrapper">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">COD.INT</th>
                                <th scope="col">COD.PROV</th>
                                <th scope="col">PRODUCTO</th>
                                <th scope="col">NETO</th>
                                <th scope="col">IVA</th>
                                <th scope="col">FINAL</th>
                            </tr>
                        </thead>
                        <tbody id="content">

                        </tbody>
                    </table>
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
            let url = "search_productos.php";

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
            let url = "search_cod_int.php";

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
            let url = "search_cod_prov.php";

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>