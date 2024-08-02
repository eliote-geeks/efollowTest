<x-layouts>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Liste des étudiants :</h4>
                                <button class="btn btn-primary rounded-pill ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addStudentModal">
                                    <i class="fas fa-plus me-2"></i>
                                    Ajouter un étudiant
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm"
                                    id="myTable">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Nom complet</th>
                                            <th scope="col">Matricule</th>
                                            <th scope="col">Date de naissance</th>
                                            <th scope="col">Niveau</th>
                                            <th scope="col">Spécialité</th>
                                            <th scope="col" class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $s)
                                            <tr>
                                                <td>{{ $s->firstName }}</td>
                                                <td>{{ $s->matricular }}</td>
                                                <td>{{ $s->birth_date }}</td>
                                                <td>{{ $s->niveau->name }}</td>
                                                <td>{{ $s->niveau->specialite->name }}</td>
                                                <td class="text-center">
                                                    <span>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editStudentModal{{ $s->id }}">
                                                            <i class="fa fa-edit text-success"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                        </button>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#deleteStudentModal{{ $s->id }}">
                                                            <i class="fa fa-trash text-danger"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                        </button>
                                                        <a style="border: none; text-decoration: none; background: none;"
                                                            href="{{ route('see', $s) }}">
                                                            <i class="fa fa-eye"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px; color: gray;"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>

                                            <!-- Edit Student Modal -->
                                            <div class="modal fade" id="editStudentModal{{ $s->id }}"
                                                tabindex="-1" aria-labelledby="editStudentModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editStudentModalLabel">Modifier
                                                                les informations de l'étudiant</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('etudiant.update', $s->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row mb-3">
                                                                    <label for="profile-image" class="d-block">
                                                                        <img id="profile-image-preview"
                                                                            src="{{ \App\Models\User::findOrFail($s->user_id)->profile_photo_url }}"
                                                                            style="height: 100px; width: 100px;"
                                                                            class="img-thumbnail"
                                                                            style="cursor: pointer;">
                                                                        <p class="mt-2 font-weight-bold">Photo de
                                                                            l'étudiant</p>
                                                                    </label>
                                                                    <input type="file" id="profile-image"
                                                                        class="d-none" accept="image/*"
                                                                        name="editStudentImage">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="editStudentName" class="form-label">Nom
                                                                        complet</label>
                                                                    <input type="text" class="form-control"
                                                                        id="editStudentName" name="name"
                                                                        placeholder="Entrez le nom complet de l'étudiant"
                                                                        value="{{ $s->firstName }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="editStudentBirthday"
                                                                        class="form-label">Date de naissance</label>
                                                                    <input type="date" class="form-control"
                                                                        id="editStudentBirthday" name="birth_date"
                                                                        value="{{ $s->birth_date }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="editStudentMatricule"
                                                                        class="form-label">Matricule</label>
                                                                    <input type="text" class="form-control"
                                                                        id="editStudentMatricule" name="matricular"
                                                                        placeholder="Entrez le matricule de l'étudiant"
                                                                        value="{{ $s->matricular }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="specialityName"
                                                                        class="form-label">Spécialité</label>
                                                                    <select class="form-select" id="specialityName1"
                                                                        name="specialityName" required>
                                                                        <option value="">Sélectionnez une
                                                                            spécialité</option>
                                                                        @foreach ($specialities as $speciality)
                                                                            <option value="{{ $speciality->id }}">
                                                                                {{ $speciality->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="levelName"
                                                                        class="form-label">Niveau</label>
                                                                    <select class="form-select" id="levelName1"
                                                                        name="niveau" required>
                                                                        <option value="">Sélectionnez un niveau
                                                                        </option>
                                                                    </select>
                                                                    <b>Actuel: {{ $s->niveau->name }}</b>
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

                                            <!-- Delete Student Modal -->
                                            <div class="modal fade" id="deleteStudentModal{{ $s->id }}"
                                                tabindex="-1" aria-labelledby="deleteStudentModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteStudentModalLabel">
                                                                Confirmer la suppression du compte de l'étudiant</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <h4 class="text-danger">Êtes-vous sûr de vouloir supprimer
                                                                ce compte?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annuler</button>

                                                            <form action="{{ route('etudiant.destroy', $s) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fas fa-trash me-2 text-danger"></i>
                                                                    Supprimer
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Student Modal -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Ajouter un étudiant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#addInfos">Remplir les informations</button>
                            </li>
                             <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#addCarte">Attribuer une carte</button>
                            </li> 
                        </ul> --}}

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="addInfos">
                                <form action="{{ route('etudiant.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="studentName" class="form-label">Nom complet</label>
                                        <input type="text" class="form-control" id="studentName" name="name"
                                            placeholder="Entrez le nom complet de l'étudiant" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="studentBirthday" class="form-label">Date de naissance</label>
                                        <input type="date" class="form-control" id="studentBirthday"
                                            name="birth_date" required>
                                        @error('birth_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="specialityName" class="form-label">Spécialité</label>
                                        <select class="form-select" id="specialityName" name="specialityName"
                                            required>
                                            <option value="">Sélectionnez une spécialité</option>
                                            @foreach ($specialities as $speciality)
                                                <option value="{{ $speciality->id }}">{{ $speciality->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="levelName" class="form-label">Niveau</label>
                                        <select class="form-select" id="levelName" name="niveau" required>
                                            <option value="">Sélectionnez un niveau</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('specialityName').addEventListener('change', function() {
                    var specialityId = this.value;
                    var levelSelect = document.getElementById('levelName');
                    levelSelect.innerHTML = '<option value="">Sélectionnez un niveau</option>';

                    if (specialityId) {
                        fetch(`/levels/${specialityId}`)
                            .then(response => response.json())
                            .then(data => {
                                for (const [id, name] of Object.entries(data)) {
                                    var option = document.createElement('option');
                                    option.value = id;
                                    option.textContent = name;
                                    levelSelect.appendChild(option);
                                }
                            });
                    }
                });
            });
        </script>
    </div>
</x-layouts>
