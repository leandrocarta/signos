
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
    <div class="container bg-secondary ">
        <div class="row">
            <div class="row">
                <div class="col-md-11 py-4">
                    <h5 style="color: white;">MODIFICAR CLIENTES</h5>
                    <form action="" method="POST">
                        <label style="color: white;" for="update_cliente">BUSCAR</label>
                        <input class="form-control" type="text" name="update_cliente" id="update_cliente">
                    </form>

                </div>
                <div class="col-md-1">
                    <form action="index.php">
                        <button class="btn"> <i class="fas fa-window-close" ></i></button>
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
                                <th scope="col">EDITAR </th>
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
        document.getElementById("update_cliente").addEventListener("keyup", getData)

        function getData() {
            let input = document.getElementById("update_cliente").value
            let content = document.getElementById("content")
            let url = "cliente_update.php";

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

<?php
if (isset($_SESSION['cliente_modificado'])) { ?>
<script>
  swal({
    title: '<?php echo $_SESSION['cliente_modificado']; ?>',
    text: "El Cliente se Modificó correctamente.",
    icon: "success",
    button: "Continue aquí!!",

  });
</script>

<?php
unset($_SESSION['cliente_modificado']);
}

?>


</body>

</html>