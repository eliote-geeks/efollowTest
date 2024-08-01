<base href="/">
<x-layouts>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Liste des sessions :</h4>
                                <button class="btn btn-primary rounded-pill ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addSessionModal">
                                    <i class="fas fa-plus me-2"></i>
                                    Ajouter une session
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm"
                                    id="myTable">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Nom</th>
                                            <th scope="col">Date de début</th>
                                            <th scope="col">Date de fin</th>
                                            <th scope="col" class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sessions as $s)
                                            <tr>
                                                <td>{{ $s->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($s->start)->format('d, M Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($s->end)->format('d, M Y') }}</td>
                                                <td class="text-center">
                                                    <span>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="submit" name="editSession" data-bs-toggle="modal"
                                                            data-bs-target="#editSessionModal{{ $s->id }}">
                                                            <i class="fa fa-edit text-success"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                        </button>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="submit" name="deleteSession" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSessionModal{{ $s->id }}">
                                                            <i class="fa fa-trash text-danger"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                        </button>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="submit" name="studentSession" data-bs-toggle="modal"
                                                            data-bs-target="#detailsSessionModal">
                                                            <i class="fa fa-eye"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px; color: gray;"></i>
                                                        </button>
                                                    </span>
                                                </td>
                                            </tr>

                                            <!--**********************************
            edit session modal start
        ***********************************-->
                                            <div class="modal fade" id="editSessionModal{{ $s->id }}"
                                                tabindex="-1" aria-labelledby="editSessionModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editSessionModalLabel">Modifier
                                                                les informations de la session</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('session.update', $s) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="teacherName"
                                                                        class="form-label">Nom</label>
                                                                    <input type="text" class="form-control"
                                                                        id="editSessionName" name="name"
                                                                        placeholder="Entrez le nom de la session"
                                                                        value="{{ $s->name }}" required>
                                                                    @error('name')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="teacherName" class="form-label">Date de
                                                                        début</label>
                                                                    <input type="date" class="form-control"
                                                                        id="editSessionStartDate"
                                                                        name="editSessionStartDate"
                                                                        value="{{ $s->start }}" required>
                                                                    @error('start')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="teacherName" class="form-label">Date de
                                                                        fin</label>
                                                                    <input type="date" class="form-control"
                                                                        id="editSessionEndDate"
                                                                        name="editSessionEndDate" value="{{ $s->end }}"
                                                                        required>
                                                                    @error('end')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Modifier</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--**********************************
            edit session modal end
        ***********************************-->

                                            <!--**********************************
            delete session modal start
        ***********************************-->
                                            <div class="modal fade" id="deleteSessionModal{{ $s->id }}"
                                                tabindex="-1" aria-labelledby="deleteSessionModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteSessionModalLabel">
                                                                Confirmer la suppression de la session</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        {{-- :               <form action="#" method="POST"> --}}
                                                        <div class="modal-body">
                                                            <h4 class=" text-danger">Êtes-vous sûr de vouloir supprimer
                                                                cette session?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('session.destroy', $s) }}"
                                                                method="post"></form>
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash me-2 text-danger"></i>
                                                                Supprimer
                                                            </button>
                                                        </div>
                                                        {{-- </form> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!--**********************************
            delete session modal end
        ***********************************-->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Add session modal start
        ***********************************-->
    <div class="modal fade" id="addSessionModal" tabindex="-1" aria-labelledby="addSessionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSessionModalLabel">Ajouter une session</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('session.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="sessionName" name="name"
                                placeholder="Entrez le nom de la session" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Date de début</label>
                            <input type="date" class="form-control" id="sessionStartDate" name="start"
                                required>
                                @error('start')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Date de fin</label>
                            <input type="date" class="form-control" id="sessionEndDate" name="end"
                                required>
                                @error('end')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Add session modal end
        ***********************************-->


</x-layouts>
