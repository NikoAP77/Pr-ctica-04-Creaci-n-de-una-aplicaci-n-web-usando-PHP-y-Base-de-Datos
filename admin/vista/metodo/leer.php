<?php
session_start();
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
    <title>Document</title>
    <link href="../../../config/estiloLogin.css" rel="stylesheet" />
    <link href="../../../config/mensajesRecibidos.css" rel="stylesheet" />
</head>

<body>
    <?php

    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM correos WHERE cor_codigo = '$codigo'";

    include '../../../config/conexionBD.php';


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


            ?>
            <form id="form" method='POST' action='../user/index.php'>
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

                <label for="correo0">Remitente</label>
                <input type="text" id="correo0" name="correo0" value="<?php echo $row2["usu_correo"] ?>" disabled />
                <br>

                <label for="correo">Destinatario</label>
                <input type="text" id="correo" name="correo" value="<?php echo $row3["usu_correo"] ?>" disabled />
                <br>

                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto" value="<?php echo $row["cor_asunto"]; ?>" disabled />
                <br>

                <label for="mensaje">Mensaje</label>
                <input type="textarea" id="mensaje" name="mensaje" value="<?php echo $row["cor_mensaje"]; ?>" disabled />
                <br>

                <input type="submit" id="regresar" name="regresar" value="Regresar" />
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