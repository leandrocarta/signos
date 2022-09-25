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
                        <h5 style="color: white;">FORMULARIO ALTA DE CLIENTES</h5>
                    </div>
                    <div class="col-md-1">
                        <form action="index.php">
                            <button class="btn"> <i class="fas fa-window-close"></i></button>
                        </form>
                    </div>
                </div>
                <form action="alta_clientes_guarda.php" method="POST" class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="inputCity" name="nombre" placeholder="NOMBRE O RAZON SOCIAL" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="inputAddress" name="contacto" placeholder="NOMBRE DEL CONTACTO">
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" id="inputCity" name="cuit" placeholder="CUIT O DNI (Solamente números sin guiones – sin puntos)">
                    </div>
                    <div class="col-md-4">
                        <select id="inputState" class="form-select" name="cond_fiscal">
                            <option selected>Condición fiscal</option>
                            <option>Consumidor final</option>
                            <option>Responsable inscripto</option>
                            <option>Monotributo</option>
                            <option>Otro...</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="inputState" class="form-select" name="cond_venta">
                            <option selected>Condición de venta</option>
                            <option>Contado</option>
                            <option>Cta. Cte.</option>
                            <option>Canje</option>
                            <option>Otra...</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="inputAddress" name="direccion" placeholder="Dirección">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="inputAddress" name="localidad" placeholder="Localidad">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="inputAddress" name="provincia" placeholder="Provincia">
                    </div>
                    <div class="col-md-4">
                        <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="E-mail">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="inputAddress" name="telefono" placeholder="Teléfono fijo">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="inputAddress" name="movil" placeholder="WhatsApp (543413672066)" required>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" style="padding: 5px;" class=" form-control btn btn-success">GUARDAR</button>
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
 <script>
        foco();
        function foco(){
 document.getElementById("focoCliente").blur();
 document.getElementById("inputCity").focus();
}

    </script>
</body>

</html>