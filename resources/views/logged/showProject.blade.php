@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 130px">


        <div class="card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded" style="max-width: 1040px; min-height: 400px">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title ">{{ $project->title }}</h5>
                        <p class="card-text my-4">{{ $project->description }}</p>

                        <ul>

                            <li class="my-2">

                                Inizio del progetto ->
                                <span class="fs-6">{{ $project->start_date }}</span>

                            </li>

                            <li class="my-2">

                                Fine del progetto ->
                                <span class="fs-6">{{ $project->end_date }}</span>

                            </li>

                            <li class="my-2">

                                Difficoltà progetto ->
                                <span class="fs-5 text-primary">{{ $project->difficulty }}</span>

                            </li>

                            <li class="my-2">

                                Budget richiesto ->
                                <span class="fs-5 text-warning">{{ $project->budget }}€</span>

                            </li>

                            <li class="my-2">

                                Categoria ->
                                <span class="fs-5 text-danger">{{ $project->type->category }}</span>

                            </li>

                            <li class="my-2">
                                @if (count($project->technologies) > 0)
                                    Tecnologie utilizzate:
                                    <ul>

                                        @foreach ($project->technologies as $technology)
                                            <li class="text-info">{{ $technology->name }}</li>
                                        @endforeach

                                    </ul>
                                @else
                                Nessuna tecnologia selezionata
                                @endif

                            </li>

                        </ul>
                        <div class="btn-group">

                            <button type="button" class="btn btn-primary me-3">
                                <a class="text-decoration-none text-light fw-bold"
                                    href="{{ route('logged.editProject', $project->id) }}">Modifica progetto</a>
                            </button>

                            <form class="delete" method="POST" action="{{ route('deleteProject', $project->id) }}"
                                onsubmit="return formSend(event)">

                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Elimina progetto
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Vuoi eliminare
                                                    definitivamente il progetto?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Chiudi</button>
                                                <button class="btn btn-danger" type="submit">
                                                    Elimina progetto
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>

                        </div>



                    </div>
                </div>
                <div class="col-md-4">


                    <img src="{{ asset('storage/' . $project -> image) }}" class="col-12 object-fit-cover border rounded"
                        alt="project-image" style="min-height: 400px">




                </div>
            </div>
        </div>

    </div>
@endsection
