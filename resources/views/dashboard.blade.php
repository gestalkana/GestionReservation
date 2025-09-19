<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-speedometer2 me-2 text-primary fs-4"></i>
            <h1 class="h5 fw-bold mb-0 text-dark">Tableau de bord</h1>
        </div>
    </x-slot>

    <div class="row">
        <!-- Statistiques -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-3 rounded-4">
                <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-people-fill text-primary me-1"></i> Utilisateurs</span>
                    <span class="badge bg-success-subtle text-success small">+12%</span>
                </div>
                <h3 class="fw-bold text-primary">1,245</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-3 rounded-4">
                <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-bag-check-fill text-success me-1"></i> Commandes</span>
                    <span class="badge bg-danger-subtle text-danger small">-3%</span>
                </div>
                <h3 class="fw-bold text-success">320</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-3 rounded-4">
                <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-currency-dollar text-warning me-1"></i> Revenus</span>
                    <span class="badge bg-success-subtle text-success small">+8%</span>
                </div>
                <h3 class="fw-bold text-warning">$12,540</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-3 rounded-4">
                <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-life-preserver text-danger me-1"></i> Tickets</span>
                    <span class="badge bg-secondary-subtle text-muted small">En attente</span>
                </div>
                <h3 class="fw-bold text-danger">27</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Graphique -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white fw-semibold border-bottom-0">📊 Évolution des ventes</div>
                <div class="card-body">
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Derniers utilisateurs -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white fw-semibold border-bottom-0">👥 Derniers utilisateurs</div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="small">Nom</th>
                                <th class="small">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Jean Dupont</td><td>jean@example.com</td></tr>
                            <tr><td>Marie Curie</td><td>marie@example.com</td></tr>
                            <tr><td>Ali Baba</td><td>ali@example.com</td></tr>
                            <tr><td>Sophie Martin</td><td>sophie@example.com</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Ventes',
                    data: [1200, 1900, 3000, 2500, 3200, 4000],
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
                                return '$' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
