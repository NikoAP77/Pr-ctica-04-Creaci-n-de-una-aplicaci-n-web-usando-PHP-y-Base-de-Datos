<?php
$servername= "localhost";
$username="root";
$password="root";
$bdname= "hipermedial";

//Create Connection
$conn = new mysqli($servername, $username, $password, $bdname);
//Check connection
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}{
    //echo "Conexion Exitosa!! ;)";
}
?>