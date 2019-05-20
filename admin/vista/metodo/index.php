<?php
  session_start();
  if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /SistemaDeGestion/public/vista/login.html");        
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
</head>
<body>

    <table style="width:100%">
    <tr>
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Fecha Nacimiento</th>
        <th>Eliminar</th> 
        <th>Modificar</th> 
        <th>Cambiar Contraseña</th>
    </tr>
    
<?php
echo"<a href ='../../../public/vista/login.html'>Cerrar Sesion</a>"; 
    include '../../../config/conexionBD.php'; 
    $sql= "SELECT * FROM usuario WHERE usu_eliminado='N';" ;
    
    $result= $conn->query($sql);
    
    if($result->num_rows> 0) {
        while($row= $result->fetch_assoc()) {
            echo"<tr>";
            echo"   <td>". $row["usu_cedula"] . "</td>";
            echo"   <td>". $row['usu_nombres'] ."</td>";
            echo"   <td>". $row['usu_apellidos'] . "</td>";
            echo"   <td>". $row['usu_direccion'] . "</td>";
            echo"   <td>". $row['usu_telefono'] . "</td>";
            echo"   <td>". $row['usu_correo'] . "</td>";
            echo"   <td>". $row['usu_fecha_nacimiento'] . "</td>";
            echo"   <td>". "<a href = 'eliminar.php? codigo=".$row['usu_codigo']."'>"."Eliminar</a>"."</td>";
            echo"   <td>". "<a href = 'actualizar.php? codigo=".$row['usu_codigo']."'>"."Actualizar</a>"."</td>"; 
            echo"   <td>". "<a href = 'cambiarContra.php? codigo=".$row['usu_codigo']."'>"."Actualizar Contraseña</a>"."</td>";
            echo"</tr>";
        }
    } else{
        echo"<tr>";
        echo"   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
        echo"</tr>";
    }
    
    $conn->close();
?>
</table>
</body>
</html>