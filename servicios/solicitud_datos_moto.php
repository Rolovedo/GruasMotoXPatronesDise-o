<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos de la Moto - Solicitud de Servicio</title>
    <link rel="stylesheet" href="../assets/css/style_solicitud.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="../assets/css/map_styles.css" />
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
            
            <div class="costos-section">
                <h3>Información de Costos</h3>
                <div class="costo-info">
                    <div class="costo-item">
                        <span class="icon">🏍️</span>
                        <p>Hasta 200cc: <strong>+$10,000</strong></p>
                    </div>
                    <div class="costo-item">
                        <span class="icon">🏍️</span>
                        <p>201cc - 500cc: <strong>+$20,000</strong></p>
                    </div>
                    <div class="costo-item">
                        <span class="icon">🏍️</span>
                        <p>501cc - 800cc: <strong>+$30,000</strong></p>
                    </div>
                    <div class="costo-item">
                        <span class="icon">🏍️</span>
                        <p>Más de 800cc: <strong>+$40,000</strong></p>
                    </div>
                    <div class="costo-base">
                        <p>Cargo base: <strong>$50,000</strong></p>
                    </div>
                </div>
            </div>

            <div class="map-container">
                <div class="route-info">
                    <div class="info-item">
                        <span>Distancia:</span>
                        <span id="distance">0.00 km</span>
                    </div>
                    <div class="info-item">
                        <span>Precio estimado:</span>
                        <span id="estimated-price">$0.00</span>
                    </div>
                </div>
                <div class="location-status" id="locationStatus">
                    Seleccione el punto de recogida
                </div>
                <div id="map"></div>
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
                
                <form id="serviceForm" action="procesar_servicio.php" method="post">
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
                        <input type="number" name="cilindraje" required>
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" required>
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

                    <div class="form-group">
                        <label for="direccion_actual">Dirección Actual</label>
                        <input type="text" id="direccion_actual" name="ubicacion" readonly required>
                    </div>

                    <div class="form-group">
                        <label for="direccion_destino">Destino</label>
                        <input type="text" id="direccion_destino" name="destino" readonly required>
                    </div>

                    <div class="motivos-section">
                        <h3>Motivo de traslado:</h3>
                        <div class="motivo-option">
                            <input type="radio" name="motivo" id="punto-a-b" value="traslado_punto" required>
                            <label for="punto-a-b">Traslado de un punto A a un punto B</label>
                        </div>
                        <div class="motivo-option">
                            <input type="radio" name="motivo" id="agencia" value="traslado_agencia">
                            <label for="agencia">Traslado de una agencia o concesionario</label>
                        </div>
                        <div class="motivo-option">
                            <input type="radio" name="motivo" id="emergencia" value="emergencia">
                            <label for="emergencia">Emergencia</label>
                        </div>
                    </div>

                    <input type="hidden" name="tipo_servicio" id="tipo_servicio">
                    <input type="hidden" name="costo_total" id="costo_total">

                    <div class="total-section">
                        <span>Total - </span>
                        <span class="price">$50.000</span>
                        <button type="button" class="detalles-btn">Detalles costo</button>
                    </div>

                    <script src="https://www.paypal.com/sdk/js?client-id=AeX8WrSw9eQESLGIUsXeKVy0s75HBrll8dNaXpzOco1BKisPWUngFAAX4DfAfPZQpW74yDg9VDJjfSoB&currency=USD"></script>

                    <div class="button-container">
                        <button type="submit" class="solicitar-btn">SOLICITAR</button>
                        <div id="paypal-button-container"></div>
                    </div>

                    <script>
                        paypal.Buttons({
                            style: {
                                layout: 'horizontal',
                                height: 50
                            },
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: { value: '19.49' }
                                    }]
                                });
                            }
                        }).render('#paypal-button-container');
                    </script>
                </form>
            </div>
        </div>
    </div>

    <style>
        .suggestions {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            width: 100%;
            max-height: 150px;
            overflow-y: auto;
            display: none;
            z-index: 1000;
        }
        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
        .map-container {
            padding: 15px;
            background: #1E1E1E;
            border-radius: 10px;
            margin: 20px 0;
        }
        .route-info {
            background: #2C2C2C;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
        }
        .info-item {
            display: flex;
            gap: 10px;
            color: white;
        }
        .location-status {
            color: white;
            background: #2C2C2C;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
        }
        #map {
            height: 300px;
            border-radius: 8px;
            z-index: 1;
        }
        .leaflet-control-container .leaflet-routing-container-hide {
            display: none;
        }
    </style>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
    <script src="../assets/js/map_config.js"></script>
    <script src="../assets/js/price_calculator.js"></script>
    <script src="../assets/js/route_handler.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = initializeMap();
            const routeHandler = new RouteHandler(map);
            
            // Para debugging
            console.log('Mapa inicializado:', map);
            console.log('RouteHandler inicializado:', routeHandler);

            // Manejar cambios en el motivo para actualizar tipo_servicio
            const motivoInputs = document.querySelectorAll('input[name="motivo"]');
            motivoInputs.forEach(input => {
                input.addEventListener('change', function() {
                    let tipoServicioId;
                    switch(this.value) {
                        case 'traslado_punto':
                            tipoServicioId = 1;
                            break;
                        case 'emergencia':
                            tipoServicioId = 2;
                            break;
                        case 'traslado_agencia':
                            tipoServicioId = 3;
                            break;
                    }
                    document.getElementById('tipo_servicio').value = tipoServicioId;
                });
            });
        });
    </script>
</body>
</html>
