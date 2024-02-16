<!DOCTYPE html>
<html lang="en">
<?php
session_start();
session_regenerate_id(true); //para regenrar el ssid 
if (isset($_REQUEST['sesion']) && $_REQUEST['sesion'] == "close") {
    session_destroy();
    header("location: login.php");
}
if (isset($_SESSION['id']) == false) {
    header("location: login.php");
}
$modulo = $_REQUEST['modulo'] ?? '';
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MIE | Tienda de Mascotas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />
    <!-- DataTables -->
    <!--<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
     -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="css/editor.dataTables.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/logo.jpg" alt="AdminLTELogo" height="60" width="60" />
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
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

                <!-- Messages Dropdown Menu -->

                <!-- HACER MENU DESPLEGABLE CON OPCIONES DEL USUARIO-->

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" style="color: #00b2ee;">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <a class="nav-link" href="dashboard.php?modulo=editarUsuarios&id=<?php echo $_SESSION['id']; ?>">Editar
                            Usuario</a>
                        <i class="fas fa-door-closed">
                            <!--<a class="nav-link" href="../login.php?modulo=&sesion=close">Cerrar Sesion</a>-->
                            <a class="nav-link text-danger" href="../index.php">Cerrar Sesion</a>
                        </i>
                    </div>

                </li>


                <!-- ver para copiar

-->
            </ul>
        </nav>

        <!-- /.navbar  -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="dist/img/Logo.jpg" class="logot brand-image img-circle elevation-4" style="opacity: 0.8" />
                <span class="brand-text font-weight-light">MIE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/usuario.png" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['nombre'] ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="dashboard.php?modulo=estadisticas" class="nav-link <?php echo ($modulo == "estadisticas" || $modulo == "") ? "active" : ""; ?>">
                                        <i class="nav-icon fas fa-chart-bar"></i>
                                        <p>Estadisticas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="dashboard.php?modulo=usuarios" class="nav-link <?php echo ($modulo == "usuarios" || $modulo == "crearUsuario" || $modulo == "editarUsuarios") ? "active" : ""; ?>">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="dashboard.php?modulo=productos" class="nav-link <?php echo ($modulo == "productos") ? "active" : ""; ?>">
                                        <i class="fa fa-shopping-bag nav-icon"></i>
                                        <p>Productos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="dashboard.php?modulo=clientes" class="nav-link <?php echo ($modulo == "clientes" || $modulo == "crearCliente" || $modulo == "editarClientes") ? "active" : ""; ?>">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Clientes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="dashboard.php?modulo=ventas" class="nav-link <?php echo ($modulo == "ventas") ? "active" : ""; ?>">
                                        <i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i>
                                        <p>Ventas</p>
                                    </a>
                                </li>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php
        if (isset($_REQUEST['mensaje'])) {
        ?>
            <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <?php echo $_REQUEST['mensaje'] ?>
            </div>
        <?php
        }
        if ($modulo == "estadisticas" || $modulo == "") {
            include_once "./components/estadisticas.php";
        }
        if ($modulo == "usuarios") {
            include_once "./components/usuarios.php";
        }
        if ($modulo == "productos") {
            include_once "./components/productos.php";
        }
        if ($modulo == "ventas") {
            include_once "./components/ventas.php";
        }
        if ($modulo == "crearUsuario") {
            include_once "./components/crearUsuario.php";
        }
        if ($modulo == "editarUsuarios") {
            include_once "./components/editarUsuarios.php";
        }
        if ($modulo == "crearProducto") {
            include_once "./components/crearProducto.php";
        }
        if ($modulo == "productos") {
            include_once "./components/productos.php";
        }
        if ($modulo == "clientes") {
            include_once "./components/clientes.php";
        }

        ?>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy;
                <a href="https://adminlte.io">mr-informatica</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes 
    <script src="dist/js/demo.js"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="js/dataTables.editor.min.js"></script>
    <!-- DataTables  Dynamic tabla 
    <script src="js/dataTable.js"></script>-->
    <!--Vanilla Datatables
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>-->


    <!-- Page specific script -->
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            editor = new DataTable.Editor({

                ajax: "controllers/productos.php",
                fields: [{
                        label: 'Nombre:',
                        name: 'nombre'
                    },
                    {
                        label: 'Precio:',
                        name: 'precio'
                    },
                    {
                        label: 'Categoria:',
                        name: 'categoria'
                    },
                    {
                        label: 'Stock:',
                        name: 'stock'
                    },
                    {
                        label: 'Imagenes:',
                        name: 'files[].id',
                        type: 'uploadMany',
                        display: (fileId, counter) =>
                            `<img src="${editor.file('files', fileId).web_path}"/>`,
                        noFileText: 'No contiene imagenes el producto'
                    },
                    {
                        label: 'Descripcion:',
                        name: 'descripcion'
                    }
                ],
                table: '#tablaProductos',

            });

            new DataTable("#tablaProductos", {
                ajax: "controllers/productos.php",
                buttons: [
                    { extend: 'create', editor },
                    { extend: 'edit', editor },
                    { extend: 'remove', editor }
                ],
                columns: [{
                        data: 'nombre'
                    },
                    {
                        data: 'precio',
                        render: DataTable.render.number(null, null, 0, '$')
                    },
                    {
                        data: 'categoria'
                    },
                    {
                        data: 'stock'
                    },
                    {
                        data: 'files',
                        render: d => d.length ? `${d.length} imagen(es)` : 'No hay imagen(es)',
                        title: 'Imagen'
                    },
                    {
                        data: 'descripcion'
                    }
                ],
                dom: 'Bfrtip',
                select: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".borrar").click(e);
            {
                e.preventDefault();
                var res = confirm("¿Está seguro que quieres borrar el usuario?");
                if (res == true) {
                    var link = $(this).attr("href");
                    window.location = link;
                }
            }
        });
    </script>
</body>

</html>