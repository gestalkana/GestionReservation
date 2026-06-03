<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-calendar-week text-primary fs-4"></i>
            <h1 class="h5 fw-bold mb-0 text-dark">Planning des Réservations & Événements</h1>
        </div>
    </x-slot>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-3">
            <div id="calendar" class="small-calendar"></div>
        </div>

        <div class="card-footer bg-light border-0 text-center py-3">
            <div class="text-center">
                <button class="btn btn-sm btn-outline-secondary mb-2" data-bs-toggle="collapse" data-bs-target="#legendCollapse">
                    <i class="bi bi-eye"></i> Légende
                </button>
            </div>
            <div id="legendCollapse" class="collapse show">
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <span class="badge rounded-pill bg-success">
                        <i class="bi bi-check-circle me-1"></i> Réservation confirmée
                    </span>
                    <span class="badge rounded-pill bg-warning text-dark">
                        <i class="bi bi-hourglass-split me-1"></i> Réservation en attente
                    </span>
                    <span class="badge rounded-pill bg-secondary">
                        <i class="bi bi-archive me-1"></i> Historique
                    </span>
                    <span class="badge rounded-pill bg-info text-dark">
                        <i class="bi bi-clipboard-check me-1"></i> Tâche interne
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton flottant -->
    <button class="btn btn-violet btn-floating shadow" onclick="addQuickEvent()">
        <i class="bi bi-plus-lg"></i>
    </button>

    @push('styles')
        <!-- CDN FullCalendar -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
        <!-- CSS personnalisé -->
        <link href="{{ asset('css/planning/index.css') }}" rel="stylesheet">
    @endpush

    @push('scripts')
        <!-- CDN FullCalendar -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
        <!-- JS personnalisé -->
        <script src="{{ asset('js/planning/planning.js') }}"></script>
    @endpush
</x-app-layout>
