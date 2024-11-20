<?php
require_once 'includes/config.php';
session_start();
// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../auth/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Grúas Moto X</title>
    <link rel="stylesheet" href="assets/css/style_landing.css">
</head>
<body>
    <div class="top-bar">
        <?php if(isset($_SESSION['nombre'])): ?>
            <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?> | </span>
            <a href="includes/cerrar_sesion.php">Cerrar Sesión</a>
        <?php else: ?>
            <a href="auth/login.php" class="login-button">Iniciar Sesión</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <div class="mis-servicios-btn">
                <a href="servicios/mis_servicios.php" class="btn-historial">
                    <i class="fas fa-history"></i> Mis Servicios
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div class="hero-section">
        <!-- Video de fondo -->
        <div class="video-background">
            <iframe 
                src="https://www.youtube.com/embed/-J5MU3tRzSM?autoplay=1&mute=1&loop=1&playlist=-J5MU3tRzSM&controls=0&showinfo=0" 
                frameborder="0" 
                allowfullscreen>
            </iframe>
        </div>
        <!-- Contenido del hero -->
        <img src="assets/imagenes/logo.png" alt="Grúas Moto X" class="logo">
        <h1>Bienvenido a Grúas Moto X</h1>
        <a href="servicios/solicitud_datos_personales.php" class="cta-button">Solicita servicio</a>
    </div>

    <div class="call-banner">
    <img src="assets/imagenes/whatsapp-icon.png" alt="WhatsApp" class="whatsapp-icon">
    <span class="banner-text">SERVICIO 24/7 - 311 300 00 99</span>
</div>



    <div class="features">
        <div class="feature-card">
            <div class="feature-icon">🏍️</div>
            <h3>1000+</h3>
            <p>Servicios Realizados</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🚛</div>
            <h3>2</h3>
            <p>Grúas Equipadas</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🔧</div>
            <h3>10+</h3>
            <p>Técnicos Expertos</p>
        </div>
    </div>

    <div class="why-choose">
        <h2>¿Por qué elegir Grúas Moto X?</h2>
        <div class="benefits">
            <div class="benefit">
                <div class="benefit-icon">⚡</div>
                <h3>Respuesta Rápida</h3>
                <p>Llegamos a tu ubicación en menos de 30 minutos. Servicio de emergencia las 24 horas del día, los 7 días de la semana.</p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">📍</div>
                <h3>Cobertura Total</h3>
                <p>Servicio en toda la ciudad y alrededores. Estamos donde nos necesites, cuando nos necesites.</p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">🌟</div>
                <h3>Clientes Satisfechos</h3>
                <p>Miles de motociclistas confían en nosotros. Experiencia y profesionalismo garantizado en cada servicio.</p>
            </div>
        </div>
    </div>

    <div class="pricing">
        <h2>Nuestros Servicios por Cilindraje</h2>
        <div class="pricing-cards">
            <div class="price-card">
                <h3>Bajo</h3>
                <div class="cc"><span>Motos con hasta 200 cc</span></div>
                <ul class="features-list">
                    <li>Servicio de Calidad</li>
                    <li>Servicio Responsable</li>
                    <li>Asistencia completa</li>
                    <li>Prioridad VIP</li>
                    <li>Cobertura 24/7</li>
                </ul>
            </div>
            <div class="price-card">
                <h3>Medio</h3>
                <div class="cc"><span>Motos con entre 201 cc y 400 cc</span></div>
                <ul class="features-list">
                    <li>Servicio de Calidad</li>
                    <li>Servicio Responsable</li>
                    <li>Asistencia completa</li>
                    <li>Prioridad VIP</li>
                    <li>Cobertura 24/7</li>
                </ul>
            </div>
            <div class="price-card">
                <h3>Alto</h3>
                <div class="cc"><span> Motos con 401 cc o más</span></div>
                <ul class="features-list">
                    <li>Servicio de Calidad</li>
                    <li>Servicio Responsable</li>
                    <li>Asistencia completa</li>
                    <li>Prioridad VIP</li>
                    <li>Cobertura 24/7</li>
                    <li>Seguro durante el traslado</li>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <div>
            <p>Valle de Aburra</p>
            <p>Gruas Motox</p>
            <p>Tel: +952345789</p>
            <p>emergencias@gruasmotox.com</p>
        </div>
    </footer>
</body>
</html>