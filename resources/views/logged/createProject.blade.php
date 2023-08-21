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

                <h2 class="my-4">Crea un nuovo progetto</h2>

                <form method="POST" action="{{ route('logged.store') }}"
                enctype="multipart/form-data">

                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" placeholder="titolo progetto">
                        <label for="floatingInput">titolo progetto</label>
                    </div>

                    <div class="mb-3">
                        <label for="Descrizione progetto" class="form-label">Descrizione progetto</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>


                    <div class="form-floating">
                        <input type="file" class="form-control" placeholder="inserisci un'immagine" name="image">
                        <label for="image">Inserisci un'immagine</label>
                    </div>

                    <div class="my-3 input-group mb-3">
                        <span class="input-group-text">€</span>
                        <input type="number" name="budget" placeholder="inserisci il budget richiesto"
                            class="form-control">
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="Inserisci data inizio progetto" name="start_date">
                        <label for="Inserisci data inizio progetto">Inserisci data inizio progetto</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="Inserisci data di fine progetto" name="end_date">
                        <label for="Inserisci data di fine progetto">Inserisci data di fine progetto</label>
                    </div>


                    <label for="difficolta" class="form-label">Seleziona la difficoltà:</label>
                    <select class="form-select" id="difficulty" name="difficulty">
                        <option value="facile">Facile</option>
                        <option value="medio">Medio</option>
                        <option value="difficile">Difficile</option>
                    </select>

                    <label for="type_id" class="form-label mt-3">Seleziona la categoria:</label>
                    <select class="form-select mb-3" id="type_id" name="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->category }}</option>
                        @endforeach
                    </select>
                    <div class="mt-3 mb-3">
                        <div>
                            Seleziona le tecnologie del tuo progetto:
                        </div>
                        @foreach ($technologies as $technology)

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="{{$technology -> id}}" name="technologies[]" id="technology-{{$technology -> id}}">
                                <label class="form-check-label" for="technology-{{$technology -> id}}">
                                    {{$technology -> name}}
                                </label>
                            </div>

                        @endforeach

                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Crea progetto</button>



                </form>

            </div>

        </div>




    </div>
@endsection
