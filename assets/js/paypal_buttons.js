paypal.Buttons({
    style: {
        layout: 'horizontal',
        height: 50
    },
    createOrder: function(data, actions) {
        // Obtener el precio dinámico del elemento con id 'costo_total'
        const amount = document.getElementById('costo_total').value;
        
        return actions.order.create({
            purchase_units: [{
                amount: { value: amount }
            }]
        });
    }
}).render('#paypal-button-container');