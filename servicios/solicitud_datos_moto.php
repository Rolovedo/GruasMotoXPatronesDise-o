<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos de la Moto - Solicitud de Servicio</title>
    <link rel="stylesheet" href="../assets/css/style_solicitud.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="back-button">
        <a href="../index.php">← Back</a>
    </div>

    <div class="progress-steps">
        <div class="step">1</div>
        <div class="step-line"></div>
        <div class="step active">2</div>
    </div>

    <div class="form-container moto-form">
        <div class="motos-section">
            <img src="../assets/imagenes/moto-sport.png" alt="Moto Sport" class="moto-icon">
            
            <div class="motivos-section">
                <h3>Motivos de traslado:</h3>
                <div class="motivo-option">
                    <input type="radio" name="motivo" id="punto-a-b">
                    <label for="punto-a-b">Traslado de un punto A a un punto B</label>
                </div>
                <div class="motivo-option">
                    <input type="radio" name="motivo" id="agencia">
                    <label for="agencia">Traslado de una agencia o concesionario</label>
                </div>
                <div class="motivo-option">
                    <input type="radio" name="motivo" id="emergencia">
                    <label for="emergencia">Emergencia</label>
                </div>
            </div>

            <div class="contact-info">
                <img src="../assets/imagenes/logo.png" alt="Logo" class="footer-logo">
                <div class="contact-details">
                    <p>📧 info@gruasmotox.com</p>
                    <p>📱 311-30000-99</p>
                </div>
            </div>
        </div>

        <div class="form-section">
            <div class="service-request-card">
                <h2>SOLICITUD DE SERVICIO</h2>
                
                <form action="solicitud_resumen.php" method="post">
                    <div class="form-group">
                        <label for="tipo_moto">Tipo de moto</label>
                        <select name="tipo_moto" required>
                            <option value="Adventure">Adventure</option>
                            <option value="Sport">Sport</option>
                            <option value="Scooter">Scooter</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cilindraje">Cilindraje</label>
                        <input type="text" name="cilindraje" placeholder="1250" required>
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" placeholder="Ducati" required>
                    </div>

                    <div class="form-group">
                        <label for="soat">SOAT</label>
                        <select name="soat" required>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" required>
                    </div>

                    <div class="total-section">
                        <span>Total - </span>
                        <span class="price">$85.000</span>
                        <button type="button" class="detalles-btn">Detalles costo</button>
                    </div>

                    <!-- Incluye el SDK de PayPal -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AeX8WrSw9eQESLGIUsXeKVy0s75HBrll8dNaXpzOco1BKisPWUngFAAX4DfAfPZQpW74yDg9VDJjfSoB&currency=USD"></script>

                    <!-- Contenedor para centrar los botones -->
                    <div class="button-container">
                        <!-- Botón de Solicitar -->
                        <button type="submit" class="solicitar-btn">Solicitar</button>

                        <!-- Contenedor para el botón de PayPal -->
                        <div id="paypal-button-container"></div>
                    </div>

                    <script>
                        //Renderiza el botón de PayPal en #paypal-button-container
                        paypal.Buttons({
                            createOrder: function(data, actions){
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: 19.49 //Precio a pagar
                                        }
                                    }]
                                })
                            }
                        }
                        ).render('#paypal-button-container');
                    </script>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
