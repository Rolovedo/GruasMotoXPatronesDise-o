<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
session_start(); // Asegúrate de que la sesión esté iniciada

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado.']);
    exit();
}

require_once '../includes/conexion_db.php'; // Archivo para la conexión a la base de datos

$usuario_id = $_SESSION['usuario_id']; // Obtener el usuario_id de la sesión

try {
    // Realizar la consulta para obtener el último servicio pendiente
    $query = "
    SELECT s.id AS servicio_id
    FROM servicio s
    WHERE s.usuario_id = ? AND s.estado = 'Pendiente'
    ORDER BY s.fecha_solicitud DESC
    LIMIT 1;
    ";

    // Preparar la consulta
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $usuario_id); // Asumiendo que $usuario_id es una variable definida

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $servicio = $result->fetch_assoc();

        // Verifica si el servicio existe
        if ($servicio) {
            $servicio_id = $servicio['servicio_id'];

            // Actualizar el estado del servicio a 'cancelado'
            $updateQuery = "UPDATE servicio SET estado = 'Cancelado' WHERE id = ?";
            $updateStmt = $conexion->prepare($updateQuery);
            $updateStmt->bind_param("i", $servicio_id);

            if ($updateStmt->execute()) {
                // Confirmar la transacción
                $conexion->commit();

                // Mostrar la alerta de cancelación exitosa
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Servicio Cancelado",
                            text: "El servicio ha sido cancelado exitosamente.",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            window.location = "../index.php";  // Redirigir después de 2 segundos
                        });
                      </script>';
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al cancelar el servicio.']);
                $conexion->rollback();
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontró un servicio pendiente para este usuario.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta.']);
    }

    // Cerrar la consulta
    $stmt->close();

} catch (Exception $e) {
    // Si ocurre un error, realizar rollback
    $conexion->rollback();
    echo json_encode(['success' => false, 'message' => 'Error en la transacción: ' . $e->getMessage()]);
}

// Cerrar la conexión
$conexion->close();
?>
