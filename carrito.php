<?php

session_start(); // retoma la sesion

// Redirige al login si el usuario no ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// elimina un producto si recibe su indice
if (isset($_GET['eliminar'])) {
    $indice = $_GET['eliminar'];
    if (isset($_SESSION['carrito'][$indice])) {
        unset($_SESSION['carrito'][$indice]);

        // reorganiza el array del carrito para no dejar espacios en blanco supuestamente ocupados
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Carrito de Compras</title>
    <link rel="stylesheet" href="Css/carrito.css">
</head>
<body>

<h2>Tu Carrito</h2>

<?php
$totalFactura = 0;

if (!empty($_SESSION['carrito'])): // Verificamos si el carrito no está vacío
    foreach ($_SESSION['carrito'] as $indice => $producto):
        $totalFactura += $producto["total"]; // Sumar el total de cada producto
        ?>

        <div>
            <h3>Nombre: <?php echo ($producto["nombre"]); ?></h3>
            <h3>Precio: €<?php echo ($producto["precio"]); ?></h3>
            <h3>Cantidad: <?php echo ($producto["cantidad"]); ?></h3>
            <h3>Subtotal: €<?php echo ($producto["subtotal"]); ?></h3>
            <h3>Descuento: €<?php echo ($producto["descuento"]); ?></h3>
            <h3>Total: €<?php echo ($producto["total"]); ?></h3>
            <a href="?eliminar=<?php echo $indice; ?>">Eliminar</a> <!-- Enlace para eliminar el producto -->
            <hr>
        </div>

    <?php
    endforeach;
    echo "<h4>Total de la factura: €" . ($totalFactura) . "</h4>";
else:
    echo "<p>El carrito está vacío.</p>";
endif;
?>

<!-- Enlaces para regresar a productos y cerrar sesión -->
<a href="productos.php">Continuar comprando</a><br>

<form method="POST" action="logout.php">
    <button type="submit" name="reset">Cerrar Sesión</button>
</form>

</body>
</html>
