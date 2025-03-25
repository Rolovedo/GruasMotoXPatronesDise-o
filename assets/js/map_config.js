const mapConfig = {
    initialView: {
        lat: 6.2442,
        lng: -75.5812,
        zoom: 13
    },
    
    tileLayer: {
        url: 'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png',
        options: {
            maxZoom: 19,
            attribution: '© <a href="https://stadiamaps.com/">Stadia Maps</a>'
        }
    },

    routingOptions: {
        styles: [{
            color: '#6FA1EC',
            weight: 4,
            opacity: 0.7
        }]
    }
};

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

function initializeMap() {
    const map = L.map('map').setView(
        [mapConfig.initialView.lat, mapConfig.initialView.lng],
        mapConfig.initialView.zoom
    );

    L.tileLayer(mapConfig.tileLayer.url, mapConfig.tileLayer.options).addTo(map);

    return map;
} 