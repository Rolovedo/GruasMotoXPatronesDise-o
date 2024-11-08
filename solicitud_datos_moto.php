<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos de la Moto - Solicitud de Servicio</title>
</head>
<body>
    <h2>Datos de la Moto</h2>
    <form action="solicitud_resumen.php" method="post">
        <label for="tipo_moto">Tipo de Moto:</label>
        <input type="text" name="tipo_moto" required>
        <label for="cilindraje">Cilindraje:</label>
        <input type="text" name="cilindraje" required>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required>
        <label for="soat">SOAT:</label>
        <select name="soat" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>
        <label for="placa">Placa:</label>
        <input type="text" name="placa" required>
        <button type="submit">Continuar</button>
    </form>
</body>
</html>