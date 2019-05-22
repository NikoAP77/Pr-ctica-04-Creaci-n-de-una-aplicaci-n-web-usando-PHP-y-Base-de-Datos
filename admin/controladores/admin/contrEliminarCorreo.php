<?php
session_start();
$codigoAdmin = $_SESSION['codigo'];
$rol = $_SESSION['rol'];
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE) {
  header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Eliminar Correo</title>
</head>

<body>
  <?php
  //incluir conexión a la base de datos
  include '../../../config/conexionBD.php';

  $codigo = $_POST["codigo"];

  //Si voy a eliminar físicamente el registro de la tabla
  //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";

  date_default_timezone_set("America/Guayaquil");
  $fecha = date('Y-m-d H:i:s', time());
  if ($rol == 'admin') {
    $sql = "UPDATE correos SET cor_eliminado = 'S', cor_fecha_modificacion = '$fecha' WHERE cor_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
      echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
    } else {
      echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    echo "<a href='../../vista/admin/index.php'>Regresar</a>";
  } else {
    if ($codigoAdmin == $codigo) {
      $sql = "UPDATE correos SET cor_eliminado = 'S', cor_fecha_modificacion = '$fecha' WHERE cor_codigo = $codigo";

      if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
      } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
      }
    }
    echo "<a href='../../vista/admin/index.php'>Regresar</a>";
  }
  $conn->close();
  ?>
</body>
</html>