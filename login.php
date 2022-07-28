<?php
session_start();
session_destroy();
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Funes-web.com">

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="sass/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
   
</head>

<body class="d-flex align-items-center">
<?php
  
  
  ?>
    <div class="container-fluid div-formulario">
        <div class="container w-50 bg-light my-4 rounded shadow" id="contacto">
            <div class="row align-items-stretch">
                <div class="col bg-light my-1 rounded-bottom">
                    <div class="">
                        <img src="img/logo.png" alt="" width="200">
                        <h4 class="text-center" style="color: grey;"><b>Ingresar al Sistema</b></h4>
                        <form action="login_procesa.php" method="POST" class="p-3">
                            <div class="mb-2 d-flex">
                                <span class="col-md-1 col-md-offset-2"><i class="fa fa-user bigicon-login"></i></span>
                                <div class="col">
                                    <input id="fname" name="usuario" type="text" placeholder="Ingresa tu Usuario" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2 d-flex">
                                <span class="col-md-1 col-md-offset-2"><i class="fas fa-unlock-alt bigicon-login"></i></span>
                                <div class="col">
                                    <input id="lname" name="password" type="password" placeholder="Ingresa tu Password" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="d-grid" id="">
                                <button type="submit" class="btn btn-primary">ENTRAR</button>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <?php
        include('footer.php');
        ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <?php
    if (isset($_SESSION['no_existe_usuario'])) { ?>
        <script>
            swal({
                title: 'Oops...!!!',
                text: "El usuario ingresado NO existe \n vuelva a intentarlo",
                icon: "error",
                button: "Volver al Sitio!",

            });
        </script>

    <?php
        session_unset($_SESSION['no_existe_usuario']);
    }
    ?>
     <?php
    if (isset($_SESSION['pass_incorrecto'])) { ?>
        <script>
            swal({
                title: 'Algo salio mal..',
                text: "El password está equivocado.. ",
                icon: "error",
                button: "Volver al Sitio!",

            });
        </script>
    <?php
        session_unset($_SESSION['pass_incorrecto']);
    }
    ?>

    <?php
    if (isset($_SESSION['ya_existe'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['ya_existe']; ?>',
                text: "Este usuario ya existe. \n Intente con otro nombre por favor. ",
                icon: "error",
                button: "Vuelva a intentarlo!!",
            });
        </script>
    <?php
        session_unset($_SESSION['ya_existe']);
        // session_unset();
    }
    ?>
</body>

</html>