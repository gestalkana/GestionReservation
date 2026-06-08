<x-app-layout>
    @section('title', 'Réservations')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-calendar-check-fill text-primary"></i>
                <span class="fw-semibold">Réservations</span>
            </div>

            <a href="{{ route('reservations.create') }}"
               class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Ajouter
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-2">

        <!-- Recherche -->
        <div class="mb-2">
            <form method="GET" action="{{ route('reservations.index') }}">
                <div class="input-group input-group-sm shadow-sm">

                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>

                    <input
                        type="text"
                        name="search"
                        class="form-control border-start-0"
                        placeholder="Client ou service..."
                        value="{{ request('search') }}"
                    >

                    @if(request('search'))
                        <a href="{{ route('reservations.index') }}"
                           class="btn btn-light border">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    @endif

                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="card border-0 shadow-sm">

            <div class="table-responsive">
                <table class="table table-hover table-sm align-middle mb-0">

                    <thead class="table-light">
                        <tr class="text-uppercase small text-muted">
                            <th>#</th>
                            <th>Client</th>
                            <th>Service</th>
                            <th class="d-none d-md-table-cell">Date</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($reservations as $reservation)

                            <tr>

                                <td class="text-muted small">
                                    {{ ($reservations->currentPage() - 1) * $reservations->perPage() + $loop->iteration }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $reservation->client->nom }}
                                </td>

                                <td>
                                    {{ $reservation->service->nom }}
                                </td>

                                <td class="d-none d-md-table-cell small text-muted">
                                    {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y H:i') }}
                                </td>

                                <td>
                                    @switch($reservation->status)

                                        @case('confirmee')
                                            <span class="badge bg-success">
                                                Confirmée
                                            </span>
                                            @break

                                        @case('annulee')
                                            <span class="badge bg-danger">
                                                Annulée
                                            </span>
                                            @break

                                        @case('terminee')
                                            <span class="badge bg-primary">
                                                Terminée
                                            </span>
                                            @break

                                        @default
                                            <span class="badge bg-warning text-dark">
                                                En attente
                                            </span>

                                    @endswitch
                                </td>

                                <td class="text-end">

                                    <div class="btn-group btn-group-sm">

                                        <a href="{{ route('reservations.show', $reservation) }}"
                                           class="btn btn-outline-info">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                      <!--   <a href="{{ route('reservations.edit', $reservation) }}"
                                           class="btn btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a> -->
                                        <button
                                            type="button"
                                            class="btn btn-outline-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editReservationModal{{ $reservation->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        @include('reservations.edit-modal')

                                        <form action="{{ route('reservations.destroy', $reservation) }}"
                                              method="POST"
                                              onsubmit="return confirm('Supprimer cette réservation ?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center text-muted py-4">

                                    <i class="bi bi-calendar-x d-block fs-4 mb-1"></i>

                                    Aucune réservation

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

        @if(method_exists($reservations, 'links'))
            <div class="mt-2 small">
                {{ $reservations->links() }}
            </div>
        @endif

    </div>
</x-app-layout>