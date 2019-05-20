<?php
session_start();
$codigo = $_SESSION['codigo'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
  header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Modificar Datos Usuario</title>
  <link href="../../../config/estiloLogin.css" rel="stylesheet" />
  <link href="../../../config/mensajesRecibidos.css" rel="stylesheet" />
</head>

<body>
  <header>
    <section>
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="enviarCorreo.php">Nuevo Mensaje</a></li>
        <li><a href="mensajesEnviados.php">Mensajes Enviados</a></li>
        <li><a href="miCuenta.php">Mi Cuenta</a></li>
        <li id="cerrar"><a href='../../../config/cerrar_sesion.php'>Cerrar Sesion</a></li>
      </ul>
    </nav>
    </section>
  </header>

  <?php
  include '../../../config/conexionBD.php';
  //$codigo = $_GET['codigo']; 


  $sql = "SELECT * FROM usuario WHERE usu_codigo = $codigo";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      ?>
      <form id="form" method="POST">
        <br>
        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo; ?>" />
        <label for="cedula">Cedula</label>
        <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled placeholder="Ingrese la cedula ..." />
        <br>
        <label for="nombres">Nombres</label>
        <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
                                                              ?>" disabled placeholder="Ingrese los dos nombres ..." />
        <br>
        <label for="apellidos">Apelidos</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
                                                                  ?>" disabled placeholder="Ingrese los dos apellidos ..." />
        <br>
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];
                                                                  ?>" disabled placeholder="Ingrese la dirección ..." />
        <br>
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"];
                                                                ?>" disabled placeholder="Ingrese el teléfono ..." />
        <br>
        <label for="fecha">Fecha Nacimiento</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo
                                                                                $row["usu_fecha_nacimiento"]; ?>" disabled placeholder="Ingrese la fecha de nacimiento ..." />
        <br>
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled placeholder="Ingrese el correo electrónico ..." />
        <br>

        <a href="../metodo/actualizar.php?codigo=<?php echo $codigo; ?>"><input type="button" id="modificar" name="modificar" value="Modificar" /></a>
        <a href="../metodo/cambiarContra.php?codigo=<?php echo $codigo; ?>"><input type="button" id="cambiar" name="cambiar" value="Cambiar Contrasena" /></a>
      </form>
    <?php
  }
} else {
  echo "<p>Ha ocurrido un error inesperado !</p>";
  echo "<p>" . mysqli_error($conn) . "</p>";
}

$conn->close();
?>
</body>

</html>