<?php
function mostrarTablaServicios($resultado) {
    if ($resultado->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Moto</th>
                    <th>Placa</th>
                    <th>Tipo de Servicio</th>
                    <th>Estado</th>
                    <th>Costo</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($servicio = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo date('d/m/Y H:i', strtotime($servicio['fecha_solicitud'])); ?></td>
                        <td><?php echo htmlspecialchars($servicio['marca']); ?></td>
                        <td><?php echo htmlspecialchars($servicio['placa']); ?></td>
                        <td><?php echo htmlspecialchars($servicio['tipo_servicio']); ?></td>
                        <td>
                            <span class="estado-<?php echo strtolower($servicio['estado']); ?>">
                                <?php echo htmlspecialchars($servicio['estado']); ?>
                            </span>
                        </td>
                        <td>$<?php echo number_format($servicio['costo'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-servicios">
            <i class="fas fa-inbox"></i>
            <p>No se encontraron servicios<?php echo isset($busqueda) && $busqueda ? ' para tu búsqueda' : ''; ?></p>
        </div>
    <?php endif;
}
?> 