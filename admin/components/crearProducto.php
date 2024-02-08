<?php
    if(isset($_REQUEST['guardar'])){
        include_once "admin/conexion.php";
        $conexion = new mysqli("localhost", "root", "", "tiendaonline");

        $nombre=mysqli_real_escape_string($conexion,$_REQUEST['nombre']??'');
        $precio=mysqli_real_escape_string($conexion,$_REQUEST['precio']??'');
        //$imagen=mysqli_real_escape_string($conexion,$_REQUEST['imagen']??'');
        $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $stock=mysqli_real_escape_string($conexion,$_REQUEST['stock']??'');

        $query="INSERT INTO productos(nombre,precio,imagen,stock) VALUES('".$nombre."','".$precio."','".$imagen."','".$stock."')";
        $res=mysqli_query($conexion,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=./dashboard.php?modulo=productos&mensaje=Producto creado exitosamente"/>';
        }
        else{
            ?>
<div class="alert alert-danger" role="alert">
    Error al crear producto <?php echo mysqli_error($conexion); ?>
</div>
<?php
        }
    }

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Producto</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="./dashboard.php?modulo=crearProducto" method="post">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" name="precio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" name="imagen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" name="existencia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>