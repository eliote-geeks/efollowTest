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
                                <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Liste des programmes de
                                    cours:</h4>
                                <button class="btn btn-primary rounded-pill ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addProgramModal">
                                    <i class="fas fa-plus me-2"></i>
                                    Ajouter un programme de cours
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm"
                                    id="myTable">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Jour</th>
                                            <th scope="col">Cours</th>
                                            <th scope="col">Heure de debut</th>
                                            <th scope="col">Heure de fin</th>
                                            <th scope="col" class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedules as $s)
                                            <tr>
                                                <td>{{ $s->day }}</td>
                                                <td>{{ $s->course->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($s->start_Hour)->format('H:i') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($s->end_Hour)->format('H:i') }}</td>
                                                <td class="text-center">
                                                    <span>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="submit" name="editProgram" data-bs-toggle="modal"
                                                            data-bs-target="#editProgramModal">
                                                            <i class="fa fa-edit text-success"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                        </button>
                                                        <button
                                                            style="border: none; text-decoration: none; background: none;"
                                                            type="submit" name="deleteProgram" data-bs-toggle="modal"
                                                            data-bs-target="#deleteProgramModal">
                                                            <i class="fa fa-trash text-danger"
                                                                style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                        </button>
                                        <a href="{{ route('schedule',$s) }}">Appel</a>
                                                    </span>
                                                </td>
                                            </tr>
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
            Add prof modal start
        ***********************************-->
    <div class="modal fade" id="addProgramModal" tabindex="-1" aria-labelledby="addProgramModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProgramModalLabel">Ajouter un programme de cours</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('program.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Jour</label>
                            <input type="text" class="form-control" id="programDate" name="day" required>
                            @error('day')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <input type="hidden" name="course" value="{{ $course }}">
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Heure de début</label>
                            <input type="time" class="form-control" id="programStartHour" name="start_hour"
                                required>
                                @error('start_hour')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Heure de fin</label>
                            <input type="time" class="form-control" id="programEndHour" name="end_hour"
                                required>
                                @error('end_hour')
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

    <!--**********************************
            edit prof modal start
        ***********************************-->
    <div class="modal fade" id="editProgramModal" tabindex="-1" aria-labelledby="editProgramModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProgramModalLabel">Modifier les informations de la session</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Jour</label>
                            <input type="date" class="form-control" id="editProgramDate" name="editProgramDate"
                                value="2025-01-14" required>
                        </div>
                        <div class="mb-3">
                            <label for="specialityType" class="form-label">Cours</label>
                            <select class="form-select" id="editCourseProgram" name="CourseProgram" required>
                                <option>Physique appliquée</option>
                                <option>Anglais</option>
                                <option>Maths</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Heure de début</label>
                            <input type="time" class="form-control" id="editProgramStartHour"
                                name="editProgramStartHour" value="10:30" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Heure de fin</label>
                            <input type="time" class="form-control" id="editProgramEndHour"
                                name="editProgramEndHour" value="14:30" required>
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
            edit prof modal end
        ***********************************-->

    <!--**********************************
            delete prof modal start
        ***********************************-->
    <div class="modal fade" id="deleteProgramModal" tabindex="-1" aria-labelledby="deleteProgramModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProgramModalLabel">Confirmer la suppression du programme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <h4 class=" text-danger">Êtes-vous sûr de vouloir supprimer ce programme?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2 text-danger"></i>
                            Supprimer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--**********************************
            delete prof modal end
        ***********************************-->

</x-layouts>
