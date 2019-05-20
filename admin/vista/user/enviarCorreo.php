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
    <title>Enviar Correo</title>
    <link href="../../../config/mensajesRecibidos.css" rel="stylesheet" />
    <link href="../../../config/estiloLogin.css" rel="stylesheet" />
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

    <form id="form" method="POST" action='../../controladores/user/enviarCorreo.php'>
    <br>
        <label for="destinatario">Correo</label>
        <input type="text" id="destinatario" name="destinatario" value="" placeholder="Ingrese correo destinatario" required />
        <br>

        <label for="asunto">Asunto</label>
        <input type="text" id="asunto" name="asunto" value="" placeholder="Ingrese su asunto ..." required />
        <br>

        <label for="mensaje">Mensaje</label>
        <textarea id="area"type="text" id="mensaje" name="mensaje" value="" required>  </textarea>
        <br>

        <input type="submit" id="enviar" name="enviar" value="Enviar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" /></form>
    <br>

    <footer>
        <h5>Copyright</h5>
        <h5>Nicolas A;azco</h5>
        <h5>2019</h5>
    </footer>
</body>

</html>