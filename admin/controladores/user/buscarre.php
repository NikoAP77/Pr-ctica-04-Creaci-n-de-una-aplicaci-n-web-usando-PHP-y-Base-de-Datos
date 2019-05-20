<?php
session_start();
$codigoAdmin = $_SESSION['codigo'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <table style="width:100%">
        <tr>
            <th>Fecha</th>
            <th>Remitente</th>
            <th>Asunto</th>
            <th>Leer</th>
        </tr>
        <?php
        //incluit conexion a la base de datos
        //include "../config/conexionBD.php";
        $correo = $_GET['correo'];
        //echo "Hola " .$cedula;

        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario WHERE usu_eliminado='N' AND usu_correo LIKE '$correo%';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql2 = "SELECT * FROM correos WHERE cor_eliminado='N' AND cor_usu_remitente=$row[usu_codigo] AND cor_usu_destinatario=$codigoAdmin;";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $sqlcorreo = "SELECT usu_correo FROM usuario WHERE usu_codigo =$row2[cor_usu_remitente]";
                $remitente = $conn->query($sqlcorreo);
                if ($remitente != null) {
                    $row3 = $remitente->fetch_assoc();
                    echo "<tr>";
                    echo "   <td>" . $row2['cor_fecha_hora'] . "</td>";
                    echo "   <td>" . $row3['usu_correo'] . "</td>";
                    echo "   <td>" . $row2['cor_asunto'] . "</td>";
                    echo "   <td> Leer</td>";
                    echo "</tr>";
                } else {
                    echo "<tr>";
                    echo "   <td colspan='4'> No existen mensajes del correo $correo </td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='4'> No existen mensajes del correo $correo </td>";
            echo "</tr>";
        }
        ?>
</body>

</html>