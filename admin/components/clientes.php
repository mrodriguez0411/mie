<?php
include_once "conexion.php";
$conexion = new mysqli("localhost", "root", "", "tiendaonline");
if (isset($_REQUEST['idBorrar'])) {
    $id = mysqli_real_escape_string($conexion, $_REQUEST['idBorrar'] ?? ''); //para sanitizar la variable
    $query = "DELETE from clientes where id='" . $id . "';";
    $res = mysqli_query($conexion, $query);
    if ($res) {
?>
        <div class="alert alert-warning float-right" role="alert">
            El usuario ha sido borrado exitosamente
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar el usuario <?php echo mysqli_error($conexion); ?>
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
                    <h1>Tabla de Usuarios</h1>
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
                            <h6>Crear Cliente
                                <a href="dashboard.php?modulo=crearCliente"><i class="fas fa-plus" aria-hidden="true"></i></a>
                            </h6>
                            <table id="example2" class="table table-bordered table-hover table-dark tabla" style="width: auto;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Direccion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    //$query="SELECT id.email.nombre from usuarios where email='".$email."' and pass='".$password."'";
                                    $query = "SELECT*FROM clientes";
                                    $res = mysqli_query($conexion, $query);
                                    while ($row = mysqli_fetch_assoc($res)) {


                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['direccion'] ?></td>
                                            <td>
                                                <a href="dashboard.php?modulo=editarCliente&id=<?php echo $row['id'] ?>" style="margin-right:10px"><i class="fas fa-edit"></i></a>
                                                <a href="dashboard.php?modulo=usuarios&idBorrar=<?php echo $row['id'] ?>" class="text-danger borrar"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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