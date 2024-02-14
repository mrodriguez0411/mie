<?php
include_once "conexion.php";
$conexion = new mysqli("localhost", "root", "", "tiendaonline");


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabla de Productos</h1>
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
                            <!--
                            <div style="display:flex">
                                <h6>Crear Producto
                                    <a href="dashboard.php?modulo=crearProducto"><i class="fas fa-plus"
                                            aria-hidden="true"></i></a>
                            </div>-->
                            <table id="tablaProductos" class="table table-bordered table-hover table-dark text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Categoria</th>
                                        <th>Stock</th>
                                        <th>Imagenes</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php    
                                $query = "SELECT
                                        p.id,
                                        p.nombre,
                                        p.precio,
                                        p.categoria,
                                        p.stock,
                                        p.descripcion,
                                        f.web_path
                                        FROM
                                        productos AS p
                                        INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                                        INNER JOIN files AS f ON f.id=pf.file_id
                                        GROUP BY p.id
                                        ";
                                $res = mysqli_query($conexion, $query);
                                while ($row = mysqli_fetch_assoc($res)){    
                                    
                                ?>    
                                    
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['precio'] ?></td>
                                            <td><?php echo $row['categoria'] ?></td>
                                            <td><?php echo $row['stock'] ?></td>
                                            <td><?php echo $row['web_path'] ?></td>
                                            <td><?php echo $row['descripcion'] ?></td>
                                            <!--<td>
                                                <a href="dashboard.php?modulo=editarUsuarios&id=<?php echo $row['id'] ?>" style="margin-right:10px"><i class="fas fa-edit"></i></a>
                                                <a href="dashboard.php?modulo=usuarios&idBorrar=<?php echo $row['id'] ?>" class="text-danger borrar"><i class="fas fa-trash"></i></a>
                                            </td>-->
                                        </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>