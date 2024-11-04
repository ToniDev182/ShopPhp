<?php

session_start(); // iniciamos la sesion


// Muestra el mensaje si existe
if (isset($_SESSION['mensaje'])) {
    echo "<p>" . ($_SESSION['mensaje']) . "</p>";
    unset($_SESSION['mensaje']); // Elimina el mensaje para que no se muestre de nuevo
}

// Procesamos el formulario
if (isset($_POST['username']) && isset($_POST['password'])) {

    // Definimos a los usuarios
    $roles = [
        "user" => [
            "usuario" => "user",
            "pass" => password_hash("user", PASSWORD_DEFAULT),
            "rol" => "user"
        ],
        "admin" => [
            "usuario" => "admin",
            "pass" => password_hash("admin", PASSWORD_DEFAULT),
            "rol" => "admin"
        ],
        "client" => [
            "usuario" => "client",
            "pass" => password_hash("client", PASSWORD_DEFAULT),
            "rol" => "client"
        ]
    ];

    $usuario = $_POST['username'];
    $password = $_POST['password'];
    $encontrado = false;  // bandera para verificar si el usuario existe

    foreach ($roles as $rol) {
        if($rol["usuario"] == $usuario && password_verify($password, $rol["pass"])) {
            $_SESSION["username"] = $usuario;
            $_SESSION["rol"] = $rol["rol"];
            $encontrado = true;
            // hemos verificado y almacenado a nuestro usuario, lo mandamos a el catalogo de productos
            header('Location: productos.php');
            exit;
        }
    }

    if(!$encontrado) {
        $_SESSION['mensaje'] = "Usuario y/o contraseña incorrectos";
        header('Location: login.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="Css/login.css">
</head>
<body>
<!-- Formulario de inicio de sesión -->
<form method="post">
    <label for="username">Nombre: </label>
    <input type="text" id="username" name="username" required>
    <br><br>
    <label for="password">Contraseña: </label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>

