<?php
function obtenerServiciosUsuario($conexion, $usuario_id, $busqueda = '') {
    $termino = "%$busqueda%";
    $query = "SELECT DISTINCT s.fecha_solicitud, s.estado,
              m.marca, m.placa,
              ts.nombre as tipo_servicio,
              s.costo_estimado as costo
              FROM servicio s
              JOIN moto m ON s.moto_id = m.id
              JOIN tipo_servicio ts ON s.tipo_servicio_id = ts.id
              WHERE s.usuario_id = ? 
              AND (m.placa LIKE ? OR m.marca LIKE ? OR ts.nombre LIKE ?)
              ORDER BY s.fecha_solicitud DESC";

    $stmt = $conexion->prepare($query);
    $stmt->bind_param("isss", $usuario_id, $termino, $termino, $termino);
    $stmt->execute();
    return $stmt->get_result();
}
?> 