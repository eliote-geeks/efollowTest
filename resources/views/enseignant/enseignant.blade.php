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
                                    <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Liste des professeurs :</h4>
                                    <button class="btn btn-primary rounded-pill ms-auto" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                                        <i class="fas fa-plus me-2"></i>
                                        Ajouter un professeur
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
                                                <th scope="col">Email</th>
                                                <th scope="col" class="text-center">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <form action='#' method="post"> --}}
                                                @foreach ($teachers as $t)                                                
                                                <tr>
                                                    <td>{{ $t->user->name }}</td>
                                                    <td>{{ $t->matricular }}</td>
                                                    <td>{{ $t->user->email }}</td>
                                                    <td class="text-center">
                                                        <span>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="editTeacher{{ $t->id }}" data-bs-toggle="modal" data-bs-target="#editTeacherModal{{ $t->id }}">
                                                                <i class="fa fa-edit text-success" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                            </button>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="deleteTeacher{{ $t->id }}" data-bs-toggle="modal" data-bs-target="#deleteTeacherModal{{ $t->id }}">
                                                                <i class="fa fa-trash text-danger" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px;"></i>
                                                            </button>
                                                            <button style="border: none; text-decoration: none; background: none;" type="submit" name="TeacherDetails" data-bs-toggle="modal" data-bs-target="#detailsTeacherModal">
                                                                <i class="fa fa-eye" style="font-size: 1.3rem; cursor: pointer; padding-right: 10px; color: gray;"></i>
                                                            </button>
                                                        </span>
                                                    </td>
                                                </tr>

                                                
        <!--**********************************
            edit prof modal start
        ***********************************-->
        <div class="modal fade" id="editTeacherModal{{ $t->id }}" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTeacherModalLabel">Modifier les informations du professeur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('enseignant.update',$t) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="mb-3">
                                <label for="teacherName" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="editTeacherName" name="name" placeholder="Entrez le nom complet du professeur" value="{{ $t->name }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="profEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editTeacherEmail" name="email" placeholder="Entrez l'email du professeur" value="{{ $t->email }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="editTeacherMatricule" name="password" placeholder="Entrez le mot de passe du professeur" >
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
        <div class="modal fade" id="deleteTeacherModal{{ $t->id }}" tabindex="-1" aria-labelledby="deleteTeacherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteTeacherModalLabel">Confirmer la suppression du compte du professeur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST">
                        <div class="modal-body">
                            <h4 class=" text-danger">Êtes-vous sûr de vouloir supprimer ce compte?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                           <form action="{{ route('enseignant.destroy',$t) }}" method="post">
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
        <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTeacherModalLabel">Ajouter un professeur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('enseignant.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="teacherName" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="teacherName" name="name" placeholder="Entrez le nom complet du professeur" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="profEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="teacherEmail" name="email" placeholder="Entrez l'email du professeur" required>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="specialityName" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="teacherMatricule" name="password" placeholder="Entrez le mot de passe du professeur" required>
                                @error('password')
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


</x-layouts>