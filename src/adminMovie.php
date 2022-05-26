<?php
include("database/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>section{min-height: 85vh; display:flex !important; align-items:center}
    .container{width: auto; margin: 0 auto}
    .form-horizontal{width:100%}
    </style>
    <link rel="stylesheet" href="./styles/css/main.css">
    <title>Administrador</title>
</head>
<body>
    <nav class="home-nav">
        <div>
            <a href="index.html">
                <h2>Cinex</h2>
            </a>
        </div>
        <div>
            <a href="adminAdd.php" style="color: white;" style="margin-right:1rem">Agregar</a>
            <a href="admin.php" style="color: white;">Panel de Administrador</a>
        </div>
    </nav>
    <section>
        <div class="container admin-edit">
            
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($conn,(strip_tags($_GET["peli_id"],ENT_QUOTES)));
			$sql = mysqli_query($conn, "SELECT * FROM pelicula WHERE peli_id='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: admin.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$codigo		     = mysqli_real_escape_string($conn,(strip_tags($_POST["codigo"],ENT_QUOTES)));//Escanpando caracteres 
				$nombre		     = mysqli_real_escape_string($conn,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$descripcion	 = mysqli_real_escape_string($conn,(strip_tags($_POST["descripcion"],ENT_QUOTES)));//Escanpando caracteres 
				$fecha	 = mysqli_real_escape_string($conn,(strip_tags($_POST["fecha_estreno"],ENT_QUOTES)));//Escanpando caracteres 
				$foto	     = mysqli_real_escape_string($conn,(strip_tags($_POST["foto"],ENT_QUOTES)));//Escanpando caracteres 

				$update = mysqli_query($conn, "UPDATE pelicula SET peli_nombre='$nombre', peli_descripcion='$descripcion', peli_date='$fecha', peli_foto='$foto' WHERE peli_id='$nik'") or die(mysqli_error());
				if($update){
					header("Location: adminMovie.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>


            <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Código</label>
                        <div class="col-sm-2">
                            <input type="text" name="codigo" value="<?php echo $row ['peli_id']; ?>" class="form-control" placeholder="NIK" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-4">
                            <input type="text" name="nombre" value="<?php echo $row ['peli_nombre']; ?>" class="form-control" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Descripción</label>
                        <div class="col-sm-4">
                            <input type="text" name="descripcion" value="<?php echo $row ['peli_descripcion']; ?>" class="form-control" placeholder="descripcion" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha de estreno</label>
                        <div class="col-sm-4">
                            <input type="text" name="fecha_estreno" value="<?php echo $row ['peli_date']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Foto</label>
                        <div class="col-sm-3">
                            <textarea name="foto" class="form-control" placeholder="Foto"><?php echo $row ['peli_foto']; ?></textarea>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
                            <a href="admin.php" class="btn btn-sm btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
        </div>

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
</body>
</html>