<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "cinex";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$pelicula = mysqli_query($conn,"SELECT * FROM pelicula");
$usuario = mysqli_query($conn,"SELECT * FROM usuario");
?>