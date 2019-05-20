<?php
  session_start();
  if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /SistemaDeGestion/public/vista/login.html");        
}
?>

<!DOCTYPE html>
   <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
     <title>Document</title>
     <link href="../../../config/estiloLogin.css" rel="stylesheet"/>
   </head>
   <body> 
    <?php
    
      $codigo = $_GET['codigo']; 
      $sql= "SELECT * FROM usuario WHERE usu_codigo = '$codigo'";

      include '../../../config/conexionBD.php'; 
      $result= $conn->query($sql);        
      
       if($result->num_rows> 0) {
        while($row= $result->fetch_assoc()) {
          ?>
            <form method='POST' action='../../controladores/contrEliminar.php'>
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

            <label for="cedula">Cedula</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"
            disabled/>
            <br>

            <label for="nombres">Nombres</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];?>" 
            disabled/>
            <br>

            <label for="apellidos">Apelidos</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];?>"
            disabled/>
            <br>

            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];?>" 
            disabled/>
            <br>

            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"];?>" 
            disabled/>
            <br>

            <label for="fecha">Fecha Nacimiento</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" 
            disabled/>
            <br>

            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"
            disabled/>
            <br>

            <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
          <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />     
    </form>
  <?php
}
    } else{
      echo "<p>Ha ocurrido un error inesperado !</p>";
      echo "<p>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
      ?>
   </body>
   </html>