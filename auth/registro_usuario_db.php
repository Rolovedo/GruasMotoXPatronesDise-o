<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
    include '../includes/conexion_db.php';

    // Verificar si los datos han sido enviados por el formulario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : '';
    $correo = isset($_POST['correo']) ? mysqli_real_escape_string($conexion, $_POST['correo']) : '';
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conexion, $_POST['telefono']) : '';
    $tipodocumento = isset($_POST['tipodocumento']) ? mysqli_real_escape_string($conexion, $_POST['tipodocumento']) : '';
    $documento = isset($_POST['documento']) ? mysqli_real_escape_string($conexion, $_POST['documento']) : '';
    $rol_id = 1;

    if ($nombre && $apellido && $correo && $telefono && $tipodocumento && $documento) {
        // Preparar la consulta
        $query = "INSERT INTO usuario (nombre, apellido, correo, telefono, tipodocumento, documento, rol_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    
        // Preparar la sentencia
        $stmt = mysqli_prepare($conexion, $query);
    
        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, 'ssssssi', $nombre, $apellido, $correo, $telefono, $tipodocumento, $documento, $rol_id);
    
        // Ejecutar la sentencia
        $ejecutar = mysqli_stmt_execute($stmt);
    

        if ($ejecutar) {
            ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: 'Registro exitoso',
                    timer: 3000,
                    showConfirmButton: false
                }).then(function() {
                    window.location = 'login.php';
                });
            </script>
            <?php
        } else {
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en el registro: <?php echo mysqli_error($conexion); ?>'
                });
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Campos incompletos',
                text: 'Por favor, complete todos los campos.'
            });
        </script>
        <?php
    }
?>
</body>
</html>
