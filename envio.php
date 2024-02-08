<?php
//si la sesion del cliente existe cargar el area de envio, sino existe no deja avanzar o da error

if (isset($_SESSION['idCli'])) { //veo si esta activa la sesion del cliente antes de pagar, no avanza
    if (isset($_REQUEST['guardar'])) { //si le dimos click al boton guardar(ir a pagar),guarda los datos
        $nombreCli = $_REQUEST['nombreCli'] ?? '';
        $emailCli = $_REQUEST['emailCli'] ?? '';
        $direccionCli = $_REQUEST['direccionCli'] ?? '';
        $queryGuardaCli = "UPDATE clientes set nombre='$nombreCli', email='$emailCli', direccion='$direccionCli' where id='" . $_SESSION['idCli'] . "' ;";
        $resGuardaCli = mysqli_query($conexion, $queryGuardaCli);

        $nombreEnv = $_REQUEST['nombreEnv'] ?? '';
        $emailEnv = $_REQUEST['emailEnv'] ?? '';
        $direccionEnv = $_REQUEST['direccionEnv'] ?? '';
        $queryGuardaEnv = "INSERT INTO destinatario (idCli,nombre,email,direccion) VALUES('" . $_SESSION['idCli'] . "','$nombreEnv','$emailEnv','$direccionEnv')
        ON DUPLICATE KEY UPDATE
        nombre='$nombreEnv', email='$emailEnv', direccion='$direccionEnv' ;";
        $resGuardaEnv = mysqli_query($conexion, $queryGuardaEnv);

        if ($resGuardaCli && $resGuardaEnv) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=pasarelaPagos"/>';
        } else {
?>
            <div class="alert alert-danger" role="alert">
                Error al validar los datos
            </div>

    <?php
        }
    }
    //ahora muestro los registros 
    $queryGuardaCli = "SELECT * from clientes where id='" . $_SESSION['idCli'] . "';";
    //hago la consulta con msqli
    $resCli = mysqli_query($conexion, $queryGuardaCli);
    $rowCli = mysqli_fetch_assoc($resCli); //asocio resCli a rowCli

    //ahora muestro los registros 
    $queryGuardaEnv = "SELECT nombre,email,direccion from destinatario where idCli='" . $_SESSION['idCli'] . "';";
    //hago la consulta con msqli
    $resEnv = mysqli_query($conexion, $queryGuardaEnv);
    $rowEnv = mysqli_fetch_assoc($resEnv);
    ?>
    <form method="post">
        <div class="container mt-3">
            <div class="row">
                <div class="col-6">
                    <h1>Datos del Cliente</h1>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombreCli" id="nombreCli" class="form-control" value="<?php echo $rowCli['nombre'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="emailCli" id="emailCli" class="form-control" readonly="readonly" value="<?php echo $rowCli['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Direccion</label>
                        <textarea name="direccionCli" id="direccionCli" class="form-control" rows="3"><?php echo $rowCli['direccion'] ?></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <h1>Datos del Envio</h1>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombreEnv" id="nombreEnv" class="form-control" value="<?php echo $rowEnv['nombre'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="emailEnv" id="emailEnv" class="form-control" value="<?php echo $rowEnv['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Direccion</label>
                        <textarea name="direccionEnv" id="direccionEnv" class="form-control" rows="3"><?php echo $rowEnv['direccion'] ?></textarea>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="copiaCli">
                            Copiar los Datos del Cliente
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-dark btn-lg " href="index.php?modulo=carritoCompras">
            <i class="fa fa-reply  mr-1"></i>
            Volver al Carrito
        </a>
        <!--creo un formulario para enviar los datos de este boton-->

        <button type="submit" class="btn btn-primary btn-lg float-right mr-2" name="guardar" value="guardar">
            <i class="fa-solid fa-sack-dollar mr-2"></i>Ir a Pagar</button>

    </form>
<?php
} else {
?>
    <div class="mt-5 text-center" style="font-weight: bold; font-size:2rem;">
        En necesario<a href="login.php"> loguearse</a> o <a href="registro.php">registrarse</a> continuar con la compra.
    </div>
<?php
}
?>