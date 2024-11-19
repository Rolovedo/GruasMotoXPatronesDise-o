<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Servicio - Grúas Moto X</title>
    <link rel="stylesheet" href="../assets/css/style_solicitud.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="back-button">
        <a href="../index.php">← Back</a>
    </div>

    <div class="progress-steps">
        <div class="step active">1</div>
        <div class="step-line"></div>
        <div class="step">2</div>
        <div class="step-line"></div>
        <div class="step">3</div>
    </div>

    <div class="form-container">
        <div class="form-section">
            <h2>Por favor ingrese los siguientes datos de la persona que iniciará la solicitud:</h2>
            
            <form action="solicitud_datos_moto.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="celular">Celular</label>
                    <div class="phone-input">
                        <select name="country_code">
                            <option value="+57">🇨🇴 +57</option>
                        </select>
                        <input type="tel" name="celular" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input type="text" name="cedula" required>
                </div>

                <button type="submit" class="siguiente-btn">Siguiente</button>
            </form>
        </div>

        <div class="info-section">
            <img src="../assets/imagenes/grua.png" alt="Grúa" class="grua-image">
            <div class="service-features">
                <div class="feature">
                    <span class="icon">👥</span>
                    <span class="text">2 puertas</span>
                </div>
                <div class="feature">
                    <span class="icon">⚡</span>
                    <span class="text">Corriente</span>
                </div>
                <div class="feature">
                    <span class="icon">🔧</span>
                    <span class="text">Manual</span>
                </div>
                <div class="feature">
                    <span class="icon">🏍️</span>
                    <span class="text">4 motos max.</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
