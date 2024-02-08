<!--Menu Header-->

<nav class="navbar navbar-dark navbar-expand" style="width:100%;">
    <div>
        <img src="admin/dist/img/Logo.jpg" class="img-circle img-thumbnail img-lg " style="opacity: 0.8;" />
    </div>
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="./index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contacto</a>
        </li>
    </ul>

    <!-- Navbar derecho -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline" action="index.php">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre'] ?? ''; ?>">
                        <input type="hidden" name="modulo" value="productos">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Menu Carrito -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                <span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">



            </div>
        </li>
        <!-- Menu Usuario-->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <!--Aca trabajo con la sesion del usuario logueado -->
                <?php
                if (isset($_SESSION['idCli']) == false) { //si no existe la variable (sesion del cliente)mostrame ingresar y registar
                ?>
                    <a href="login.php" class="dropdown-item" style="color: #23282e;">
                        <i class="fas fa-sign-in-alt mr-2 " aria-hidden="true" style="color: #00b2ee;"></i>
                        Ingresar
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="registro.php" class="dropdown-item" style="color: #23282e;">
                        <i class="fa fa-user-plus mr-2" aria-hidden="true" style="color: #00b2ee;"></i>Registrarse
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="admin/index.php" class="dropdown-item" style="color: #23282e;">
                    <i class="fa-solid fa-user-tie mr-2" aria-hidden= "true" style="color: black;"></i>
                    Area de Admin
                    </a>
                <?php //si existe mostrame cerrar sesion en el menu
                } else {
                ?>
                    <a href="index.php?modulo=usuario" class="dropdown-item" style="color: #23282e;">
                        <i class="fa-solid fa-circle-user mr-2" style="color: #00b2ee;"></i>Hola <?php echo $_SESSION['nombreCli'] ?>
                    </a>
                    <form action="index.php" method="post">
                        <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                            <i class="fa-solid fa-circle-xmark mr-2 text-danger"></i>Cerrar Sesion
                        </button>
                    </form>
                <?php
                }
                ?>
            </div>
        </li>

    </ul>
</nav>

<!--Mensaje al cerrar sesion el usuario-->
<?php
$mensaje = $_REQUEST['mensaje'] ?? '';
if ($mensaje) {
?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <?php echo $mensaje; ?>
    </div>
<?php
}
?>