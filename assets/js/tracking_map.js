class TrackingMap {
    constructor() {
        this.map = null; // Mapa de Leaflet
        this.currentMarker = null; // Marcador de la dirección actual
        this.destinationMarker = null; // Marcador del destino
        this.routingControl = null; // Control de la ruta
        this.initMap(); // Inicializar el mapa
    }

    initMap() {
        // Crear el mapa
        this.map = L.map('tracking-map').setView([6.2442, -75.5812], 13);

        // Añadir capa base
        L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
            attribution: '© OpenStreetMap contributors'
        }).addTo(this.map);
    }

    setMarker(lat, lng, type) {
        const icon = L.divIcon({
            html: type === 'current'
                ? '<i class="fas fa-map-marker-alt" style="color: #F29202; font-size: 24px;"></i>'
                : '<i class="fas fa-flag-checkered" style="color: #F29202; font-size: 24px;"></i>',
            className: 'custom-marker',
            iconSize: [30, 30]
        });

        if (type === 'current') {
            // Crear o actualizar el marcador de dirección actual
            if (this.currentMarker) {
                this.currentMarker.setLatLng([lat, lng]);
            } else {
                this.currentMarker = L.marker([lat, lng], { icon }).addTo(this.map);
            }
        } else if (type === 'destination') {
            // Crear o actualizar el marcador del destino
            if (this.destinationMarker) {
                this.destinationMarker.setLatLng([lat, lng]);
            } else {
                this.destinationMarker = L.marker([lat, lng], { icon }).addTo(this.map);
            }
        }

        // Actualizar la ruta si ambos puntos están definidos
        this.updateRoute();
    }

    updateRoute() {
        if (!this.currentMarker || !this.destinationMarker) return;

        // Eliminar el control de ruta existente
        if (this.routingControl) {
            this.map.removeControl(this.routingControl);
        }

        // Crear y mostrar la nueva ruta
        this.routingControl = L.Routing.control({
            waypoints: [
                L.latLng(this.currentMarker.getLatLng()),
                L.latLng(this.destinationMarker.getLatLng())
            ],
            routeWhileDragging: false,
            showAlternatives: false,
            lineOptions: {
                styles: [{ color: '#F29202', opacity: 0.8, weight: 6 }]
            },
            createMarker: function () { return null; } // No mostrar marcadores automáticos
        }).addTo(this.map);
    }
}
