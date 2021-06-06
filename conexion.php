<?php
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = '';
    $basedatos = "unidad3";
    $port = 3306;

   // Create connection
 
 //  $con = mysqli_connect('127.0.0.1','usuario1','1121');
//mysqli_select_db('unidad3', $con)
$conn = new mysqli($servidor, $usuario, $contraseña, $basedatos,$port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

