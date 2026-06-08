<x-app-layout>
    @section('title', 'Créer réservation')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">

            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-calendar-plus text-primary"></i>
                <span class="fw-semibold">Nouvelle réservation</span>
            </div>

            <a href="{{ route('reservations.index') }}"
               class="btn btn-sm btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Retour
            </a>

        </div>
    </x-slot>

    <div class="container-fluid py-2">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">

                        <!-- Client -->
                        <div class="col-md-6">
                            <label class="form-label">Client</label>
                            <select name="client_id" class="form-select form-select-sm" required>
                                <option value="">-- Choisir client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Service -->
                        <div class="col-md-6">
                            <label class="form-label">Service</label>
                            <select name="service_id" class="form-select form-select-sm" required>
                                <option value="">-- Choisir service --</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Date réservation -->
                        <div class="col-md-6">
                            <label class="form-label">Date & heure</label>
                            <input type="datetime-local"
                                   name="reservation_date"
                                   class="form-control form-control-sm"
                                   required>
                        </div>

                        <!-- Statut -->
                        <div class="col-md-6">
                            <label class="form-label">Statut</label>
                            <select name="status" class="form-select form-select-sm">
                                <option value="en_attente" selected>En attente</option>
                                <option value="confirmee">Confirmée</option>
                                <option value="annulee">Annulée</option>
                                <option value="terminee">Terminée</option>
                            </select>
                        </div>

                        <!-- Note -->
                        <div class="col-12">
                            <label class="form-label">Note</label>
                            <textarea name="note"
                                      class="form-control form-control-sm"
                                      rows="3"
                                      placeholder="Optionnel..."></textarea>
                        </div>

                    </div>

                    <div class="mt-3 d-flex justify-content-end gap-2">

                        <a href="{{ route('reservations.index') }}"
                           class="btn btn-light btn-sm">
                            Annuler
                        </a>

                        <button type="submit"
                                class="btn btn-primary btn-sm">
                            Enregistrer
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>