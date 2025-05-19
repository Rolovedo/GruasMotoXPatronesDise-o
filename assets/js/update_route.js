document.addEventListener('DOMContentLoaded', function () {
    // Recuperar direcciones y otros datos desde sessionStorage
    const direccionActual = sessionStorage.getItem('direccionActual');
    const direccionDestino = sessionStorage.getItem('direccionDestino');
    const marcaMoto = sessionStorage.getItem('marcaMoto');
    const placaMoto = sessionStorage.getItem('placaMoto');
    const tipoServicio = sessionStorage.getItem('tipoServicio');

    // Asignar valores a los campos de dirección en tracking
    if (direccionActual) {
        document.getElementById('direccion_actual_tracking').value = direccionActual;
    }
    if (direccionDestino) {
        document.getElementById('direccion_destino_tracking').value = direccionDestino;
    }

    // Actualizar información del servicio y moto
    if (marcaMoto && placaMoto) {
        document.getElementById('info-moto').textContent = `Moto: ${marcaMoto} - ${placaMoto}`;
    }
    if (tipoServicio) {
        document.getElementById('info-servicio').textContent = `Servicio: ${tipoServicio}`;
    }    
});
