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
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex justify-content-between align-items-center">
                            <li class="nav-item">
                                <h3 class="mb-0">ENREGISTRER UN ETUDIANT A UN COURS</h3>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cours.index') }}">
                                    <i class="fas fa-arrow-left text-secondary fs-4"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
                            <div class="spinner-border text-primary" style="width: 5rem; height: 5rem;" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                            <center>
                                <h2 class="text-uppercase ms-4 font-weight-bold mt-4" style="font-family: 'Montserrat', sans-serif;">APPROCHEZ LA CARTE DE L'ETUDIANT L'ENREGISTRER A UN COURS</h2>
                            </center>
                            <form action="{{ route('addStudentCourseCard', $course) }}" method="post" enctype="multipart/form-data" id="personneladdcarte">
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
          

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    
</x-layouts>