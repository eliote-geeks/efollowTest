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
                                <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Liste des niveaux :</h4>
                                <button class="btn btn-primary rounded-pill ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addLevelModal">
                                    <i class="fas fa-plus me-2"></i>
                                    Ajouter un niveau
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm"
                                    id="myTable">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Nom du niveau</th>
                                            <th scope="col">Spécialité</th>
                                            <th scope="col" class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <form action='#' method="post"> --}}
                                        @foreach ($niveaux as $n)
                                            <tr>
                                                <td>{{ $n->name }}</td>
                                                <td>{{ $n->specialite->name }}</td>
                                                <td class="text-center">
                                                    <span>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="submit" name="editLevel" data-bs-toggle="modal"
                                                            data-bs-target="#editLevelModal{{ $n->id }}">
                                                            <i class="fa fa-edit text-success"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                        </button>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="submit" name="deleteLevel" data-bs-toggle="modal"
                                                            data-bs-target="#deleteLevelModal{{ $n->id }}">
                                                            <i class="fa fa-trash text-danger"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                        </button>
                                                    </span>
                                                </td>
                                            </tr>

                                                <!--**********************************
            edit level modal start
        ***********************************-->
    <div class="modal fade" id="editLevelModal{{ $n->id }}" tabindex="-1" aria-labelledby="editLevelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLevelModalLabel">Modifier le niveau</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('niveau.update',$n) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="specialityName" class="form-label">Nom du niveau</label>
                            <input type="text" class="form-control" id="editLevelName" name="name"
                                placeholder="Entrez le nom du niveau" value="{{ $n->name }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="specialityType" class="form-label">Spécialité</label>
                            <select class="form-select" id="editSpecialityLevel" name="editSpecialityLevel" required>
                                @foreach ($specialites as $sp)
                                <option @if($sp->id == $n->specialite->id) selected @endif value="{{ $sp->id }}">{{ $sp->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            edit level modal end
        ***********************************-->

    <!--**********************************
            delete level modal start
        ***********************************-->
    <div class="modal fade" id="deleteLevelModal{{ $n->id }}" tabindex="-1" aria-labelledby="deleteLevelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLevelModalLabel">Confirmer la suppression du niveau</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <form action="#" method="POST"> --}}
                    @csrf
                    <div class="modal-body">
                        <h4 class=" text-danger">Êtes-vous sûr de vouloir supprimer ce niveau ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <form action="{{ route('niveau.destroy',$n) }}" method="post"></form>
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
            delete level modal end
        ***********************************-->


                                        @endforeach
                                        {{-- </form> --}}
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
            Add level modal start
        ***********************************-->
    <div class="modal fade" id="addLevelModal" tabindex="-1" aria-labelledby="addLevelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLevelModalLabel">Ajouter un niveau</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('niveau.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="specialityName" class="form-label">Nom du niveau</label>
                            <input type="text" class="form-control" id="levelName" name="name"
                                placeholder="Entrez le nom du niveau" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="specialityType" class="form-label">Spécialité</label>
                            <select class="form-select" id="specialityName" name="specialite" required>
                                <option value="">Sélectionnez une spécialité</option>
                                @foreach ($specialites as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                                @endforeach
                            </select>
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
            Add level modal end
        ***********************************-->


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json"
                },
                "dom": '<"d-flex justify-content-between align-items-center mb-3"<"d-flex align-items-center"l><"d-flex align-items-center"f>>t<"d-flex justify-content-between align-items-center"ip>'
            });
        });
    </script>

</x-layouts>
