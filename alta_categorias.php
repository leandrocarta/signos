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
    <div class="container bg-secondary">
        <div class="row">
            <div class="col-lg-12 contenedor_gral">
                <div class="row">
                    <div class="col-md-11 py-4">
                        <h5 style="color: white;">CREAR CATEGORÍAS</h5>
                    </div>
                    <div class="col-md-1">
                        <form action="index.php">
                            <button class="btn"> <i class="fas fa-window-close"></i></button>
                        </form>
                    </div>
                </div>
                <form action="alta_categoria_guarda.php" method="POST" class="row g-3">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="categoria" required style="text-transform:uppercase;" placeholder="INGRESE EL NOMBRE DE LA CATEGORÍA">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" style="padding: 5px;" class=" form-control btn btn-success">GUARDAR</button>
                    </div>
                    <div class="col-md-4">
                        <a href="" type="submit" style="padding: 5px; color: white;" class="form-control btn btn-danger">CANCELAR - LIMPIAR</a>
                    </div>
                    <div class="col-md-4">
                        <p>
                            <a class="btn btn-primary form-control" style="padding: 5px;" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                VER CATEGORÍAS CREADAS
                            </a>
                        </p>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="container-fluid bg-gray ">
                                <div class="row">
                                    <div class="col-md-12 bg-light">
                                        <div class="table-wrapper-chica">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N° CAT</th>
                                                        <th scope="col">CATEGORÍA</th>
                                                        <th scope="col">ELIMINAR</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                include('conexion.php');
                                                $datos = mysqli_query($conexion_bd, "SELECT id_categoria, nombre FROM categorias ORDER BY nombre");
                                                while ($listar_cat = mysqli_fetch_array($datos)) {
                                                ?>
                                                    <tbody id="content">
                                                        <tr>
                                                            <td><?php echo $listar_cat['id_categoria'] ?></td>
                                                            <td><?php echo $listar_cat['nombre'] ?></td>
                                                            <td><a class="btn btn-danger" href="cat_eliminada.php?id=<?php echo $listar_cat['id_categoria'] ?> & nombre=<?php echo $listar_cat['nombre'] ?>">ELIMINAR</td>
                                                        </tr>
                                                    </tbody>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    if (isset($_SESSION['categoria'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['categoria']; ?>',
                text: "La categoría se creó correctamente!!!",
                icon: "success",
                button: "Continue aquí!!",
            });
        </script>
    <?php
        unset($_SESSION['categoria']);
    }
    ?>
    <?php
    if (isset($_SESSION['cat_eliminada'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['cat_eliminada']; ?>',
                text: "La categoría se elimino correctamente!!!",
                icon: "success",
                button: "Continue aquí!!",

            });
        </script>
    <?php
        unset($_SESSION['cat_eliminada']);
    }
    ?>
    <?php
    if (isset($_SESSION['not'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['not']; ?>',
                text: "La categoría no se puede eliminar \n porque tiene sub categorias asociadas",
                icon: "error",
                button: "Continue aquí!!",

            });
        </script>
    <?php
        unset($_SESSION['not']);
    }
    ?>

<?php
    if (isset($_SESSION['no_disponible'])) { ?>
        <script>
            swal({
                title: '<?php echo $_SESSION['no_disponible']; ?>',
                text: "La categoría ingresada \n ya existe!!!",
                icon: "error",
                button: "Continue aquí!!",

            });
        </script>
    <?php
        unset($_SESSION['no_disponible']);
    }
    ?>

</body>

</html>