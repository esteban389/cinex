<?php
ob_start();
include "database/conexion.php";
include "funciones.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/css/main.css">
    <title>Cinex | tus películas favoritas en un solo lugar</title>
	<style>
		body{
			background: transparent;
			background-image: url("./media/log-sign/bg-gradient.jpg");
		}
	</style>
</head>
<body>
    <nav style="justify-content: center;">
        <div>
			<a href="index.html">
				<h2>Cinex</h2>
			</a>
        </div>
    </nav>
	
	<section>
		<div class="container">
			<h6><span>Iniciar sesión </span><span>Suscribirse</span></h6>
			<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			<label for="reg-log"></label>
			<div class="card-3d-wrap">
				<div class="card-3d-wrapper">
					<div class="card-front">
						<form action="" method="post">
							<div class="center-wrap">
								<h4 class=>Iniciar sesión</h4>
								<span style="font-size:12px">para entrar a admin email=admin@mail.com pass= cualquiera</span>
								<div class="form-group">
									<input type="email" name="logemail" class="form-style" placeholder="Correo electrónico" id="logemail" required autocomplete="off">
									<i class="input-icon uil uil-at"></i>
								</div>	
								<div class="form-group">
									<input type="password" name="logpass" class="form-style" placeholder="Contraseña" id="logpass" required autocomplete="off">
									<i class="input-icon uil uil-lock-alt"></i>
								</div>
								<?php
								if(isset($_POST['log-in'])){
									$logemail		     = mysqli_real_escape_string($conn,(strip_tags($_POST["logemail"],ENT_QUOTES)));//Escanpando caracteres 
									$logpass		     = mysqli_real_escape_string($conn,(strip_tags($_POST["logpass"],ENT_QUOTES)));//Escanpando caracteres 
									if($logemail=="admin@mail.com"){
										header("location: admin.php",TRUE,301);
										die();
									}else{
										$log_in = mysqli_query($conn, "SELECT * FROM usuario WHERE user_correo='$logemail' AND user_pass='$logpass'");
										if(mysqli_num_rows($log_in)){
											session_start();
											$_SESSION["email"]=$logemail;
											header("location: home.php",TRUE,301);
											die();
										}else{
											echo '<div class="alert red-alert" id="close"><button type="button"  onclick="remove()" data-dismiss="alert" aria-hidden="true">&times;</button>Usuario o contraseña incorrectos</div>'; 
										}
									}
								}
								?>
								<input type="submit" class="btn" name="log-in" value="continuar" onclick="remove()"></input>
							</div>
						</form>
					</div>
					<div class="card-back">
						<form action="" method="post">
							<div class="center-wrap">	
								<h4 >Suscribirse</h4>
								<div class="form-group">
									<input type="text" name="signname" class="form-style" placeholder="Nombre completo" id="signname" required autocomplete="off">
									<i class="input-icon uil uil-user"></i>
								</div>	
								<div class="form-group">
									<input type="text" name="signusername" class="form-style" placeholder="Nombre de usuario" id="usersignname" required autocomplete="off">
									<i class="input-icon uil uil-user"></i>
								</div>	
								<div class="form-group">
									<input type="email" name="signemail" class="form-style" placeholder="Correo electrónico" id="signemail" required autocomplete="off">
									<i class="input-icon uil uil-at"></i>
								</div>	
								<div class="form-group">
									<input type="password" name="signpass" class="form-style" placeholder="Contraseña" id="signpass" required autocomplete="off">
									<i class="input-icon uil uil-lock-alt"></i>
								</div>
								<?php
									if(isset($_POST['sign-up'])){
										$signemail		     = mysqli_real_escape_string($conn,(strip_tags($_POST["signemail"],ENT_QUOTES)));//Escanpando caracteres 
										$signpass		     = mysqli_real_escape_string($conn,(strip_tags($_POST["signpass"],ENT_QUOTES)));//Escanpando caracteres 
										$signname		     = mysqli_real_escape_string($conn,(strip_tags($_POST["signname"],ENT_QUOTES)));//Escanpando caracteres 
										$signusername		     = mysqli_real_escape_string($conn,(strip_tags($_POST["signusername"],ENT_QUOTES)));//Escanpando caracteres 
										

										$sign_up = mysqli_query($conn, "SELECT * FROM usuario WHERE user_correo='$signemail'");
										if(mysqli_num_rows($sign_up)){
											echo '<div class="alert red-alert" id="close"><button type="button" onclick="remove()" data-dismiss="alert" aria-hidden="true">&times;</button>Ya hay un usuario registrado con este correo</div>';
										}else{
											$insert = mysqli_query($conn, "INSERT INTO usuario(user_nombre, user_correo, user_pass,user_uname)
																				VALUES('$signname','$signemail', '$signpass','$signusername')") or die(mysqli_error());
											if($insert){
												echo '<div class="alert green-alert" id="close"><button type="button" onclick="remove()" data-dismiss="alert" aria-hidden="true">&times;</button>Registro completo</div>';
											}else{
												echo '<div class="alert red-alert" id="close"><button type="button" onclick="remove()" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo registrar, contacta a soporte, o mejor no lo hagas, no nos pagan lo suficiente para atender tus problemas</div>';
											}
										}
									}
								?>
								<input type="submit" class="btn" name="sign-up" value="continuar" style="margin-top:0" onclick="remove()"></input>
							</div>
						</form>
					</div>
				</div>
			</div>
	    </div>
	</section>

	<footer style="background-color: hsl(240, 86%, 8%);">
        <div class="social-media">
            <a href=""><img src="./media/landin_page/social-media/fb.png" alt="facebook"></a>
            <a href=""><img src="./media/landin_page/social-media/twitter.png" alt="twiter"></a>
            <a href=""><img src="./media/landin_page/social-media/youtube.png" alt="youtube"></a>
            <a href=""><img src="./media/landin_page/social-media/instagram.png" alt="instagram"></a>
        </div>
        <p>&copy; 2022 Cinex Ltda. Todos los derechos reservados</p>
    </footer>
	<script type="text/javascript">
		function remove(){
			document.getElementById("close").remove();
		}
	</script>
</body>
</html>