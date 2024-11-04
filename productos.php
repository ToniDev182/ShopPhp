<?php

session_start(); // iniciamos la sesion

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Si no estas logueado, para el login que vas mi rey
    exit();
}

// vamos a definir el array de productos

$productos = [
    ["nombre" => "Smartphone", "precio" => 200],
    ["nombre" => "Laptop", "precio" => 800],
    ["nombre" => "Tablet", "precio" => 300],
    ["nombre" => "Cámara Digital", "precio" => 450],
    ["nombre" => "Smartwatch", "precio" => 150],
    ["nombre" => "Auriculares", "precio" => 50],
    ["nombre" => "Altavoz Bluetooth", "precio" => 75],
    ["nombre" => "Monitor", "precio" => 250]
];


// Recibir el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productoSeleccionado = $productos[$_POST["producto"]];
    $cantidad = isset($_POST["cantidad"]) ? (int)$_POST["cantidad"] : 1;

    // calcular subtotal, descuento y cantidad

    $productoSeleccionado['cantidad'] = $cantidad;
    $productoSeleccionado['subtotal'] = $productoSeleccionado['precio'] * $cantidad;

// verificar si se debe aplicar el descuento

    $descuento = isset($_POST['descuento']) ? $productoSeleccionado['subtotal'] * 0.10 : 0;
    $productoSeleccionado['descuento'] = $descuento;
    $productoSeleccionado['total'] = $productoSeleccionado['subtotal'] - $descuento;

// agregar al carrito

    $_SESSION['carrito'][] = $productoSeleccionado;

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="Css/productos.css">
</head>
<body>

<h2>Productos Disponibles</h2>

<form method="POST" action="">
    <label for="producto">Selecciona un producto:</label>
    <br>
    <select name="producto" id="producto">
        <?php foreach ($productos as $indice => $producto): ?>
            <option value="<?php echo $indice; ?>"><?php echo($producto['nombre']. " - € ".$producto['precio']); ?> </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <label for="cantidad">Cantidad:</label>
    <br>
    <input type="number" name="cantidad" id="cantidad" value="1" min="1">
    <br><br>
    <label>
        <input type="checkbox" name="descuento" value="1">
        Aplicar descuento del 10%
    </label>
    <br><br>
    <button type="submit">Agregar al Carrito</button>

</form>
<br>
<form method="POST" action="logout.php">
    <button type="submit" name="reset">Cerrar Sesión</button>
</form>

<br>
<!-- Enlaces para ver el carrito y cerrar sesión -->
<a class="button" href="carrito.php">Ver Carrito</a><br>


</body>
</html>

