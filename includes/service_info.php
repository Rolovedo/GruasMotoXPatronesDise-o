<?php
function obtenerInformacionServicio($conexion, $usuario_id) {
    // Obtener el último servicio del usuario
    $query = "SELECT s.*, m.tipo as tipo_moto, m.placa, ts.nombre as tipo_servicio 
              FROM servicio s 
              JOIN moto m ON s.moto_id = m.id 
              JOIN tipo_servicio ts ON s.tipo_servicio_id = ts.id 
              WHERE s.usuario_id = ? 
              ORDER BY s.fecha_solicitud DESC 
              LIMIT 1";

    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_assoc();
}

function mostrarInformacionServicio($servicio) {
    ob_start();
    ?>
    <div class="info-section">
        <div class="info-item">
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="info-content">
                <span class="info-label">Conductor</span>
                <span class="info-value">Por asignar</span>
            </div>
        </div>
        
        <div class="info-item">
            <div class="icon">
                <i class="fas fa-truck"></i>
            </div>
            <div class="info-content">
                <span class="info-label">Grúa</span>
                <span class="info-value">Por asignar</span>
            </div>
        </div>
        
        <div class="info-item">
            <div class="icon">
                <i class="fas fa-cogs"></i>
            </div>
            <div class="info-content">
                <span class="info-label">Tipo de Servicio</span>
                <span class="info-value"><?php echo htmlspecialchars($servicio['tipo_servicio']); ?></span>
            </div>
        </div>
        
        <div class="info-item">
            <div class="icon">
                <i class="fas fa-motorcycle"></i>
            </div>
            <div class="info-content">
                <span class="info-label">Moto</span>
                <span class="info-value">
                    <?php echo htmlspecialchars($servicio['tipo_moto']) . ' - ' . htmlspecialchars($servicio['placa']); ?>
                </span>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?> 