<base href="/">
<x-layouts>

    <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                
                <div class="col-xl-9">

                    <div class="card">
                      <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
          
                          <li class="nav-item">
                            <h3>ENREGISTRER LA PRESENCE D'UN ETUDIANT</h3>
                          </li>
                        </ul>

                        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
                            <div class="spinner-border text-primary" style="width: 5rem; height: 5rem;" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                            <center>
                                <h2 class="text-uppercase ms-4 font-weight-bold mt-4" style="font-family: 'Montserrat', sans-serif;">APPROCHEZ VOTRE CARTE POUR ENREGISTRER VOTRE PRESENCE</h2>
                            </center>
                            <form action="{{ route('scheduleCard', $program) }}" method="post" enctype="multipart/form-data" id="personneladdcarte">
                                @csrf    
                                <input type="text" class="visually-hidden" placeholder="Password" name="id_card_smart" autocomplete="off" autofocus>  
                                @error('id_card_smart')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </form>
                            <p><div id="errorMessage" class="text-danger"></div></p> 
                        </div>
                            
                        </div><!-- End Bordered Tabs -->
          
                      </div>
                    </div>
          
                    <!-- Lien pour fermer la liste des absences -->
<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmCloseModal">Fermer la liste des absences</a>

<!-- Modal de confirmation -->
<div class="modal fade" id="confirmCloseModal" tabindex="-1" role="dialog" aria-labelledby="confirmCloseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmCloseModalLabel">Confirmation de Fermeture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir fermer la liste des absences ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="{{ route('endListCardschedule', $program) }}" class="btn btn-danger">Fermer</a>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    
</x-layouts>