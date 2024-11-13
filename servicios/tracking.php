<?php
session_start();
include '../includes/conexion_db.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../auth/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rastreo de Servicio - Grúas Moto X</title>
    <link rel="stylesheet" href="../assets/css/style_solicitud.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Rastreo de Servicio</h1>
        <!-- Aquí irá el contenido futuro del rastreo -->
        <a href="../index.php" class="btn-home">Volver al Inicio</a>
    </div>
</body>
</html> 