class ServiceHandler {
    constructor() {
        this.form = document.getElementById('serviceForm');
        this.initializeHandlers();
    }

    initializeHandlers() {
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
    }

    validateForm() {
        const fields = {
            'tipo_moto': 'Tipo de moto',
            'cilindraje': 'Cilindraje',
            'marca': 'Marca',
            'soat': 'SOAT',
            'placa': 'Placa'
        };

        let emptyFields = [];

        // Validar campos normales
        for (const [id, label] of Object.entries(fields)) {
            const field = document.getElementById(id);
            if (!field || !field.value.trim()) {
                emptyFields.push(label);
            }
        }

        // Validar radio buttons de motivo
        const motivoChecked = document.querySelector('input[name="motivo"]:checked');
        if (!motivoChecked) {
            emptyFields.push('Motivo de traslado');
        }

        if (emptyFields.length > 0) {
            Swal.fire({
                icon: 'error',
                title: 'Campos requeridos',
                html: `Por favor completa los siguientes campos:<br><br>${emptyFields.join('<br>')}`,
                confirmButtonColor: '#F29202'
            });
            return false;
        }

        return true;
    }

    async handleSubmit(event) {
        event.preventDefault();

        if (!this.validateForm()) {
            return;
        }

        // Mostrar loading
        Swal.fire({
            title: 'Procesando solicitud',
            text: 'Por favor espere...',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            const formData = new FormData(event.target);
            const response = await fetch('../servicios/procesar_servicio.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.requireLogin) {
                // Si necesita login
                Swal.fire({
                    icon: 'warning',
                    title: '¡Atención!',
                    text: data.message,
                    showCancelButton: true,
                    confirmButtonText: 'Ir a Login',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../auth/login.php';
                    }
                });
            } else if (data.success) {
                // Si todo salió bien
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: data.message,
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = `solicitud_resumen.php?id=${data.servicio_id}`;
                });
            } else {
                // Si hubo un error en el proceso
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message
                });
            }
        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un error al procesar la solicitud. Por favor, intenta nuevamente.'
            });
        }
    }
} 