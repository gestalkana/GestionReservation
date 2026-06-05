<div class="modal fade"
     id="editPhotoModal{{ $client->id }}"
     tabindex="-1"
     aria-labelledby="editPhotoModalLabel{{ $client->id }}"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form action="{{ route('clients.update.photo', $client->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title"
                        id="editPhotoModalLabel{{ $client->id }}">
                        Modifier la photo
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                <div class="modal-body">

            <div class="d-flex justify-content-center mb-3">
                @if($client->photo)
                    <img src="{{ asset('storage/' . $client->photo) }}"
                         class="rounded-circle shadow-sm"
                         style="width:120px;height:120px;object-fit:cover;">
                @else
                    <i class="bi bi-person-circle text-secondary"
                       style="font-size: 5rem;"></i>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Nouvelle photo</label>
                <input type="file"
                       name="photo"
                       class="form-control"
                       accept="image/*"
                       required>
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