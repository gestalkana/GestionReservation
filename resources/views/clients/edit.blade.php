<div class="modal fade"
     id="editClientModal{{ $client->id }}"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form action="{{ route('clients.update', $client) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-pencil-square me-2"></i>
                        Modifier le client
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Nom *</label>
                            <input type="text"
                                   name="nom"
                                   class="form-control"
                                   value="{{ old('nom', $client->nom) }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Prénom</label>
                            <input type="text"
                                   name="prenom"
                                   class="form-control"
                                   value="{{ old('prenom', $client->prenom) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">
                                Date de naissance *
                            </label>

                            <input type="date"
                                   name="date_naissance"
                                   class="form-control"
                                   value="{{ old('date_naissance', optional($client->date_naissance)->format('Y-m-d')) }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Age</label>
                            <input type="text"
                                   name="telephone"
                                   class="form-control"
                                   value="{{ \Carbon\Carbon::parse($client->date_naissance)->age }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Téléphone</label>
                            <input type="text"
                                   name="telephone"
                                   class="form-control"
                                   value="{{ old('telephone', $client->telephone) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email', $client->email) }}">
                        </div>

                        <!-- <div class="col-md-6">
                            <label class="form-label">Photo</label>
                            <input type="file"
                                   name="photo"
                                   class="form-control">

                            @if($client->photo)
                                <small class="text-muted d-block mt-1">
                                    Photo actuelle :
                                </small>

                                <img src="{{ asset('storage/'.$client->photo) }}"
                                     class="rounded border mt-1"
                                     width="80">
                            @endif
                        </div> -->

                        <div class="col-12">
                            <label class="form-label">Adresse</label>

                            <textarea name="adresse"
                                      rows="3"
                                      class="form-control">{{ old('adresse', $client->adresse) }}</textarea>
                        </div>

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
                        <i class="bi bi-check-lg me-1"></i>
                        Enregistrer
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>