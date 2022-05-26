<?php
ob_start();
session_start();
if(!$_SESSION["email"] || empty($_SESSION["email"])){
    header("location: index.html",TRUE,301);
    die();
}
$mail = $_SESSION["email"];
include "database/conexion.php";
include "funciones.php";
$logged_user = mysqli_query($conn, "SELECT * FROM usuario WHERE user_correo='$mail'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/css/main.css">
    <style>
        body{
            background: transparent;
            background-image: url("./media/home/bg-gradient.png");
            background-attachment: fixed;
        }
    </style>
    <title>Cinex | tus películas favoritas en un solo lugar</title>
</head>
<body>
    
    <nav class="home-nav" id="topnav" style="transition: all 0.5s">
        <div class="nav-container">
            <div>
                <h2>Cinex</h2>
            </div>
            <div class="nav-user">
                <img src="./media/user/usuario.png" alt="Imagen de usuario">
                <button class="nav-dropdown">
                    <?php
                        echo mysqli_fetch_array($logged_user)["user_uname"];
                    ?>
                </button>
                <div class="dropdown-content" id="drop-cont">
                    <?php
                    if(isset($_GET['close_session'])){
                        session_start();
                        session_destroy();
                        header("location: index.html",TRUE,301);
                        die();
                    }
                    ?>
                    <a href='home.php?close_session=true'>cerrar sesión</a>
                    </input>
                </div>
            </div>
        </div>
    </nav>

    <section class="highlight-movie">
        <div class="highlight-wrap">
            <div class="highlight-container">
                <div class="highlight-text">
                    <img src="./media/home/highlight-text.png" alt="Nombre película">
                    <div>
                        <h6>explora la coleccion</h6>
                        <p>¡Alohomora! Acabas de ser admitido en el Mundo Mágico.</p>
                    </div>
                </div>
                <a href="" class="btton">más info</a>
            </div>
        </div>
    </section>

    <section class="home-movies">
        <?php
            while ($row = mysqli_fetch_array($pelicula)){
				createCard($row['peli_foto'],$row['peli_nombre']);
			}
        ?>
    </section>

    <footer>
        <div class="social-media">
            <a href=""><img src="./media/landin_page/social-media/fb.png" alt="facebook"></a>
            <a href=""><img src="./media/landin_page/social-media/twitter.png" alt="twiter"></a>
            <a href=""><img src="./media/landin_page/social-media/youtube.png" alt="youtube"></a>
            <a href=""><img src="./media/landin_page/social-media/instagram.png" alt="instagram"></a>
        </div>
        <p>&copy; 2022 Cinex Ltda. Todos los derechos reservados</p>
    </footer>
    <script type="text/javascript">
        var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
			var currentScrollPos = window.pageYOffset;
			if (prevScrollpos > currentScrollPos) {
			document.getElementById("topnav").style.top = "0";
			} else {
			document.getElementById("topnav").style.top = "-200px";
			}
			prevScrollpos = currentScrollPos;
		}

        const b2tb = document.getElementById("topnav");

		const scrollContainer = () => {
		 	return document.documentElement || document.body;
		};
        // ------
		const navbar = document.querySelector('.home-nav');
        window.onscroll = () => {
            if (window.scrollY > 400) {
                navbar.classList.add('nav-active');
            } else {
                navbar.classList.remove('nav-active');
            }
        };
    </script>
</body>
</html>