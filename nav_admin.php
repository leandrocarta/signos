<?php
session_start();
$admin = $_SESSION['admin'];
$mostrador = $_SESSION['mostrador'];
if (!$admin || !$mostrador) {
    header("Location: login.php");
}
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" href="#" data-bs-toggle="dropdown"> CLIENTES </a>
                        <ul class="dropdown-menu">                            
                            <li><a class="dropdown-item" href="alta_cliente.php">NUEVO</a></li>
                            <li><a class="dropdown-item" href="clientes.php">CONSULTAS</a></li>
                            <li><a class="dropdown-item" href="clientes_modifica.php">EDITAR</a></li>
                            <li><a class="dropdown-item" href="clientes_eliminar.php">ELIMINAR</a></li>
                            <li><a class="dropdown-item disabled" href="#" aria-disabled="true"> CUENTA CORRIENTE </a></li>
                            <li> <a class="dropdown-item disabled" href="#" aria-disabled="true"> NOTA DE ENTREGA &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">NUEVA</a></li>
                                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">CONSULTA</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" href="#" data-bs-toggle="dropdown"> PROVEEDORES </a>
                        <ul class="dropdown-menu">                            
                            <li><a class="dropdown-item" href="alta_proveedores.php">NUEVO</a></li>
                            <li><a class="dropdown-item" href="proveedores.php">CONSULTAS</a></li>
                            <li><a class="dropdown-item" href="proveedores_modifica.php">EDITAR</a></li>
                            <li><a class="dropdown-item" href="proveedores_eliminar.php">ELIMINAR</a></li>
                            <li><a class="dropdown-item disabled" href="#"> CUENTA CORRIENTE </a></li>
                            <li> <a class="dropdown-item disabled" href="#"> NOTA DE PEDIDO &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item disabled" href="#">NUEVA</a></li>
                                    <li><a class="dropdown-item disabled" href="#">CONSULTA</a></li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" href="#" data-bs-toggle="dropdown"> PRODUCTOS </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item disabled" href="#">BUSCAR</a></li>
                            <li><a class="dropdown-item disabled" href="#">ALTAS</a></li>
                            <li><a class="dropdown-item disabled" href="#">BAJAS</a></li>
                            <li><a class="dropdown-item disabled" href="#">MODIFICAR</a></li>
                            <li> <a class="dropdown-item" href="#"> CATEGORÍAS  &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="alta_categorias.php">CREAR CATEGORÍAS</a></li>
                                    <li><a class="dropdown-item" href="alta_sub_categoria.php">CREAR SUB CATEGORÍAS </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" href="#" data-bs-toggle="dropdown"> EMPLEADOS </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item disabled" href="#">BUSCAR</a></li>
                            <li><a class="dropdown-item disabled" href="#">ALTAS</a></li>
                            <li><a class="dropdown-item disabled" href="#">BAJAS</a></li>
                            <li><a class="dropdown-item disabled" href="#">MODIFICAR</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" href="#" data-bs-toggle="dropdown"> PRECIOS </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item disabled" href="#">MODIFICAR</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-item white disabled" href="#"> CAJA </a>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-item white disabled" href="#"> STOCK </a>
                    </li>
                </ul>
                <?php
        
        if ($_SESSION['administrador']) {
        ?>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="far fa-user mx-1"></i>Bienvenido!! <span><?php echo $_SESSION['administrador']; ?>
                
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="admin.php">Administrador</a></li>
                <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        <?php
        }


        ?>
            </div>
            <!-- navbar-collapse.// -->
        </div>
        <!-- container-fluid.// -->
    </nav>
</body>