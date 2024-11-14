<?php
session_start();
include '../includes/conexion_db.php';

try {
    // Verificar si el usuario está logueado
    if (!isset($_SESSION['usuario_id'])) {
        throw new Exception('Debe iniciar sesión para solicitar un servicio');
    }

    $usuario_id = $_SESSION['usuario_id'];

    // Obtener datos del formulario
    $tipo_moto = mysqli_real_escape_string($conexion, $_POST['tipo_moto']);
    $cilindraje = mysqli_real_escape_string($conexion, $_POST['cilindraje']);
    $marca = mysqli_real_escape_string($conexion, $_POST['marca']);
    $soat = mysqli_real_escape_string($conexion, $_POST['soat']);
    $placa = mysqli_real_escape_string($conexion, $_POST['placa']);
    $ubicacion = mysqli_real_escape_string($conexion, $_POST['ubicacion']);
    $destino = mysqli_real_escape_string($conexion, $_POST['destino']);
    $costo_total = mysqli_real_escape_string($conexion, $_POST['costo_total']);

    // Determinar el tipo_servicio_id basado en el motivo
    $motivo = $_POST['motivo'];
    switch($motivo) {
        case 'traslado_punto':
            $tipo_servicio_id = 1; // Traslado estándar
            break;
        case 'emergencia':
            $tipo_servicio_id = 2; // Emergencia
            break;
        case 'traslado_agencia':
            $tipo_servicio_id = 3; // Traslado concesionario
            break;
        default:
            $tipo_servicio_id = 1; // Por defecto, traslado estándar
    }

    // Iniciar transacción
    $conexion->begin_transaction();

    // Insertar en la tabla moto
    $query_moto = "INSERT INTO moto (tipo, cilindraje, marca, soat, placa, usuario_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query_moto);
    $stmt->bind_param("sisssi", $tipo_moto, $cilindraje, $marca, $soat, $placa, $usuario_id);
    
    if (!$stmt->execute()) {
        throw new Exception('Error al registrar la moto: ' . $stmt->error);
    }
    
    $moto_id = $stmt->insert_id;

    // Insertar en la tabla servicio
    $query_servicio = "INSERT INTO servicio (
        usuario_id, 
        moto_id, 
        tipo_servicio_id, 
        ubicacion_actual, 
        destino, 
        costo_estimado,
        fecha_solicitud, 
        estado
    ) VALUES (?, ?, ?, ?, ?, ?, NOW(), 'Pendiente')";

    $stmt = $conexion->prepare($query_servicio);
    $stmt->bind_param("iiissd", 
        $usuario_id, 
        $moto_id, 
        $tipo_servicio_id, 
        $ubicacion, 
        $destino, 
        $costo_total
    );

    if (!$stmt->execute()) {
        throw new Exception('Error al registrar el servicio: ' . $stmt->error);
    }

    $servicio_id = $stmt->insert_id;

    // Insertar en la tabla pago
    $query_pago = "INSERT INTO pago (servicio_id, metodo_pago, monto, fecha_pago, estado_pago) 
                   VALUES (?, 'Efectivo', ?, NOW(), 'Pendiente')";
    
    $stmt = $conexion->prepare($query_pago);
    $stmt->bind_param("id", $servicio_id, $costo_total);

    if (!$stmt->execute()) {
        throw new Exception('Error al registrar el pago: ' . $stmt->error);
    }

    // Confirmar transacción
    $conexion->commit();

    // Redireccionar a tracking.php
    header('Location: tracking.php');
    exit();

} catch (Exception $e) {
    // Revertir transacción en caso de error
    $conexion->rollback();
    
    // Si el error es de sesión, redirigir al login
    if ($e->getMessage() === 'Debe iniciar sesión para solicitar un servicio') {
        header('Location: ../login.php');
        exit();
    }
    
    echo "Error: " . $e->getMessage();
}

$conexion->close();
?> 