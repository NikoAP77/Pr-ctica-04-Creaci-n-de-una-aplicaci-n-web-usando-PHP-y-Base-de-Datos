<?php
session_start();
$codigoAdmin = $_SESSION['codigo'];
$rol = $_SESSION['rol'];
if ((!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE)&&(!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE)) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
  }
?>

<?php
include '../../../config/conexionBD.php';
$contraseña = $_POST['contrasena1'];
$contraseña2 = $_POST['contrasena2'];
$codigo = $_POST['codigo'];
//echo "<p>Contraseña:$contraseña</p>";  
//echo "<p>Contraseña:$contraseña2</p>";  
$nuevaContraseña = MD5($contraseña2);
//echo "$nuevaContraseña";
if ($rol == 'admin') {
    $sql = "UPDATE usuario SET usu_password ='$nuevaContraseña' WHERE usu_codigo = '$codigo'";

    if ($conn->query($sql) === TRUE) {
        echo "La contraseña ha sido actualizada correctamente";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    echo "<a href='../../vista/admin/usuarios.php'>Regresar</a>";
} else {
    if ($codigoAdmin == $codigo) {
        $sql = "UPDATE usuario SET usu_password ='$nuevaContraseña' WHERE usu_codigo = '$codigo'";

        if ($conn->query($sql) === TRUE) {
            echo "La contraseña ha sido actualizada correctamente";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    echo "<a href='../../vista/user/miCuenta.php'>Regresar</a>";
}
$conn->close();
?>