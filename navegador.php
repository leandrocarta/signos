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
            <div class="collapse navbar-collapse d-flex justify-content-between" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" id="focoComprobantes" href="#" data-bs-toggle="dropdown"> COMPROBANTES </a>
                        <ul class="dropdown-menu">                            
                            <li><a class="dropdown-item" href="#" style="background-color: #5594ed; color: white;">FACTURA</a></li>
                            <li><a class="dropdown-item" href="">NUEVA</a></li>
                            <li><a class="dropdown-item" href="">CONSULTA</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" id="focoCliente" href="#" data-bs-toggle="dropdown"> CLIENTES </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="alta_cliente.php" accesskey="h">NUEVO</a></li>
                            <li><a class="dropdown-item" href="clientes.php">CONSULTAS</a></li>
                            <li><a class="dropdown-item" href="clientes_modifica.php">EDITAR</a></li>
                            <li><a class="dropdown-item" href="clientes_eliminar.php">ELIMINAR</a></li>
                            <li><a class="dropdown-item disabled" href="#" aria-disabled="true"> CUENTA CORRIENTE </a></li>
                            <li> <a class="dropdown-item" href="#" aria-disabled="true"> NOTA DE ENTREGA &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="clientes_factura.php" aria-disabled="true">NUEVA</a></li>
                                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">CONSULTA</a></li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item disabled" href="#"> PRESUPUESTO &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item disabled" href="#">NUEVO</a></li>
                                    <li><a class="dropdown-item disabled" href="#">CONSULTA</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" id="focoProveedor" href="#" data-bs-toggle="dropdown"> PROVEEDORES </a>
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
                        <a class="nav-link dropdown-toggle white" href="#" id="focoProductos" data-bs-toggle="dropdown"> PRODUCTOS </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item disabled" href="#">BUSCAR</a></li>
                            <li><a class="dropdown-item disabled" href="#">ALTAS</a></li>
                            <li><a class="dropdown-item disabled" href="#">BAJAS</a></li>
                            <li><a class="dropdown-item disabled" href="#">MODIFICAR</a></li>
                            <li> <a class="dropdown-item" href="#"> CATEGORÍAS &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="alta_categorias.php">CREAR CATEGORÍAS</a></li>
                                    <li><a class="dropdown-item" href="alta_sub_categoria.php">CREAR SUB CATEGORÍAS </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle white" id="focoPrecio" href="#" data-bs-toggle="dropdown"> PRECIOS </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item disabled" href="#">MODIFICAR</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-item white disabled" id="focoStock" href="#"> STOCK </a>
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

                                <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
                }


                ?>
                <?php

                if ($_SESSION['mostrador']) {
                ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-user mx-1"></i>Bienvenido!! <span><?php echo $_SESSION['mostrador']; ?>

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

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
    <script>
        foco();

        function foco() {
            document.getElementById("focoComprobantes").focus();
        }

        document.addEventListener("keydown", enter);
        var $enter = 1;

        function enter(event) {

            const teclaPresionada = event.key.toLowerCase();
            console.log(teclaPresionada);

            if (teclaPresionada == 'arrowright') {

                if ($enter == 6) {
                    document.getElementById("focoComprobantes").focus();
                    document.getElementById("focoStock").blur();
                    console.log($enter);
                    console.log('focoCliente Vale 5 y pasa a 1');
                    $enter = 1;
                } else if ($enter == 5) {
                    document.getElementById("focoPrecio").blur();
                    document.getElementById("focoStock").focus();
                    console.log($enter);
                    console.log('focoStock Vale 4 y pasa a 5');
                    $enter++;
                } else if ($enter == 4) {
                    document.getElementById("focoProductos").blur();
                    document.getElementById("focoPrecio").focus();
                    console.log($enter);
                    console.log('focoPrecio Vale 3 y pasa a 4');
                    $enter++;
                } else if ($enter == 3) {
                    document.getElementById("focoProveedor").blur();
                    document.getElementById("focoProductos").focus();
                    console.log($enter);
                    console.log('focoProductos Vale 2 y pasa a 3');
                    $enter++;
                } else if ($enter == 2) {
                    document.getElementById("focoCliente").blur();
                    document.getElementById("focoProveedor").focus();
                    console.log($enter);
                    console.log('focoProveedor Vale 1 y pasa a 2');
                    $enter++;
                } else if ($enter == 1) {
                    document.getElementById("focoCliente").focus();
                    document.getElementById("focoComprobantes").blur();
                    console.log($enter);
                    console.log('focoProveedor Vale 1 y pasa a 2');
                    $enter++;
                }

            }
            if (teclaPresionada == 'arrowleft') {
                $enter = $enter;
                console.log('El valor es ');
                console.log($enter);
                if ($enter == 6) {
                    document.getElementById("focoPrecio").focus();
                    document.getElementById("focoStock").blur();
                    console.log($enter);
                    console.log('Vale 5');
                    $enter = 5;
                } else if ($enter == 5) {
                    document.getElementById("focoPrecio").blur();
                    document.getElementById("focoProductos").focus();
                    console.log($enter);
                    console.log('Vale 4');
                    $enter = 4;
                } else if ($enter == 4) {
                    document.getElementById("focoProductos").blur();
                    document.getElementById("focoProveedor").focus();
                    console.log($enter);
                    console.log('Vale 3');
                    $enter = 3;
                } else if ($enter == 3) {
                    document.getElementById("focoProveedor").blur();
                    document.getElementById("focoCliente").focus();
                    console.log($enter);
                    console.log('Vale 2');
                    $enter = 2;
                } else if ($enter == 2) {
                    document.getElementById("focoCliente").blur();
                    document.getElementById("focoComprobantes").focus();
                    console.log($enter);
                    console.log('Vale 1');
                    $enter = 1;
                } else if ($enter == 1) {
                    document.getElementById("focoComprobantes").blur();
                    document.getElementById("focoStock").focus();
                    console.log($enter);
                    console.log('Vale 1');
                    $enter = 6;
                }


            }
        }
    </script>
</body>