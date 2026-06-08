<div class="modal fade"
     id="editReservationModal{{ $reservation->id }}"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <form action="{{ route('reservations.update', $reservation) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">
                        Modifier la réservation
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Client -->
                    <div class="mb-2">
                        <label class="form-label">Client</label>
                        <select name="client_id" class="form-select form-select-sm">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}"
                                    @selected($client->id == $reservation->client_id)>
                                    {{ $client->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Service -->
                    <div class="mb-2">
                        <label class="form-label">Service</label>
                        <select name="service_id" class="form-select form-select-sm">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}"
                                    @selected($service->id == $reservation->service_id)>
                                    {{ $service->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="mb-2">
                        <label class="form-label">Date réservation</label>
                        <input type="datetime-local"
                               name="reservation_date"
                               class="form-control form-control-sm"
                               value="{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('Y-m-d\TH:i') }}">
                    </div>

                    <!-- Status -->
                    <div class="mb-2">
                        <label class="form-label">Statut</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="en_attente" @selected($reservation->status == 'en_attente')>En attente</option>
                            <option value="confirmee" @selected($reservation->status == 'confirmee')>Confirmée</option>
                            <option value="annulee" @selected($reservation->status == 'annulee')>Annulée</option>
                            <option value="terminee" @selected($reservation->status == 'terminee')>Terminée</option>
                        </select>
                    </div>

                    <!-- Note -->
                    <div class="mb-2">
                        <label class="form-label">Note</label>
                        <textarea name="note"
                                  class="form-control form-control-sm"
                                  rows="3">{{ $reservation->note }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-light"
                            data-bs-dismiss="modal">
                        Annuler
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        Enregistrer
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>