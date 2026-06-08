<x-app-layout>
    @section('title', 'Détail réservation')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">

            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-calendar-check-fill text-primary"></i>
                <span class="fw-semibold">Détail de la réservation</span>
            </div>

            <div class="d-flex gap-2">

                <!-- Bouton modifier (modal) -->
                <button class="btn btn-sm btn-warning"
                        data-bs-toggle="modal"
                        data-bs-target="#editReservationModal{{ $reservation->id }}">
                    <i class="bi bi-pencil me-1"></i>
                    Modifier
                </button>

                <!-- Retour -->
                <a href="{{ route('reservations.index') }}"
                   class="btn btn-sm btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>
                    Retour
                </a>

            </div>

        </div>
    </x-slot>

    <div class="container-fluid py-2">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="row g-3">

                    <!-- Client -->
                    <div class="col-md-6">
                        <div class="text-muted small">Client</div>
                        <div class="fw-semibold">
                            {{ $reservation->client->nom }}
                        </div>
                    </div>

                    <!-- Service -->
                    <div class="col-md-6">
                        <div class="text-muted small">Service</div>
                        <div class="fw-semibold">
                            {{ $reservation->service->nom }}
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="col-md-6">
                        <div class="text-muted small">Date de réservation</div>
                        <div>
                            {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <div class="text-muted small">Statut</div>

                        @switch($reservation->status)

                            @case('confirmee')
                                <span class="badge bg-success">Confirmée</span>
                                @break

                            @case('annulee')
                                <span class="badge bg-danger">Annulée</span>
                                @break

                            @case('terminee')
                                <span class="badge bg-primary">Terminée</span>
                                @break

                            @default
                                <span class="badge bg-warning text-dark">En attente</span>

                        @endswitch
                    </div>

                    <!-- Note -->
                    <div class="col-12">
                        <div class="text-muted small">Note</div>
                        <div>
                            {{ $reservation->note ?? 'Aucune note' }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- MODAL EDIT -->
        @include('reservations.edit-modal')

    </div>

</x-app-layout>