<base href="/">
<x-layouts>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Liste des étudiants pour {{ $course->name }}:</h4>
                               
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
                                                <td>{{ $s->student->firstName }}</td>
                                                <td>{{ $s->student->matricular }}</td>
                                                <td>{{ $s->student->birth_date }}</td>
                                                <td>{{ $s->student->niveau->name }}</td>
                                                <td>{{ $s->student->niveau->specialite->name }}</td>
                                                <td class="text-center">
                                                    <span>
                                                      
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

                                            <!-- Delete Student Modal -->
                                            <div class="modal fade" id="deleteStudentModal{{ $s->id }}"
                                                tabindex="-1" aria-labelledby="deleteStudentModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteStudentModalLabel">
                                                                Confirmer la suppression de l'étudiant: <b>{{ $s->student->firstName }}</b> de ce cours </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <h4 class="text-danger">Êtes-vous sûr de vouloir supprimer
                                                                ce compte de ce cours?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annuler</button>

                                                                <a href="{{ route('studentCourseRemove', $s) }}" class="btn btn-danger">
                                                                    <i class="fas fa-trash me-2 text-danger"></i>
                                                                    Supprimer
                                                                </a>
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
    </div>
</x-layouts>
