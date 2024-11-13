class RouteHandler {
    constructor(map) {
        this.map = map;
        this.currentStep = 'pickup';
        this.statusElement = document.getElementById('locationStatus');
        this.pickupMarker = null;
        this.destinationMarker = null;
        this.priceCalculator = new PriceCalculator();
        this.lastDistance = 0;

        this.routingControl = L.Routing.control({
            waypoints: [],
            routeWhileDragging: false,
            show: false,
            addWaypoints: false,
            draggableWaypoints: false,
            lineOptions: {
                styles: [{color: '#0066ff', opacity: 0.7, weight: 5}]
            }
        }).addTo(map);

        this.routingControl.on('routesfound', (e) => this.handleRouteFound(e));
        this.map.on('click', (e) => this.handleMapClick(e));

        const cilindrajeInput = document.querySelector('input[name="cilindraje"]');
        if (cilindrajeInput) {
            cilindrajeInput.addEventListener('input', () => {
                this.updatePrice();
            });
        }
    }

    async getAddressFromCoordinates(lat, lng) {
        try {
            const response = await fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`);
            const data = await response.json();
            return data.display_name;
        } catch (error) {
            console.error('Error al obtener dirección:', error);
            return `${lat}, ${lng}`;
        }
    }

    async handleMapClick(e) {
        if (this.currentStep === 'pickup') {
            if (this.pickupMarker) this.map.removeLayer(this.pickupMarker);
            
            this.pickupMarker = L.marker(e.latlng, {
                icon: L.icon({
                    iconUrl: '../assets/imagenes/marker-start.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41]
                })
            }).addTo(this.map);

            const address = await this.getAddressFromCoordinates(e.latlng.lat, e.latlng.lng);
            document.getElementById('direccion_actual').value = address;
            
            this.currentStep = 'destination';
            this.statusElement.textContent = 'Seleccione el punto de destino';
            this.routingControl.spliceWaypoints(0, 1, e.latlng);
        } else {
            if (this.destinationMarker) this.map.removeLayer(this.destinationMarker);
            
            this.destinationMarker = L.marker(e.latlng, {
                icon: L.icon({
                    iconUrl: '../assets/imagenes/marker-end.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41]
                })
            }).addTo(this.map);

            const address = await this.getAddressFromCoordinates(e.latlng.lat, e.latlng.lng);
            document.getElementById('direccion_destino').value = address;
            
            this.currentStep = 'pickup';
            this.statusElement.textContent = 'Ruta establecida';
            this.routingControl.spliceWaypoints(1, 1, e.latlng);
        }
    }

    handleRouteFound(e) {
        const distanceKm = (e.routes[0].summary.totalDistance / 1000).toFixed(2);
        this.lastDistance = distanceKm;
        this.updatePrice();
    }

    updatePrice() {
        const cilindrajeInput = document.querySelector('input[name="cilindraje"]');
        const cylinderCapacity = parseInt(cilindrajeInput?.value || 0);
        const price = this.priceCalculator.calculatePrice(this.lastDistance, cylinderCapacity);

        document.getElementById('distance').textContent = `${this.lastDistance} km`;
        document.getElementById('estimated-price').textContent = this.priceCalculator.formatPrice(price);
        
        const costoTotalInput = document.getElementById('costo_total');
        if (costoTotalInput) {
            costoTotalInput.value = price;
        }

        const priceElement = document.querySelector('.total-section .price');
        if (priceElement) {
            priceElement.textContent = this.priceCalculator.formatPrice(price);
        }

        console.log('Precio actualizado:', {
            distancia: this.lastDistance,
            cilindraje: cylinderCapacity,
            precioTotal: price,
            precioFormateado: this.priceCalculator.formatPrice(price)
        });
    }
} 