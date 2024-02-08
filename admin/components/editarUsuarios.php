<?php
    include_once "conexion.php";
    $conexion = new mysqli("localhost", "root", "", "tiendaonline");
    
    if(isset($_REQUEST['guardar'])){
        $id=mysqli_real_escape_string($conexion,$_REQUEST['id']??'');
        $nombre=mysqli_real_escape_string($conexion,$_REQUEST['nombre']??'');
        $email=mysqli_real_escape_string($conexion,$_REQUEST['email']??'');
        $pass=md5 (mysqli_real_escape_string($conexion,$_REQUEST['pass']??''));

        $query="UPDATE usuarios SET nombre='".$nombre."', email='".$email."', pass='".$pass."' where id='".$id."';";
        $res=mysqli_query($conexion,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=./dashboard.php?modulo=usuarios&mensaje=Usuario  ' .$nombre.' actualizado exitosamente"/>';
        }
        else{
            ?>
            <div class="alert alert-danger" role="alert">
                Error al editar usuario <?php echo mysqli_error($conexion); ?>
            </div>
        <?php
        }
    }
    $id= mysqli_real_escape_string($conexion,$_REQUEST['id']??'');
    $query="SELECT id,email,pass,nombre from usuarios where id='".$id."';";
    $res=mysqli_query($conexion,$query);
    $row=mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Usuario</h1>
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
                <form action="./dashboard.php?modulo=editarUsuarios" method="post">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" required="required">
                    </div><div class="form-group">
                      <label>Password</label>
                      <input type="password" name="pass" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
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