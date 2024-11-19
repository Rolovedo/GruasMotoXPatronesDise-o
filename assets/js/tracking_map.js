class TrackingMap {
    constructor() {
        this.map = null;
        this.currentMarker = null;
        this.destinationMarker = null;
        this.routingControl = null;
        this.watchId = null;
        this.initMap();
    }

    initMap() {
        // Inicializar el mapa
        this.map = L.map('tracking-map').setView([6.2442, -75.5812], 13);
        
        // Añadir capa de mapa oscuro
        L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
            attribution: '© OpenStreetMap contributors'
        }).addTo(this.map);

        // Iniciar el seguimiento de ubicación
        this.startTracking();
    }

    startTracking() {
        if ("geolocation" in navigator) {
            // Observar cambios en la ubicación
            this.watchId = navigator.geolocation.watchPosition(
                position => this.updatePosition(position),
                error => console.error('Error:', error),
                {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                }
            );
        }
    }

    updatePosition(position) {
        const { latitude, longitude } = position.coords;

        // Actualizar o crear el marcador de posición actual
        if (this.currentMarker) {
            this.currentMarker.setLatLng([latitude, longitude]);
        } else {
            const conductorIcon = L.divIcon({
                html: '<i class="fas fa-truck" style="color: #F29202; font-size: 24px;"></i>',
                className: 'conductor-marker',
                iconSize: [30, 30]
            });

            this.currentMarker = L.marker([latitude, longitude], {
                icon: conductorIcon
            }).addTo(this.map);
        }

        // Actualizar la ruta si existe un destino
        this.updateRoute();
    }

    setDestination(lat, lng) {
        if (this.destinationMarker) {
            this.destinationMarker.setLatLng([lat, lng]);
        } else {
            const destinationIcon = L.divIcon({
                html: '<i class="fas fa-motorcycle" style="color: #F29202; font-size: 24px;"></i>',
                className: 'destination-marker',
                iconSize: [30, 30]
            });

            this.destinationMarker = L.marker([lat, lng], {
                icon: destinationIcon
            }).addTo(this.map);
        }

        this.updateRoute();
    }

    updateRoute() {
        if (!this.currentMarker || !this.destinationMarker) return;

        if (this.routingControl) {
            this.map.removeControl(this.routingControl);
        }

        this.routingControl = L.Routing.control({
            waypoints: [
                L.latLng(this.currentMarker.getLatLng()),
                L.latLng(this.destinationMarker.getLatLng())
            ],
            routeWhileDragging: false,
            showAlternatives: false,
            lineOptions: {
                styles: [
                    { color: '#F29202', opacity: 0.8, weight: 6 }
                ]
            },
            createMarker: function() { return null; }
        }).addTo(this.map);
    }

    cleanup() {
        if (this.watchId) {
            navigator.geolocation.clearWatch(this.watchId);
        }
    }
} 