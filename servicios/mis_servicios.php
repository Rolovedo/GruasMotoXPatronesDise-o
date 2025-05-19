<?php
session_start();
require_once '../includes/conexion_db.php';
require_once '../includes/servicios_db.php';
require_once '../includes/tabla_servicios.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Obtener el nombre del usuario desde la base de datos
$query = "SELECT nombre FROM usuario WHERE id = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $_SESSION['usuario_id']);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
$nombre_usuario = $usuario['nombre'];

// Obtener término de búsqueda si existe
$busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$resultado = obtenerServiciosUsuario($conexion, $_SESSION['usuario_id'], $busqueda);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Servicios - Grúas Moto X</title>
    <link rel="stylesheet" href="../assets/css/style_solicitud.css">
    <link rel="stylesheet" href="../assets/css/style_mis_servicios.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="back-button">
        <a href="../index.php">← Volver</a>
    </div>

    <div class="container">
        <h1>Historial de Servicios de <?php echo htmlspecialchars($nombre_usuario); ?></h1>

        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <form action="" method="GET">
                <input type="text" 
                       name="buscar" 
                       placeholder="Buscar por placa, marca o tipo de servicio"
                       value="<?php echo htmlspecialchars($busqueda); ?>">
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <!-- Tabla de servicios -->
        <div class="servicios-table">
            <?php mostrarTablaServicios($resultado); ?>
        </div>
    </div>
</body>
</html> 