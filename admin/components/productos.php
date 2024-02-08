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
                            <table id="tablaProductos" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Categoria</th>
                                        <th>Stock</th>
                                        <th>Imagenes</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>