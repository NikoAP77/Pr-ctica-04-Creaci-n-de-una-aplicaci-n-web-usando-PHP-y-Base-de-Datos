<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
  header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Modificar datos de persona</title>
  <link href="../../../config/estiloLogin.css" rel="stylesheet" />
  <link href="../../../config/mensajesRecibidos.css" rel="stylesheet" />
</head>

<body>
  <?php
  include '../../../config/conexionBD.php';
  $codigo = $_GET["codigo"];

  $sql = "SELECT * FROM usuario WHERE usu_codigo = '$codigo'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if ($row['usu_rol'] == 'user') {
        ?>

        <form id="form" method="POST" action="../../controladores/admin/contrCambiarContra.php">
          <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

          <label for="cedula">Contraseña Actual</label>
          <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..." />
          <br>

          <label for="cedula">Contraseña Nueva</label>
          <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..." />
          <br>

          <input type="submit" id="modificar" name="modificar" value="Modificar" />
          <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
        </form>
      <?php
    } else {
      echo "<p>No se puede realizar esta accion a un usuario Admin!</p>";
      echo "<br>";
      echo "<a href='../admin/usuarios.php'>Regresar</a>";
    }
  }
} else {
  echo "<p>Ha ocurrido un error inesperado !</p>";
  echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>
</body>

</html>