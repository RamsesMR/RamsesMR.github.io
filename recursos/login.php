<?php
require_once('config.php');
/*
error_reporting(5);
date_default_timezone_set("Europe/Madrid");

session_start();

require_once('lib/funciones.php');
*/
// Check if form was submitted:

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Lf2MZ8pAAAAAHsNXVF8JSz0HNooaV6kpHlU-Lhi';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
      
		$login = limpiarCadena($_POST['login']);
		$pass  = pass($_POST['password']);

		$link = conexion();

		$sql = "SELECT * FROM usuarios WHERE (login = '".$login."' AND pass = '".$pass."') AND activo = 1 ";

		$result = mysqli_query($link, $sql);
		if($result && mysqli_num_rows($result) > 0) {

			$row = mysqli_fetch_assoc($result);

			$_SESSION['user'] = $row['login'];
			$_SESSION['nom_user'] = $row['nombre'];
			$_SESSION['id_user'] = $row['id'];
			$_SESSION['tipo_user'] = $row['tipo'];
      if($row['centros_fp'] != null) {
        $_SESSION['centros_fp'] = json_decode($row['centros_fp']);  
      }
    
      $fue = date("Y-m-d H:i:s");

      mysqli_query($link, "UPDATE usuarios SET fue = '".$fue."' WHERE id = '".$row['id']."' LIMIT 1 ");

			header("location:index.php");
			exit;

		} 
		else {
			$mensaje = "Error. Usuario y/o Contraseña incorrectos.";
		}

    } 
    else {
        // Not verified - show form error
        $mensaje = "Ocurro un error en la verificación de Recaptcha. <br> Vuelva a cargar la página e intentelo de nuevo.";
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>CRM Prácticas 1.0</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="recursos/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="recursos/adminlte/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Google Recaptcha -->
	<script src="https://www.google.com/recaptcha/api.js?render=6Lf2MZ8pAAAAAE1Jveaa315t0dtp0wTyn-vV0d-a"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6Lf2MZ8pAAAAAE1Jveaa315t0dtp0wTyn-vV0d-a', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</head>
<body class="login-page" style="min-height: 512.391px;">
<div class="login-box">
  <div class="login-logo">
    <b>CRM Prácticas</b> 1.0
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión para comenzar</p>

      <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off">

        <div class="input-group mb-3">
          <input type="text" name="login" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span> <i class="fas fa-user"></i></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3 text-center">
			<span class="text-danger text-center"><?=$mensaje;?></span>
        </div>
        
        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

        <div class="social-auth-links text-center mb-3">
        
        	<button type="submit" class="btn btn-primary btn-block">Entrar al Sistema</button>

      	</div>

    </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="recordar-password.php">Olvidé mi contraseña</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="recursos/jquery-3.4.1.min.js"></script>
<!-- Bootstrap 4 -->
<script src="recursos/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="recursos/adminlte/js/adminlte.min.js"></script>
</body>
</html>