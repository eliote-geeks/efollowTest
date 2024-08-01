<base href="/">
<x-layouts>
    <div class="container">
        <div class="centered-div">
            <div class="text-center">
                <form action="{{ route('addStudentCourseCard', $course) }}" method="POST">
                    @csrf
                    <center>
                        <div class="spinner-grow text-primary" style="width: 7rem; height: 7rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </center>
                    <h1 class="fw-bold text-black text-center mt-3">APPROCHEZ LA CARTE DE L'ÉTUDIANT POUR ENREGISTRER UN ETUDIANT A UN COURS</h1>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control visually-hidden" id="floatingInput" placeholder="Password" name="id_card_smart" autofocus>
                        @error('id_card_smart')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <hr class="my-3">
                    {{-- <center><label class="text-danger">Erreur à afficher</label></center> --}}
                </form>
            </div>
        </div>
    </div>v>
    </form>
    
</x-layouts>