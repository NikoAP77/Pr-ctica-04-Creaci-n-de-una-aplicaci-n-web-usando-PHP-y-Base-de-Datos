<?php
session_start();
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$codigo = $_SESSION['codigo'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Mensajes Recibidos</title>
    <script type="text/javascript" src="../../controladores/js/buscarre.js"></script>
    <link href="../../../config/mensajesRecibidos.css" rel="stylesheet" />


</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="enviarCorreo.php">Nuevo Mensaje</a></li>
                <li><a href="mensajesEnviados.php">Mensajes Enviados</a></li>
                <li><a href="miCuenta.php">Mi Cuenta</a></li>
                <li id="cerrar"><a href='../../../config/cerrar_sesion.php'>Cerrar Sesion</a></li>

            </ul>
        </nav>
    </header>

    <section>
    <h6> <img src="../../../public/usu.png"><br> <?php echo  $nombre . ' ' . $apellido ?></h6>
    </section>



    <section>
        <br>
        <h1>Mensajes Recibidos</h1>
    </section>
    
    
    <input autofocus type="text" id="buscar" name="buscar" value="" placeholder="Buscar por remitente" onkeyup="buscarPorCorreo()" />


    <table style="width:100%" id="info">
        <tr>
            <th>Fecha</th>
            <th>Remitente</th>
            <th>Asunto</th>
            <th>Leer</th>
        </tr>

        <?php

        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM correos WHERE cor_eliminado='N' AND cor_usu_destinatario = $codigo ORDER BY cor_fecha_hora DESC;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigoRemitente = $row['cor_usu_remitente'];
                $sqlcorreo = "SELECT usu_correo FROM usuario WHERE usu_codigo = $codigoRemitente";
                $remitente = $conn->query($sqlcorreo);
                $row2 = $remitente->fetch_assoc();
                echo "<tr>";
                echo "   <td>" . $row["cor_fecha_hora"] . "</td>";
                echo "   <td>" . $row2['usu_correo'] . "</td>";
                echo "   <td>" . $row['cor_asunto'] . "</td>";
                echo "   <td>" . "<a href = '../metodo/leer.php?codigo=" . $row['cor_codigo'] . "'>" . "Leer</a>" . "</td>";
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