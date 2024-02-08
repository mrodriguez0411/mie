<div class="row mt-2">
                <?php
                $where = "where 1=1";
                $nombre = mysqli_real_escape_string($conexion, $_REQUEST['nombre'] ?? '');
                if (empty($nombre) == false) {
                    $where = "and nombre like '%" . $nombre . "%'";
                }
                //Paginador
                $queryCuenta = "SELECT COUNT(*) as cuenta FROM productos $where ;";
                $resCuenta = mysqli_query($conexion, $queryCuenta);
                $rowCuenta = mysqli_fetch_assoc($resCuenta);
                $totalRegistros = $rowCuenta['cuenta'];

                $elementosPorPagina = 6;
                $totalPaginas = ceil($totalRegistros / $elementosPorPagina);

                $paginaSel = $_REQUEST['pagina'] ?? false;

                if ($paginaSel == false) {
                    $inicioLimite = 0;
                    $paginaSel = 1;
                } else {
                    $inicioLimite = ($paginaSel - 1) * $elementosPorPagina;
                }
                $limite = "limit $inicioLimite,$elementosPorPagina";
                //Muestra productos de mi base en el index o home, el $where se agrega para la busqueda de productos
                $query = "SELECT
                    p.id,
                    p.nombre,
                    p.precio,
                    p.categoria,
                    p.stock,
                    f.web_path
                    FROM
                    productos AS p
                    INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                    INNER JOIN files AS f ON f.id=pf.file_id
                    $where
                    GROUP BY p.id
                    $limite
                    ";
                $res = mysqli_query($conexion, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card border-primary " style="height: 99%;justify-content: center;">
                            <img class="product-img" src="<?php echo $row['web_path'] ?>" alt="" style="height:70%;">
                            <div class="card-body" style="justify-content: center;">
                                <h2 class="card-title"><strong><?php echo $row['nombre'] ?></strong></h2>

                                <p class="card-text"><strong>Categoria: </strong><?php echo $row['categoria'] ?></p>
                                <p class="card-text"><strong>Stock: </strong><?php echo $row['stock'] ?></p>
                                <p class="card-text"><strong>Precio: $</strong><?php echo number_format($row['precio'],2, ',', '.') ?></p>
                                <a href="index.php?modulo=detalleproducto&id=<?php echo $row['id'] ?>" class="btn btn-dark">Ver</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php
            if ($totalPaginas > 0) {
            ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php
                        if ($paginaSel != 1) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo($paginaSel-1); ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        for ($i = 1; $i <= $totalPaginas; $i++) {
                        ?>
                            <li class="page-item <?php echo ($paginaSel == $i)? " active " : " "; ?>">
                                <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                            if($paginaSel!=$totalPaginas){
                        ?>
                        
                        <li class="page-item">
                            <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel+1); ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </nav>
            <?php
            }
            ?>