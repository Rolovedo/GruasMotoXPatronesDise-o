document.addEventListener('DOMContentLoaded', function() {
    // Recuperar direcciones desde sessionStorage
    const direccionActual = sessionStorage.getItem('direccionActual');
    const direccionDestino = sessionStorage.getItem('direccionDestino');
    
    // Asignar valores a los campos de dirección en tracking
    if (direccionActual) {
        document.getElementById('direccion_actual_tracking').value = direccionActual;
    }
    if (direccionDestino) {
        document.getElementById('direccion_destino_tracking').value = direccionDestino;
    }
});