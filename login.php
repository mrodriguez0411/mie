<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MIE | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="admin/css/login.css">
</head>
<body class="hold-transition login-page body">
<div class="login-box">
  <div class="login-logo">
    
    <img src="admin/dist/img/logo.jpg" class="logo" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese sus credenciales</p>
      <?php
        if(isset($_REQUEST['login'])){
          session_start();
          $email=$_REQUEST['email']??'';
          $password=$_REQUEST['pass']??'';
          //$password=md5($password);
          include_once "admin/conexion.php";
          $conexion = new mysqli("localhost", "root", "", "tiendaonline");
          //$query="SELECT id.email.nombre from usuarios where email='".$email."' and pass='".$password."'";
          $query="SELECT id,email,nombre from clientes where email='$email'and password='$password'";
          $res=mysqli_query($conexion,$query);
          $row=mysqli_fetch_assoc($res);
          if($row){
            $_SESSION['idCli']=$row['id'];
            $_SESSION['emailCli']=$row['email'];
            $_SESSION['nombreCli']=$row['nombre'];
            header("location: index.php?mensaje=RegistroExitoso");
          }
          else{
            ?>
              <div class="alert alert-danger" role="alert">
                Usuario o contraseña incorrectos <img src="" alt="">
              </div>
            <?php
          }
        }

      ?>
      <form  method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
        </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="login">Ingresar</button>
            <a href="registro.php" style="color: #fefefe, hover::blue;">Registrarse</a>
          </div>
          <!-- /.col -->
        </div>
        
      </form>
      
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
