class PriceCalculator {
    constructor() {
        this.basePrice = 50000;
        this.pricePerKm = 2000;
    }

    calculatePrice(distanceKm, cylinderCapacity) {
        let cilindrajeExtra = 0;
        
        // Convertir distanceKm a número si es string
        distanceKm = parseFloat(distanceKm) || 0;

        // Agregar costo adicional según el cilindraje
        if (cylinderCapacity <= 200) {
            cilindrajeExtra = 10000;
        } else if (cylinderCapacity <= 500) {
            cilindrajeExtra = 20000;
        } else if (cylinderCapacity <= 800) {
            cilindrajeExtra = 30000;
        } else {
            cilindrajeExtra = 40000;
        }

        const totalPrice = this.basePrice + (distanceKm * this.pricePerKm) + cilindrajeExtra;

        console.log('Cálculo de precio:', {
            basePrice: this.basePrice,
            distanceKm: distanceKm,
            pricePerKm: this.pricePerKm,
            cylinderCapacity: cylinderCapacity,
            cilindrajeExtra: cilindrajeExtra,
            totalPrice: totalPrice
        });

        return totalPrice;
    }

    formatPrice(price) {
        return `$${Math.round(price).toLocaleString('es-CO')}`;
    }
} 