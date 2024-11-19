<?php
session_start();
include '../includes/conexion_db.php';
include '../includes/service_info.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$servicio = obtenerInformacionServicio($conexion, $usuario_id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rastreo de Servicio - Grúas Moto X</title>
    <link rel="stylesheet" href="../assets/css/style_solicitud.css">
    <link rel="stylesheet" href="../assets/css/style_tracking.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
</head>

<body>

    <!-- Indicador de pasos (Progress steps) -->
    <div class="progress-steps">
        <div class="step">1</div>
        <div class="step-line"></div>
        <div class="step">2</div>
        <div class="step-line"></div>
        <div class="step active">3</div>
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Sección izquierda -->
        <div class="left-section">
            <h1>Rastreo de Servicio</h1>
            
            <!-- Sección de formulario -->
            <div class="form-section">
                <label for="direccion_actual">Dirección Actual</label>
                <input type="text" placeholder="Dirección de recogida" id="direccion_actual_tracking" readonly>
                <label for="direccion_destino">Destino</label>
                <input type="text" placeholder="Dirección de destino" id="direccion_destino_tracking" readonly>
            </div>

            <!-- Información del servicio -->
            <?php echo mostrarInformacionServicio($servicio); ?>
        </div>

        <!-- Sección derecha con el mapa y botones -->
        <div class="right-section">
            <div class="map-container">
                <div id="tracking-map"></div>
                <div class="location-status">
                    <span id="distance">Calculando distancia...</span>
                    <span id="eta">Tiempo estimado: Calculando...</span>
                </div>
            </div>
            <div class="button-group">
                <button class="update-button">Actualizar Estado</button>
                <button class="cancel-button">Cancelar Servicio</button>
            </div>
        </div>
    </div>

     <!-- Incluir el archivo JS -->
     <script src="../assets/js/update_route.js"></script>
     <script src="../assets/js/tracking_map.js"></script>
     <script>
     document.addEventListener('DOMContentLoaded', function() {
         const trackingMap = new TrackingMap();
         
         // Simular un punto de destino (reemplazar con las coordenadas reales del servicio)
         trackingMap.setDestination(6.2442, -75.5812);
     });
     </script>

</body>
</html>

