# Tienda de Compras

## Descripción
La **Tienda de Compras** es una aplicación web que permite a los usuarios navegar por una selección de productos, agregarlos a un carrito de compras y gestionar su compra de manera sencilla. Esta aplicación se basa en PHP y utiliza sesiones para mantener la información del usuario y del carrito.

## Funcionalidades

- **Inicio de Sesión**: Los usuarios pueden iniciar sesión con un nombre de usuario y contraseña. La autenticación se maneja mediante un sistema de hash de contraseñas para mayor seguridad.
- **Navegación de Productos**: Los usuarios pueden ver una lista de productos disponibles con su nombre y precio.
- **Agregar al Carrito**: Los usuarios pueden seleccionar productos, especificar la cantidad y optar por un descuento del 10% al agregar productos a su carrito.
- **Visualización del Carrito**: Los usuarios pueden revisar el contenido de su carrito, incluyendo detalles sobre cada producto (nombre, precio, cantidad, subtotal, descuento y total).
- **Eliminar Productos**: Los usuarios pueden eliminar productos del carrito si así lo desean.
- **Cerrar Sesión**: Los usuarios pueden cerrar sesión, lo que eliminará sus datos de sesión y mostrará un mensaje de confirmación.

## Estructura del Proyecto

El proyecto se compone de los siguientes archivos:

- `login.php`: Página de inicio de sesión donde los usuarios ingresan sus credenciales.
- `productos.php`: Página que muestra los productos disponibles y permite agregarlos al carrito.
- `carrito.php`: Página que muestra los productos en el carrito y permite eliminarlos.
- `logout.php`: Página que cierra la sesión del usuario y redirige a la página de inicio de sesión.

## Requisitos

- PHP 7.0 o superior
- Un servidor web con soporte para PHP (por ejemplo, Apache o Nginx)
- Un navegador web para probar la aplicación

## Instrucciones de Instalación

1. Clona este repositorio en tu máquina local.
2. Coloca los archivos en el directorio raíz de tu servidor web.
3. Asegúrate de que el servidor esté configurado para ejecutar archivos PHP.
4. Accede a `login.php` a través de tu navegador para comenzar.

## Uso

1. Regístrate o utiliza un usuario existente para iniciar sesión.
2. Navega por los productos disponibles.
3. Selecciona los productos que deseas comprar y agréguelos al carrito.
4. Revisa tu carrito, elimina productos si es necesario y cierra sesión cuando termines.