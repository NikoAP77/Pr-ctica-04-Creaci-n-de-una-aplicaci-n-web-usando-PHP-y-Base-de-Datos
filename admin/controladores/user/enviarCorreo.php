<?php
  session_start();
  $codigo = $_SESSION['codigo'];
  if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /SistemaDeGestion/public/vista/login.html");        
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Enviar Correo</title>
    <style type="text/css" rel="stylesheet">
    </style>
 </head>
<body>

    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';                
    
    $destinatario= isset($_POST["destinatario"]) ? trim($_POST["destinatario"]) : null;
    $asunto= isset($_POST["asunto"]) ? trim($_POST["asunto"]) : null;    
    $mensaje= isset($_POST["mensaje"]) ? trim($_POST["mensaje"]) : null;
    
    $sql ="SELECT usu_codigo FROM usuario WHERE usu_correo = '$destinatario'";
    $result= $conn->query($sql);
    $row= $result->fetch_assoc();

    $codDestinatario = $row['usu_codigo'];

    $sql= "INSERT INTO correos VALUES(0, null, $codigo, $codDestinatario, '$asunto', '$mensaje', 'N', null)";        
    
    if($conn->query($sql) === TRUE) {
        echo"<p>Se ha enviado bien el mensaje!!!</p>";
    } else{
            echo"<p class='error'>Error: ". mysqli_error($conn) . "</p>";
    }            
        
    //cerrar la base de datos
    $conn->close();
    echo"<a href='../../vista/user/index.php'>Regresar</a>";
 ?>

</body>
<html>