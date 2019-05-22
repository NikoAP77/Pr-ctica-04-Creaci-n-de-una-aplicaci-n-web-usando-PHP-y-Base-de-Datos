<?php
session_start();
include '../../../config/conexionBD.php';

$codigo = $_SESSION['codigo'];
$imagen = addslashes(file_get_contents($_FILES['foto']["tmp_name"]));

$sql = "UPDATE usuario SET usu_foto = '$imagen' WHERE usu_codigo = $codigo";
$result= $conn->query($sql);


if($result === TRUE){
    echo "Se a creado Correctamente";
}else{
    echo "No se creo";
}

$conn->close();
?>

