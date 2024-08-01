
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
                                    <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Liste des étudiants :</h4>
                                    <button class="btn btn-primary rounded-pill ms-auto" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                        <i class="fas fa-plus me-2"></i>
                                        Ajouter un étudiant
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm" id="myTable">
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
                                            <form action='#' method="post">
                                                <tr>
                                                    <td>Etudiant 1</td>
                                                    <td>FGHJJYUKK</td>
                                                    <td>18/09/2008</td>
                                                    <td>Licence 1</td>
                                                    <td>Physique appliquée</td>
                                                    <td class="text-center">
                                                        <span>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="editStudent" data-bs-toggle="modal" data-bs-target="#editStudentModal">
                                                                <i class="fa fa-edit text-success" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                            </button>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="deleteStudent" data-bs-toggle="modal" data-bs-target="#deleteStudentModal">
                                                                <i class="fa fa-trash text-danger" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                            </button>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="studentDetails" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
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
            Add student modal start
        ***********************************-->
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Ajouter un étudiant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#addInfos">Remplir les informations</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#addCarte">Attribuer une carte</button>
                            </li>

                        </ul>
                        <!-- Fin Menu de navigation -->

                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="addInfos">

                                <form action="#" method="POST">
                                <div class="row mb-3">
                                    <label for="profile-image" class="d-block">
                                        <img id="profile-image-preview" src="../images/blank_image.jpg" style="height: 100px; width: 100px;" class="img-thumbnail" style="cursor: pointer;">
                                        <p class="mt-2 font-weight-bold">Photo de l'étudiant</p>
                                    </label>
                                    <input type="file" id="profile-image" class="d-none" accept="image/*" name="studentImage">
                                </div>
                                <div class="mb-3">
                                    <label for="specialityName" class="form-label">Nom complet</label>
                                    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Entrez le nom complet de l'étudiant" required>
                                </div>
                                <div class="mb-3">
                                    <label for="specialityName" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" id="studentBirthday" name="studentBirthday" required>
                                </div>
                                <div class="mb-3">
                                    <label for="specialityName" class="form-label">Matricule</label>
                                    <input type="text" class="form-control" id="studentMatricule" name="studentMatricule" placeholder="Entrez le matricule de l'étudiant" required>
                                </div>
                                <div class="mb-3">
                                    <label for="specialityType" class="form-label">Spécialité</label>
                                    <select class="form-select" id="specialityName" name="specialityName" required>
                                    <option value="">Sélectionnez une spécialité</option>
                                    <option>Mécanique</option>
                                    <option>Design graphique</option>
                                    <option>Physique appliquée</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="specialityType" class="form-label">Niveau</label>
                                    <select class="form-select" id="levelName" name="levelName" required>
                                    <option value="">Sélectionnez un niveau</option>
                                    <option>Licence 1</option>
                                    <option>Licence 2</option>
                                    <option>Licence 3</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                                
                            </div>

                            <div class="tab-pane fade pt-3" id="addCarte">
                                
                             <!-- Attribuer une carte au compte -->

                                <div class="" style="font-weight: bold; color: gray;">

                                    <!-- Profile Edit Form -->
                                    <form action="#" method="post" id="account-form">

                                        <div class="centered-div ">
                                        <div class="form-floating mb-3">
                                            <center>  
                                            <div class="spinner-grow text-primary" style="width: 7rem; height: 7rem;">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            </center>
                                        </div>
                                            <h1 class="fw-bold text-black"><center>APPROCHEZ LA CARTE DE L'ETUDIANT POUR CREER SON COMPTE</center></h1> 
                                            <div class="form-floating mb-3">
                                            <input type="text" class="form-control visually-hidden" id="floatingInput" placeholder="Password" name="id_carte" autofocus>
                                            </div>
                                            <hr class="my-3">
                                            <center><label class="text-danger">Erreur à afficher</label></center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Add student modal end
        ***********************************-->

        <!--**********************************
            edit student modal start
        ***********************************-->
        <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStudentModalLabel">Modifier les informations de l'étudiant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            <div class="row mb-3">
                                <label for="profile-image" class="d-block">
                                    <img id="profile-image-preview" src="../images/blank_image.jpg" style="height: 100px; width: 100px;" class="img-thumbnail" style="cursor: pointer;">
                                    <p class="mt-2 font-weight-bold">Photo de l'étudiant</p>
                                </label>
                                <input type="file" id="profile-image" class="d-none" accept="image/*" name="editStudentImage">
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="editStudentName" name="editStudentName" placeholder="Entrez le nom complet de l'étudiant" value="Etudiant 1" required>
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" id="editStudentBirthday" name="editStudentBirthday" value="2023-07-31" required>
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">Matricule</label>
                                <input type="text" class="form-control" id="editStudentMatricule" name="editStudentMatricule" placeholder="Entrez le matricule de l'étudiant" value="FGHJJYUKK" required>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Spécialité</label>
                                <select class="form-select" id="editSpecialityName" name="editSpecialityName" required>
                                <option>Physique appliquée</option>
                                <option>Design graphique</option>
                                <option>Mécanique</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="specialityType" class="form-label">Niveau</label>
                                <select class="form-select" id="levelName" name="levelName" required>
                                <option>Licence 1</option>
                                <option>Licence 2</option>
                                <option>Licence 3</option>
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
            edit student modal end
        ***********************************-->

        <!--**********************************
            delete student modal start
        ***********************************-->
        <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteStudentModalLabel">Confirmer la suppression du compte de l'étudiant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST">
                        <div class="modal-body">
                            <h4 class=" text-danger">Êtes-vous sûr de vouloir supprimer ce compte?</h4>
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
            delete student modal end
        ***********************************-->