<div class="modal fade"
     id="editServiceModal{{ $service->id }}"
     tabindex="-1"
     aria-labelledby="editServiceModalLabel{{ $service->id }}"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('services.update', $service) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title"
                        id="editServiceModalLabel{{ $service->id }}">
                        Modifier le service
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nom</label>

                        <input type="text"
                               name="nom"
                               class="form-control"
                               value="{{ old('nom', $service->nom) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type de service</label>

                        <select name="service_type_id"
                                class="form-select"
                                required>

                            @foreach($service_types as $type)
                                <option value="{{ $type->id }}"
                                    @selected($service->service_type_id == $type->id)>
                                    {{ $type->nom }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="4">{{ old('description', $service->description) }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
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

