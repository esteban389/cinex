<?php
include "database/conexion.php";

function createCard($img,$name){
  $element = '
        <a href="movie.php?movieName='.$name.'">
            <div class="movie">
                <img src="./media/movies/'.$img.'" alt="'.$name.'">
            </div>
        </a>
  ';
  echo $element;
}
?>