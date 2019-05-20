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
  <title>Modificar datos de persona</title>
  <link href="../../../config/estiloLogin.css" rel="stylesheet"/>
  <link href="../../../config/mensajesRecibidos.css" rel="stylesheet" /> 
</head>

<body>
  <?php
    $codigo = $_GET["codigo"];
?>

<form id="form" method="POST" action="../../controladores/contrCambiarContra.php">
  <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

  <label for="cedula">Contraseña Actual</label>
  <input type="password" id="contrasena1" name="contrasena1" value="" required
  placeholder="Ingrese su contraseña actual ..."/>
  <br>

  <label for="cedula">Contraseña Nueva</label>
  <input type="password" id="contrasena2" name="contrasena2" value="" required
  placeholder="Ingrese su contraseña nueva ..."/>
  <br>

  <input type="submit" id="modificar" name="modificar" value="Modificar" />
  <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />

  </form>

</body>
</html>
        