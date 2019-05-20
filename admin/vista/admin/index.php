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
    <title>Mensajes Recibidos</title>
    <link href="../../../config/mensajesRecibidos.css" rel="stylesheet" />  
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="usuarios.php">Usuarios</a></li>
                <li id="cerrar"><a href='../../../config/cerrar_sesion.php'>Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <br>
        <h1>Mensajes Electronicos</h1>
    </section>

    <table style="width:100%">
        <tr>
            <th>Fecha</th>
            <th>Remitente</th>
            <th>Destinatario</th>
            <th>Asunto</th>
            <th>Eliminar</th>
        </tr>

        <?php

        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM correos WHERE cor_eliminado='N' ORDER BY cor_fecha_hora DESC;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $codigoRemitente = $row['cor_usu_remitente'];
                $sqlcorreo = "SELECT usu_correo FROM usuario WHERE usu_codigo = $codigoRemitente";
                $remitente = $conn->query($sqlcorreo);
                $row2 = $remitente->fetch_assoc();

                $codigoDestinatario = $row['cor_usu_destinatario'];
                $sqlcorreod = "SELECT usu_correo FROM usuario WHERE usu_codigo = $codigoDestinatario";
                $destinatario = $conn->query($sqlcorreod);
                $row3 = $destinatario->fetch_assoc();


                echo "<tr>";
                echo "   <td>" . $row["cor_fecha_hora"] . "</td>";
                echo "   <td>" . $row2['usu_correo'] . "</td>";
                echo "   <td>" . $row3['usu_correo'] . "</td>";
                echo "   <td>" . $row['cor_asunto'] . "</td>";
                echo "   <td>" . "<a href = 'eliminar.php?codigo=" . $row['cor_codigo'] . "'>" . "Eliminar</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='7'> No existen correos recibidos </td>";
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