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
                                            <form action='#' method="post">
                                                <tr>
                                                    <td>Physique appliquée</td>
                                                    <td>Licence 2</td>
                                                    <td>Professeur 1</td>
                                                    <td>Session 1</td>
                                                    <td>PHY-1</td>
                                                    <td class="text-center">
                                                        <span>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="editCourse" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                                                                <i class="fa fa-edit text-success" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                            </button>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="deleteCourse" data-bs-toggle="modal" data-bs-target="#deleteCourseModal">
                                                                <i class="fa fa-trash text-danger" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                            </button>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="CourseDetails" data-bs-toggle="modal" data-bs-target="#detailsCourseModal">
                                                                <i class="fa fa-eye" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px; color: gray;"></i>
                                                            </button>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </form>
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
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="teacherName" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Entrez le nom du cours" required>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Spécialité</label>
                                <select class="form-select" id="levelName" name="levelName" required>
                                <option value="">Selectionnez le niveau</option>
                                <option>Licence 1</option>
                                <option>Licence 2</option>
                                <option>Licence 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Professeur</label>
                                <select class="form-select" id="teacherName" name="teacherName" required>
                                <option value="">Selectionnez le professeur dispensant le cours</option>
                                <option>Professeur 1</option>
                                <option>Professeur 2</option>
                                <option>Professeur 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Session</label>
                                <select class="form-select" id="sessionName" name="sessionName" required>
                                <option value="">Selectionnez la session</option>
                                <option>Session 1</option>
                                <option>Session 2</option>
                                <option>Session 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">code du cours</label>
                                <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="Entrez le code du cours" required>
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
        <div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
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