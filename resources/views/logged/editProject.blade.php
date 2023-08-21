@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row d-flex justify-content-center ">

            @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 120px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="col-11 col-md-8 col-xl-5 border border-primary p-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded"
                style="margin: 150px">

                <h2 class="my-4">Modifica un progetto</h2>

                <form method="POST" action="{{ route('logged.update', $project->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" placeholder="titolo progetto"
                            value="{{ $project->title }}">
                        <label for="floatingInput">titolo progetto</label>
                    </div>

                    <div class="mb-3">
                        <label for="Descrizione progetto" class="form-label">Descrizione progetto</label>
                        <textarea class="form-control" name="description" rows="3">{{ $project->description }}</textarea>
                    </div>


                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="inserisci un'immagine" name="image"
                            value="{{ $project->image }}">
                        <label for="floatingPassword">Inserisci un'immagine</label>
                    </div>

                    <div class="my-3 input-group mb-3">
                        <span class="input-group-text">€</span>
                        <input type="number" name="budget" placeholder="inserisci il budget richiesto"
                            class="form-control" value="{{ $project->budget }}">
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="Inserisci data inizio progetto"
                            placeholder="titolo progetto" name="start_date" value="{{ $project->start_date }}">
                        <label for="Inserisci data inizio progetto">Inserisci data inizio progetto</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="Inserisci data di fine progetto"
                            placeholder="titolo progetto" name="end_date" value="{{ $project->end_date }}">
                        <label for="Inserisci data di fine progetto">Inserisci data di fine progetto</label>
                    </div>


                    <label for="difficolta" class="form-label">Seleziona la difficoltà:</label>
                    <select class="form-select" id="difficulty" name="difficulty">
                        <option value="facile"{{ $project->difficulty === 'facile' ? ' selected' : '' }}>Facile</option>
                        <option value="medio"{{ $project->difficulty === 'medio' ? ' selected' : '' }}>Medio</option>
                        <option value="difficile"{{ $project->difficulty === 'difficile' ? ' selected' : '' }}>Difficile
                        </option>
                    </select>

                    <label for="type_id" class="form-label mt-3">Seleziona la categoria:</label>
                    <select class="form-select mb-3" id="type_id" name="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected($project->type->id === $type->id)>

                                {{ $type->category }}</option>
                        @endforeach
                    </select>

                    <div class="mt-3 mb-3">
                        <div>
                            Seleziona le tecnologie del tuo progetto:
                        </div>
                        @foreach ($technologies as $technology)
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                                    name="technologies[]" id="technology-{{ $technology->id }}"
                                    @foreach ($project->technologies as $projectTech)
                                        @checked($technology -> id === $projectTech -> id) @endforeach
                                >

                                <label class="form-check-label" for="technology-{{ $technology->id }}">
                                    {{ $technology->name }}
                                </label>
                            </div>
                        @endforeach

                    </div>


                    <button class="btn btn-primary mt-3" type="submit">modifica il progetto</button>



                </form>

            </div>

        </div>
