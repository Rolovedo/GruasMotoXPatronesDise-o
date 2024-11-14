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

function initializeMap() {
    const map = L.map('map').setView(
        [mapConfig.initialView.lat, mapConfig.initialView.lng],
        mapConfig.initialView.zoom
    );

    L.tileLayer(mapConfig.tileLayer.url, mapConfig.tileLayer.options).addTo(map);

    return map;
} 