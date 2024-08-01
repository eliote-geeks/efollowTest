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
                                <h4 class="mb-0 me-3" style="font-weight: bold; color: gray;">Historique des présences:
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm"
                                    id="myTable">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Nom de l'étudiant</th>
                                            <th scope="col">Jour</th>
                                            <th scope="col">Cours</th>
                                            <th scope="col">Heure de debut</th>
                                            <th scope="col">Heure de fin</th>
                                            {{-- <th scope="col">Nom du professeur</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($presences as $p)
                                            <tr>
                                                <td>{{ $p->student->firstName }}</td>
                                                <td>{{ \Carbon\Carbon::parse($p->program->day)->format('d, M Y') }}</td>
                                                <td>{{ $p->program->course->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($p->program->start_Hour)->format('H:i') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($p->program->end_Hour)->format('H:i') }}
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

</x-layouts>
