<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Personales - Solicitud de Servicio</title>
</head>
<body>
    <h2>Datos Personales</h2>
    <form action="solicitud_datos_moto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="celular">Celular:</label>
        <input type="text" name="celular" required>
        <label for="direccion">Dirección Actual:</label>
        <input type="text" name="direccion" required>
        <label for="destino">Destino:</label>
        <input type="text" name="destino" required>
        <button type="submit">Siguiente</button>
    </form>
</body>
</html>
