<?php
include "database/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="./styles/css/main.css">
    
    <title>Administrador</title>
    <style>section{min-height: 83vh;}</style>
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

    <?php
    if(isset($_GET['aksi']) == 'delete'){
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($conn,(strip_tags($_GET["nik"],ENT_QUOTES)));
        $cek = mysqli_query($conn, "SELECT * FROM pelicula WHERE peli_id='$nik'");
        if(mysqli_num_rows($cek) == 0){
            echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }
        else{
            $delete = mysqli_query($conn, "DELETE FROM pelicula WHERE peli_id='$nik'");
            if($delete){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
            }
        }
    }

    if(isset($_GET['aksiuser']) == 'delete'){
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($conn,(strip_tags($_GET["nik"],ENT_QUOTES)));
        $cek = mysqli_query($conn, "SELECT * FROM usuario WHERE user_id='$nik'");
        if(mysqli_num_rows($cek) == 0){
            echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }
        else{
            $delete = mysqli_query($conn, "DELETE FROM usuario WHERE user_id='$nik'");
            if($delete){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
            }
        }
    }
    ?>
    <section class="admin-container">
        <table>
            <h3>películas</h3>
            <tr>
                <th>No</th>
                <th>id</th>
                <th>nombre</th>
                <th>fecha de estreno</th>
                <th>descripción</th>
                <th>foto</th>
                <th>acciones</th>
            </tr>
            <?php
            if(mysqli_num_rows($pelicula) == 0){
                echo '<tr><td colspan="8">No hay datos.</td></tr>';
            }else{
                $no = 1;
                while($row = mysqli_fetch_assoc($pelicula)){
                    echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$row["peli_id"].'</td>
                            <td>'.$row["peli_nombre"].'</td>
                            <td>'.$row["peli_date"].'</td>
                            <td>'.$row["peli_descripcion"].'</td>
                            <td>'.$row["peli_foto"].'</td>
							<td>
								<a href="adminMovie.php?peli_id='.$row['peli_id'].'" title="Editar datos" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="admin.php?aksi=delete&nik='.$row['peli_id'].'"
                                title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['peli_nombre'].'?\')" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>';
                    $no++;
                }
            }
            ?>
        </table>

        <table style="margin-top:3rem">
            <h3>usuarios</h3>
            <tr>
                <th>No</th>
                <th>id</th>
                <th>nombre</th>
                <th>correo</th>
                <th>nombre de usuario</th>
                <th>acciones</th>
            </tr>
            <?php
            if(mysqli_num_rows($usuario) == 0){
                echo '<tr><td colspan="8">No hay datos.</td></tr>';
            }else{
                $no = 1;
                while($row = mysqli_fetch_assoc($usuario)){
                    echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$row["user_id"].'</td>
                            <td>'.$row["user_nombre"].'</td>
                            <td>'.$row["user_correo"].'</td>
                            <td>'.$row["user_uname"].'</td>
							<td>
								<a href="admin.php?aksiuser=delete&nik='.$row['user_id'].'"
                                title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['user_nombre'].'?\')" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>';
                    $no++;
                }
            }
            ?>
        </table>
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