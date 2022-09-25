<?php
include('conexion.php');
session_start();
?>
<!doctype html>
<html lang="es">

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
  <header>
    <?php
    include('nav.php');
    ?>
  </header>
  <main>
    <div class="container-fluid p-3">
      <div class="row bg-secondary mb-1">
        <div class="col-lg-11">
          <h3 class="text-center text-white pt-2">CONSULTA DE RECEPCIONES</h3>
        </div>
        <div class="col-lg-1">
          <form action="index.php">
            <button class="btn"> <i class="fas fa-window-close"></i></button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5">
          <div class="row mt-2 m-0">
            <div class="col-lg-12 py-2 bg-secondary ">
              <h5 style="color: white; text-align: center; font-weight: bold;">BUSCAR RECEPCION</h5>
              <div class="table-wrapper-recepcion size_table">
                <table class="table table-striped border">
                  <thead class="white">
                    <tr>
                      <th scope="col">RECEP N°</th>
                      <th scope="col">PROVEEDOR</th>
                      <th scope="col">FECHA</th>
                      <th scope="col">VER</th>
                    </tr>
                  </thead>
                  <?php

                  $consulta = mysqli_query($conexion_bd, "SELECT id_recep, nombre, fecha FROM recepcion_lista");
                  if ($consulta) {
                    while ($listar_datos = mysqli_fetch_array($consulta)) {
                      $id_recepcion = $listar_datos['id_recep'];
                      $nombre_prove = $listar_datos['nombre'];
                      $fecha = $listar_datos['fecha'];
                  ?>
                      <tbody id="content" class="white">
                        <tr>
                          <td><?php echo $id_recepcion; ?></td>
                          <td><?php echo $nombre_prove; ?></td>
                          <td><?php echo $fecha; ?></td>
                          <td><a href="recepcion_consulta.php?id=<?php echo $id_recepcion ?>" style="color:white;" class="btn btn-danger">VER</a></td>
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
        </div>

        <div class="col-lg-7">
          <div class="row mt-2">
            <div class="col-lg-12 py-2 bg-danger ">
              <h5 style="color: white; text-align: center; font-weight: bold;">VER RECEPCION</h5>
              <div class="table-wrapper-recepcion size_table">
                <?php
                $nom_recep = $_GET['id'];
                $nombRecp = mysqli_query($conexion_bd, "SELECT id, nombre_prove, fecha 
                 FROM recepcion_consulta WHERE id_recepcion = ' $nom_recep'");
                while ($listar_datos = mysqli_fetch_array($nombRecp)) {
                  $id = $listar_datos['id'];
                  $nombre_proveedor = $listar_datos['nombre_prove'];
                  $fecha2 = $listar_datos['fecha'];
                }
                ?>
                <div class="mb-2">
                  <input style="color: white; font-weight: bold; background-color: #DC3545;" type="text" value="<?php echo $nombre_proveedor ?>" disabled>
                  <input style="color: white; font-weight: bold; background-color: #DC3545;" type="text" value="<?php echo $fecha2 ?>" disabled>
                </div>
                <table class="table table-striped border">
                  <thead class="white">
                    <tr>
                      <th scope="col">COD</th>
                      <th scope="col">PRODUCTO</th>
                      <th scope="col">COSTO</th>
                      <th scope="col">% 1</th>
                      <th scope="col">% 2</th>
                      <th scope="col">% 3</th>
                      <th scope="col">UTIL.</th>
                      <th scope="col">CANT.</th>
                    </tr>
                  </thead>
                  <?php
                  $id_recep = $_GET['id'];
                  $consulta = mysqli_query($conexion_bd, "SELECT id, producto, costo, descto, descto2, descto3, utilidad, cantidad 
                  FROM recepcion_consulta WHERE id_recepcion = ' $id_recep'");
                  if ($consulta) {
                    while ($listar_datos = mysqli_fetch_array($consulta)) {
                      $id = $listar_datos['id'];
                      $producto = $listar_datos['producto'];
                      $costo = $listar_datos['costo'];
                      $descto = $listar_datos['descto'];
                      $descto2 = $listar_datos['descto2'];
                      $descto3 = $listar_datos['descto3'];
                      $utilidad = $listar_datos['utilidad'];
                      $cantidad = $listar_datos['cantidad'];
                  ?>
                      <tbody id="content" class="white">
                        <tr>
                          <td><?php echo $id; ?></td>
                          <td><?php echo $producto; ?></td>
                          <td><?php echo $costo; ?></td>
                          <td><?php echo $descto; ?></td>
                          <td><?php echo $descto2; ?></td>
                          <td><?php echo $descto3; ?></td>
                          <td><?php echo $utilidad; ?></td>
                          <td><?php echo $cantidad; ?></td>

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
        </div>
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>

</html>