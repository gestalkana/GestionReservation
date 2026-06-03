<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-speedometer2 me-2 text-primary fs-4"></i>
            <h1 class="h5 fw-bold mb-0 text-dark">Tableau de bord</h1>
        </div>
    </x-slot>
    
    <div class="row">
        <!-- Réservations du jour -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-3 rounded-4">
                <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-calendar-day text-primary me-1"></i> Réservations du jour</span>
                    <span class="badge bg-success-subtle text-success small">+5%</span>
                </div>
                <h3 class="fw-bold text-primary">58</h3>
            </div>
        </div>

        <!-- Réservations en attente -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-3 rounded-4">
                <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-hourglass-split text-warning me-1"></i> En attente</span>
                    <span class="badge bg-warning-subtle text-warning small">-2%</span>
                </div>
                <h3 class="fw-bold text-warning">14</h3>
            </div>
        </div>

        <!-- Réservations confirmées -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-3 rounded-4">
                <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-check-circle-fill text-success me-1"></i> Confirmées</span>
                    <span class="badge bg-success-subtle text-success small">+10%</span>
                </div>
                <h3 class="fw-bold text-success">312</h3>
            </div>
        </div>

        <!-- Réservations annulées -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-3 rounded-4">
                <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-x-circle-fill text-danger me-1"></i> Annulées</span>
                    <span class="badge bg-danger-subtle text-danger small">+1%</span>
                </div>
                <h3 class="fw-bold text-danger">7</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Graphique -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white fw-semibold border-bottom-0">📊 Évolution des reservations</div>
                <div class="card-body">
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Derniers reservation -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-header bg-white fw-semibold border-bottom-0">
                     <i class="bi bi-calendar-check me-2 sidebar-icon"></i> Réservations récentes
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="small">Client</th>
                                <th class="small">Date</th>
                                <th class="small">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jean Dupont</td>
                                <td>22/09/2025</td>
                                <td><span class="badge bg-success-subtle text-success">Confirmée</span></td>
                            </tr>
                            <tr>
                                <td>Marie Curie</td>
                                <td>22/09/2025</td>
                                <td><span class="badge bg-warning-subtle text-warning">En attente</span></td>
                            </tr>
                            <tr>
                                <td>Ali Baba</td>
                                <td>21/09/2025</td>
                                <td><span class="badge bg-danger-subtle text-danger">Annulée</span></td>
                            </tr>
                            <tr>
                                <td>Sophie Martin</td>
                                <td>20/09/2025</td>
                                <td><span class="badge bg-success-subtle text-success">Confirmée</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

     @push('scripts')
        <!-- Chart.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- JS du dashboard -->
        <script src="{{ asset('js/dashboard.js') }}"></script>
    @endpush
</x-app-layout>
