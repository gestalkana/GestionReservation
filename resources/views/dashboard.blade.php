<x-app-layout>
    <x-slot name="header">
          <div class="d-flex align-items-center gap-2">
           <i class="bi bi-speedometer2 me-2 text-primary fs-4"></i>
            <h1 class="h5 fw-bold mb-0 text-dark">Tableau de bord</h1>
        </div>
    </x-slot>

    <div class="row">
        <!-- Statistiques -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 text-center p-3">
                <h6 class="text-muted">Utilisateurs</h6>
                <h2 class="fw-bold text-primary">1,245</h2>
                <small class="text-success">+12% ce mois</small>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 text-center p-3">
                <h6 class="text-muted">Commandes</h6>
                <h2 class="fw-bold text-success">320</h2>
                <small class="text-danger">-3% ce mois</small>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 text-center p-3">
                <h6 class="text-muted">Revenus</h6>
                <h2 class="fw-bold text-warning">$12,540</h2>
                <small class="text-success">+8% ce mois</small>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 text-center p-3">
                <h6 class="text-muted">Tickets Support</h6>
                <h2 class="fw-bold text-danger">27</h2>
                <small class="text-muted">En attente</small>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Graphique -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Évolution des ventes</div>
                <div class="card-body">
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Tableau -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Derniers utilisateurs</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
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
</x-app-layout>

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
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: true } },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
