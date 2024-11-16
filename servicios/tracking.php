<?php
//session_start();
//include '../includes/conexion_db.php';

//if (!isset($_SESSION['usuario_id'])) {
  //  header('Location: ../auth/login.php');
    //exit();
//}
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
                <div class="info-item"><i class="fas fa-truck icon"></i><span>Grúa: (Marca) - STC430</span></div>
                <div class="info-item"><i class="fas fa-cogs icon"></i><span id='info-servicio'>Servicio: (tipo de servicio)</span></div>
                <div class="info-item"><i class="fas fa-motorcycle icon"></i><span id='info-moto'>Moto: (nombre moto) - (placa)</span></div>
            </div>
        </div>

        <!-- Sección derecha con la imagen de rastreo y botones -->
        <div class="right-section">
            <h2>Ubicación en tiempo real del servicio</h2>
            <img src="../assets/imagenes/ubicacion.png" alt="Mockup de ubicación en tiempo real" class="tracking-image">

            <div class="button-group">
                <button class="update-button">Actualizar</button>
                <button class="cancel-button">Cancelar</button>
            </div>
        </div>
    </div>

     <!-- Incluir el archivo JS -->
     <script src="../assets/js/update_route.js"></script>

</body>
</html>

