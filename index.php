<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIE | Tienda de Mascotas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="./admin/css/login.css">
    <!--Inicio la sesion del cliente-->
    <?php
    session_start();
    $accion = $_REQUEST['accion'] ?? '';
    if ($accion == 'cerrar') {
        session_destroy();
        header("Refresh:0"); //refresca la ventana y cierra la sesion al apretar Cerra Sesion del Menu
    }
    ?>

</head>

<body style="background-color: #f2f2f2;">
    <?php
    include_once "admin/conexion.php";

    $conexion = new mysqli("localhost", "root", "", "tiendaonline");
    ?>
    <div class="container">
        <div class="">

            <?php
            include_once "menu.php";
            $modulo = $_REQUEST['modulo'] ?? '';
            if ($modulo == "productos" || $modulo == "") {
                include_once "productos.php";
            }
            if ($modulo == "detalleproducto") {
                include_once "detalleProducto.php";
            }
            if ($modulo == "carritoCompras") {
                include_once "carritoCompras.php";
            }
            if ($modulo == "envio") {
                include_once "envio.php";
            }
            if ($modulo == "pasarelaPagos") {
                include_once "pasarelaPagos.php";
            }
            ?>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes 
    <script src="dist/js/demo.js"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/dist/js/pages/dashboard.js"></script>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script src="node_modules/@mercadopago/sdk-js/dist/index.js"></script>
    <!--Carrito-->
    <script src="admin/js/carrito.js"></script>
    <script src="https://kit.fontawesome.com/887bbf31ea.js" crossorigin="anonymous"></script>
</body>

</html>