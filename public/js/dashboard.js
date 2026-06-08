// dashboard.js
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('salesChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin'],
            datasets: [{
                label: 'Ventes 6 dernier Mois',
                data: [1200000, 1900000, 3000000, 2500000, 3200000, 4000000],
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.2)',
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return value + ' Ar';
                        }
                    }
                }
            }
        }
    });
});
