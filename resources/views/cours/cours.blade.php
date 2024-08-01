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
                                    <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Liste des cours :</h4>
                                    <button class="btn btn-primary rounded-pill ms-auto" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                                        <i class="fas fa-plus me-2"></i>
                                        Ajouter un cours
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm" id="myTable">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">Nom</th>
                                                <th scope="col">Niveau</th>
                                                <th scope="col">Prof</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Code du cours</th>
                                                <th scope="col" class="text-center">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <form action='#' method="post"> --}}
                                                @foreach ($courses as $c)
                                                    
                                            
                                                <tr>
                                                    <td>{{ $c->name }}</td>
                                                    <td>{{ $c->niveau->name }}</td>
                                                    <td>{{ \App\Models\User::find($c->teacher->user_id)->name }}</td>
                                                    <td>{{ $c->sesion->name }}</td>
                                                    <td>{{ $c->slug }}</td>
                                                    <td class="text-center">
                                                        <span>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="editCourse" data-bs-toggle="modal" data-bs-target="#editCourseModal{{ $c->id }}">
                                                                <i class="fa fa-edit text-success" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                            </button>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="deleteCourse" data-bs-toggle="modal" data-bs-target="#deleteCourseModal{{ $c->id }}">
                                                                <i class="fa fa-trash text-danger" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                            </button>
                                                            <a name="CourseDetails" href="{{ route('registerSTudentCourse',$c) }}">
                                                                <i class="fa fa-register" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px; color: gray;"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>

                                                       <!--**********************************
            edit prof modal start
        ***********************************-->
        <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCourseModalLabel">Modifier les informations du cours</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="teacherName" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Entrez le nom du cours" value="Physique appliquée" required>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Spécialité</label>
                                <select class="form-select" id="EditlevelName" name="EditLevelName" required>
                                <option>Licence 1</option>
                                <option>Licence 2</option>
                                <option>Licence 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Professeur</label>
                                <select class="form-select" id="editTeacherName" name="editTeacherName" required>
                                <option>Professeur 1</option>
                                <option>Professeur 2</option>
                                <option>Professeur 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Session</label>
                                <select class="form-select" id="editSessionName" name="editSessionName" required>
                                <option>Session 1</option>
                                <option>Session 2</option>
                                <option>Session 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">code du cours</label>
                                <input type="text" class="form-control" id="editCourseCode" name="editCourseCode" placeholder="Entrez le code du cours" value="PHY-1" required>
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
            edit prof modal end
        ***********************************-->

        <!--**********************************
            delete prof modal start
        ***********************************-->
        <div class="modal fade" id="deleteCourseModal{{ $c->id }}" tabindex="-1" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCourseModalLabel">Confirmer la suppression du cours</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST">
                        <div class="modal-body">
                            <h4 class=" text-danger">Êtes-vous sûr de vouloir supprimer ce cours?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            
                            <form action="{{ route('cours.destroy',$c) }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2 text-danger"></i>
                            Supprimer
                            </button>
                        </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--**********************************
            delete prof modal end
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
            Add prof modal start
        ***********************************-->
        <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCourseModalLabel">Ajouter un cours</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('cours.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="teacherName" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="courseName" name="name" placeholder="Entrez le nom du cours" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">Spécialité</label>
                                <select class="form-select" id="specialityName" name="specialityName" required>
                                    <option value="">Sélectionnez une spécialité</option>
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="levelName" class="form-label">Niveau</label>
                                <select class="form-select" id="levelName" name="niveau" required>
                                    <option value="">Sélectionnez un niveau</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Professeur</label>
                                <select class="form-select" id="teacherName" name="teacher" required>
                                <option value="">Selectionnez le professeur dispensant le cours</option>
                                @foreach ($teachers as $t)
                                    
                            
                                <option value="{{ $t->id }}">{{ \App\Models\User::find($t->user_id)->name }}</option>
                                    @endforeach
                                </select>
                                @error('teacher')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Session</label>
                                <select class="form-select" id="sessionName" name="session" required>
                                <option value="">Selectionnez la session</option>
                                @foreach ($sessions as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">code du cours</label>
                                <input type="text" class="form-control" id="courseCode" name="slug" placeholder="Entrez le code du cours" required>
                                @error('slug')
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
            Add prof modal end
        ***********************************-->
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
 

</x-layouts>