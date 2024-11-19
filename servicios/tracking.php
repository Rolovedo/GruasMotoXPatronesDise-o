<?php
session_start();

// Verificar si se recibieron las variables de sesión
$marca = $_SESSION['marca'] ?? '';
$placa = $_SESSION['placa'] ?? '';
$tipo_servicio = $_SESSION['tipo_servicio'] ?? '';
$direccion_actual = $_SESSION['direccion_actual'] ?? '6.2442, -75.5812'; // Coordenadas predeterminadas
$direccion_destino = $_SESSION['direccion_destino'] ?? '6.2500, -75.6000'; // Coordenadas predeterminadas

?>
<script>
    // Guardar datos en sessionStorage
    sessionStorage.setItem('marcaMoto', "<?php echo $marca; ?>");
    sessionStorage.setItem('placaMoto', "<?php echo $placa; ?>");
    sessionStorage.setItem('tipoServicio', "<?php echo $tipo_servicio; ?>");
    sessionStorage.setItem('direccionActual', "<?php echo $direccion_actual; ?>");
    sessionStorage.setItem('direccionDestino', "<?php echo $direccion_destino; ?>");
</script>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rastreo de Servicio - Grúas Moto X</title>
    <link rel="stylesheet" href="../assets/css/style_solicitud.css">
    <link rel="stylesheet" href="../assets/css/style_tracking.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="back-button">
        <a href="../index.php">← Back</a>
    </div>

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
            <div class="info-section">
                <div class="info-item"><i class="fas fa-user icon"></i><span>Conductor: Alfredo - 311-30000-99</span></div>
                <div class="info-item"><i class="fas fa-truck icon"></i><span>Grúa: Chana - STC430</span></div>
                <div class="info-item"><i class="fas fa-cogs icon"></i><span id='info-servicio'>Servicio: (Tipo de servicio)</span></div>
                <div class="info-item"><i class="fas fa-motorcycle icon"></i><span id='info-moto'>Moto: (nombre moto) - (placa)</span></div>
            </div>
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
        document.addEventListener('DOMContentLoaded', async function () {
            const trackingMap = new TrackingMap();

            // Obtener direcciones desde los campos
            const direccionActual = document.getElementById('direccion_actual_tracking').value;
            const direccionDestino = document.getElementById('direccion_destino_tracking').value;

            // Función para obtener coordenadas mediante geocodificación
            async function obtenerCoordenadas(direccion) {
                const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(direccion)}`;
                const response = await fetch(url);
                const data = await response.json();

                if (data && data.length > 0) {
                    const { lat, lon } = data[0];
                    return { lat: parseFloat(lat), lng: parseFloat(lon) };
                } else {
                    console.error('No se encontraron coordenadas para:', direccion);
                    return null;
                }
            }

            // Obtener coordenadas para ambas direcciones
            const coordActual = await obtenerCoordenadas(direccionActual);
            const coordDestino = await obtenerCoordenadas(direccionDestino);

            if (coordActual) {
                trackingMap.setMarker(coordActual.lat, coordActual.lng, 'current');
            }
            if (coordDestino) {
                trackingMap.setMarker(coordDestino.lat, coordDestino.lng, 'destination');
            }
        });
    </script>

</body>
</html>

