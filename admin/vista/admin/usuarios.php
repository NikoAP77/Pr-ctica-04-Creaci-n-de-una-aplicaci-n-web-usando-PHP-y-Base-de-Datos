<?php
session_start();
$codigo = $_SESSION['codigo'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link href="../../../config/mensajesRecibidos.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="usuarios.php">Usuarios</a></li>
                <li id="cerrar"><a href='../../../config/cerrar_sesionAdmin.php'>Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario WHERE usu_codigo= $codigo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()
            ?>
            <br>
            <br>
            <h6> <img width=115px height="115px" margin="20px" src="data:image/jpg;base64,<?php echo base64_encode($row['usu_foto']) ?>">
                <h6><?php echo  $row['usu_nombres'] . ' ' . $row['usu_apellidos'] ?></h6>
            <?php
        }
        ?>

            <form id="fr" method="POST" action="../../controladores/user/cargarFoto.php"  enctype="multipart/form-data">    
            <input type="file" id="foto" name="foto" />
            <br>
            <input type="submit" id="cargar" value="cargar" name="cargar" />
            </form>
    </section>

    <section>
        <br>
        <h1>Usuarios</h1>
    </section>

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
        //echo"<a href ='../../../public/vista/login.html'>Cerrar Sesion</a>"; 
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario WHERE usu_eliminado='N';";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row["usu_cedula"] . "</td>";
                echo "   <td>" . $row['usu_nombres'] . "</td>";
                echo "   <td>" . $row['usu_apellidos'] . "</td>";
                echo "   <td>" . $row['usu_direccion'] . "</td>";
                echo "   <td>" . $row['usu_telefono'] . "</td>";
                echo "   <td>" . $row['usu_correo'] . "</td>";
                echo "   <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo "   <td>" . "<a href = '../metodo/eliminar.php?codigo=" . $row['usu_codigo'] . "'>" . "Eliminar</a>" . "</td>";
                echo "   <td>" . "<a href = '../metodo/actualizar.php?codigo=" . $row['usu_codigo'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = '../metodo/cambiarContra.php?codigo=" . $row['usu_codigo'] . "'>" . "Actualizar Contraseña</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
    <footer>
        <h5>Copyright</h5>
        <h5>Nicolas A;azco</h5>
        <h5>2019</h5>
    </footer>
</body>

</html>