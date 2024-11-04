<?php
session_start(); // Inicia o reanuda la sesión actual

if (isset($_POST['reset'])) { // Verifica si se ha activado el cierre de sesión
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión actual

    session_start(); // Reinicia la sesión para poder almacenar un mensaje temporal
    $_SESSION['mensaje'] = "Sesión cerrada correctamente"; // Define el mensaje de cierre de sesión

    header("Location: login.php"); // Redirige a la página principal
    exit(); // Termina el script
}
